<?php

namespace App\Http\Controllers\Student\AssistedTest;

use App\Http\Controllers\Controller;
use App\Models\AssistedTest\QuestionModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\AssistedTest\ExamModel;
use App\Models\AssistedTest\ExamParticipantModel;
use App\Models\AssistedTest\QuestionAdvModel;
use App\Models\AssistedTest\ExamAnswerModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ExamController extends Controller
{

    public function __construct(Request $request)
    {
        $exam_uuid = $request->route()->parameters()['uuid'] ?? null;
        if($exam_uuid !== null){
            $exam = ExamModel::select('is_deleted','start_date')->where('uuid','=',$exam_uuid)->first();
            if($exam->is_deleted == 1) {
                return abort(404);
            }

        }
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function exams(Request $request)
    {
        $user = auth()->user();

        if($request->title){
            $exams = ExamModel::where('exams.id_company','=',auth()->user()->active_session)
                ->join('exam_participant','exam_participant.id_exam','=','exams.id_exam')
                ->where('id_participant','=',$user->id)
                ->where('title','like','%'.$request->title.'%')
                ->where('is_deleted','=',0)
                ->groupBy('exams.id_exam')
                ->paginate(6);
            $exams->appends(['title' => $request->title]);
        }else{
            $exams = ExamModel::where('exams.id_company','=',auth()->user()->active_session)
                ->join('exam_participant','exam_participant.id_exam','=','exams.id_exam')
                ->where('id_participant','=',$user->id)
                ->where('is_deleted','=',0)
                ->groupBy('exams.id_exam')
                ->paginate(6);
        }

        $nav = [
            'menu' => 'assisted_test',
            'submenu' => 'manage',
            'widgetmenu' => 'informations',
        ];

        return view('pages.student.assisted_test.exams')
            ->with(compact('nav','exams'));
    }

    public function examOverview(Request $request,$uuid)
    {
        $user = auth()->user();

        $exam = ExamModel::where('uuid','=',$uuid)
            ->where('id_company','=',$user->active_session)
            ->first();

        if(!$exam) return abort(404);

        $partisipation = ExamParticipantModel::where('id_participant','=',$user->id)
            ->where('id_exam','=',$exam->id_exam)
            ->first();



        $nav = [
            'menu' => 'assisted_test',
            'submenu' => '',
            'widgetmenu' => '',
        ];

        return view('pages.student.assisted_test.exam-overview')
            ->with(compact('nav','exam','partisipation'));
    }

    /**
     * @param $uuid
     * @return bool|\Illuminate\Http\RedirectResponse|void
     * Menggenerate soal untuk user, sebelum dikerjakan ke doExam()
     */
    public function startExam($uuid)
    {
        $exam = ExamModel::where('uuid','=',$uuid)->first();

        if(Carbon::parse($exam->start_date)->gt(Carbon::now())){
            return redirect()->route('student.assistedtest.all.exams');
        }

        $isParticipant = $exam->participants()->where('id_participant','=',auth()->user()->id)->first();

        if(!$isParticipant || !$exam){
            return abort(404);
        }

        if($isParticipant->exam_start != null){
            return redirect()->route('student.assistedtest.do.exam',[$exam->uuid]);
        }

        $checkIsStart = $isParticipant->exam_start;

        if($checkIsStart != null || $checkIsStart != ''){
            return redirect()->route('student.assistedtest.do.exam',$exam->id_exam);
        }

        $finalQuestionIdList = DB::transaction(function() use ($exam){
            $questionOnExams = QuestionModel::where('id_exam','=',$exam->id_exam)
                ->where('is_deleted','=',0)->get();

            $finalQuestionList = array();
            $questionOnExamsArr = array();

            foreach($questionOnExams as $item){
                array_push($questionOnExamsArr,$item->id_question);
            }

            // Push for Question In Exam
            array_push($finalQuestionList,...$this->randomAndLimit($questionOnExamsArr,$exam->random_q,$exam->max_questions));

            // Get Linked Questions
            $linkedQuest = QuestionAdvModel::select('imported_from','picked')->where('id_exam','=',$exam->id_exam)
                ->where('is_deleted','=',0)
                ->get();

            if($linkedQuest){
                foreach($linkedQuest as $item){
                    $tmpLinkedQuestion = array();
                    if($item->details->is_deleted == 0){
                        $questionOnLinked = QuestionModel::where('id_exam','=',$item->imported_from)
                            ->where('is_deleted','=',0)->get();

                        foreach($questionOnLinked as $item2){
                            array_push($tmpLinkedQuestion,$item2->id_question);
                        }
                    }
                    array_push($finalQuestionList,...$this->randomAndLimit($tmpLinkedQuestion,$exam->random_q,$item->picked));
                }
            }

            // randomizing final question list
            if($exam->random_q == 1){
                shuffle($finalQuestionList);
            }

            foreach($finalQuestionList as $item){
                ExamAnswerModel::create([
                    'id_company' => auth()->user()->active_session,
                    'id_exam' => $exam->id_exam,
                    'id_question' => $item,
                    'id_participant' => auth()->user()->id,
                ]);
            }

            ExamParticipantModel::where('id_participant','=',auth()->user()->id)
                ->where('id_exam','=',$exam->id_exam)
                ->update([
                   'exam_start' => Carbon::now(),
                ]);

            return $finalQuestionList;
        });

        return redirect()->route('student.assistedtest.do.exam',$exam->uuid);
    }

    public function doExam($uuid){
        $exam = ExamModel::where('uuid','=',$uuid)->first();

        if(Carbon::parse($exam->start_date)->gt(Carbon::now())){
           return redirect()->route('student.assistedtest.all.exams');
        }

        $startAt = ExamParticipantModel::select('exam_start','exam_end')
            ->where('id_participant','=',auth()->user()->id)
            ->where('id_exam','=',$exam->id_exam)
            ->first();

//        return var_dump($startAt);

        if($startAt->exam_start == '') {
            return redirect()->route('student.assistedtest.overview',$exam->uuid);
        }elseif($startAt->exam_end != ''){
            return redirect()->route('student.assistedtest.result.exam',$exam->uuid);
        }else{
            $startAtKey = 'exam-start-'.$exam->uuid;
            $shouldDoneKey = 'exam-sdone-'.$exam->uuid;

            $shouldDoneDate = Carbon::parse($startAt->exam_start)->addMinutes($exam->max_time);

            Session::put($startAtKey,$startAt->exam_start);
            Session::put($shouldDoneKey,$shouldDoneDate);
        }

//        return Session::get($startAtKey) .'===='. Session::get('exam-sdone-'.$exam->uuid);

        if(!$exam){
            return abort(404);
        }

//        $questions = ExamAnswerModel::where('id_exam','=',$exam->id_exam)
//            ->join('questions','questions.id_question','=','exam_answers.id_question')
//            ->where('id_participant','=',auth()->user()->id)
//            ->where('questions.is_deleted','=',0)
//            ->get()->pluck('id_question');

//        $questions = QuestionModel::whereIn('id_question',$tmpQuestions)->get();

        $questions = QuestionModel::select('questions.question','questions.id_question','questions.type','exam_answers.answer')
            ->join('exam_answers','exam_answers.id_question','=','questions.id_question')
            ->where('exam_answers.id_company','=',auth()->user()->active_session)
            ->where('exam_answers.id_exam','=',$exam->id_exam)
            ->where('exam_answers.id_participant','=',auth()->user()->id)
            ->where('questions.is_deleted','=',0)
            ->orderBy('exam_answers.id_answer','ASC')
            ->get();

        $nav = [
            'menu' => 'assisted_test',
            'submenu' => 'manage',
            'widgetmenu' => 'informations',
        ];

        return view('pages.student.assisted_test.exam')
            ->with(compact('nav','questions','exam'));
    }

    public function answerQuestion(Request $request, $uuid){
//        $uuid = $request->uuid;
        $exam = ExamModel::where('uuid','=',$uuid)->first();

        if(!$exam){
            header('HTTP/1.0 400 Bad error',true,400);
            exit();
        }

//        $startAtKey = 'exam-start-'.$exam->uuid;
        $shouldDoneKey = 'exam-sdone-'.$exam->uuid;

        $shouldEnd = Carbon::parse(Session::get($shouldDoneKey));

        if ($shouldEnd <= Carbon::now()){
            header('HTTP/1.0 400 Bad error',true,400);
            exit();
        }

        if($request->timeUsed){
            $totalTime = ExamAnswerModel::where('id_participant','=',auth()->user()->id)
                ->where('id_exam','=',$exam->id_exam)
                ->where('id_question','=',$request->usedOn)
                ->increment('time_used',$request->timeUsed);
            // return response()->json(['status'=>'saved','data'=>$request->all(),'shouldend'=>$shouldEnd]);
        }

//        $id_question = str_replace('answer-','',$request->answerOn);

        $answer = ExamAnswerModel::where('id_participant','=',auth()->user()->id)
            ->where('id_exam','=',$exam->id_exam)
            ->where('id_question','=',$request->answerOn)
            ->update([
               'answer'=>$request->answer
            ]);

        return response()->json(['status'=>'saved','data'=>$request->all(),'shouldend'=>$shouldEnd]);
    }

    public function finishExam(Request $request, $uuid){
        $exam = ExamModel::where('uuid','=',$uuid)->first();

        // checking if empty answer
        $answer = QuestionModel::select('questions.question','questions.id_question','questions.type','exam_answers.answer')
            ->join('exam_answers','exam_answers.id_question','=','questions.id_question')
            ->where('exam_answers.id_company','=',auth()->user()->active_session)
            ->where('exam_answers.id_exam','=',$exam->id_exam)
            ->where('exam_answers.id_participant','=',auth()->user()->id)
            ->where('questions.is_deleted','=',0)
            ->where('exam_answers.answer','=','')
            ->orderBy('exam_answers.id_answer','ASC')
            ->get();

        if($answer->isNotEmpty()){
            return response()->json(['error'=>'incomplate','data'=>$answer]);
        }

        $participant = ExamParticipantModel::where('id_participant','=',auth()->user()->id)
            ->where('id_exam','=',$exam->id_exam)
            ->where('id_company','=',auth()->user()->active_session)
            ->first();

        if (!$participant){
            header('HTTP/1.0 400 Bad error',true,400);
            exit();
        }

        if($participant->exam_end = '' || $participant->exam_end == null){
            $questionT12 = QuestionModel::select('questions.question','questions.id_question','questions.type','exam_answers.answer as panswer','questions.answer as key','questions.score')
                ->join('exam_answers','exam_answers.id_question','=','questions.id_question')
                ->where('exam_answers.id_company','=',auth()->user()->active_session)
                ->where('exam_answers.id_exam','=',$exam->id_exam)
                ->where('exam_answers.id_participant','=',auth()->user()->id)
                ->where('questions.is_deleted','=',0)
                ->orderBy('exam_answers.id_answer','ASC')
                ->get();

            $finalScore = DB::transaction(function () use ($questionT12, $exam, $participant){
                $questionResult = 0;
                $maxScore = 0;
                foreach ($questionT12 as $item){
                    $maxScore += $item->score;
                    $perQuestScore = 0;
                    if($item->type == 1 || $item->type == 2){
                        if($item->panswer == $item->key){
                            $questionResult += $item->score;
                            $perQuestScore = $item->score;
                        }
                    }else{
                        $cosineResult = $this->cossineSimilarity($item->key,$item->panswer);

                        $resultPercent = ($cosineResult / 1) * 100;
                        $finalCosineResult = ($resultPercent / 100) * $item->score;

                        $questionResult += $finalCosineResult;
                        $perQuestScore = $finalCosineResult;
                    }
                    ExamAnswerModel::where('id_participant','=',auth()->user()->id)
                        ->where('id_exam','=',$exam->id_exam)
                        ->where('id_question','=',$item->id_question)
                        ->where('id_company','=',auth()->user()->active_session)
                        ->update([
                            'sys_score'=> round($perQuestScore, 2)
                        ]);
                }

                $finalScore = round(($questionResult / $maxScore) * 100,2);

                $endExam = Carbon::now();
                if(Carbon::now()->gt($participant->exam_end)){
                    $endExam = Carbon::parse($participant->exam_sart)->addMinutes($exam->max_time);
                }
                $participant->update([
                    'final_result' => $finalScore,
                    'exam_end' => $endExam,
                ]);

                return $finalScore;
            });

            return response()->json(['status'=>'saved','final'=>$finalScore]);

        }else{
            return response()->json(['status'=>'unknow']);
        }
    }

    public function resultPage($uuid){
        $exam = ExamModel::where('uuid','=',$uuid)->where('id_company','=',auth()->user()->active_session)->first();

        if(!$exam){
            return abort(404);
        }

        $participant = ExamParticipantModel::where('id_participant','=',auth()->user()->id)
            ->where('id_exam','=',$exam->id_exam)
            ->where('id_company','=',auth()->user()->active_session)
            ->first();
//        return var_dump($participant);

//        return $participant->exam_end;

        if($participant->exam_start == '' || $participant->exam_end == ''){
            return redirect()->route('student.assistedtest.all.exams');
        }

        $questions = QuestionModel::with('options')->select('questions.question','questions.id_question','questions.type','exam_answers.answer as panswer','questions.answer as key','questions.score')
            ->leftJoin('exam_answers','questions.id_question','=','exam_answers.id_question')
            ->where('exam_answers.id_company','=',auth()->user()->active_session)
            ->where('exam_answers.id_exam','=',$exam->id_exam)
            ->where('exam_answers.id_participant','=',auth()->user()->id)
            ->where('questions.is_deleted','=',0)
            ->orderBy('exam_answers.id_answer','ASC')
            ->get();

        // dd($questions);

        $nav = [
            'menu' => 'assisted_test',

        ];

        // dd($questions);

        return view('pages.student.assisted_test.exam-result')
            ->with(compact('nav','questions','exam','participant'));

    }

    /**
     * @param array $data
     * @param $isRandom
     * @param $limit
     * @return array
     */
    private function randomAndLimit(array $data,$isRandom ,$limit){
        if($isRandom == 1){
            shuffle($data);
        }

        if($limit == 0){
            return $data;
        }else{
            return array_slice($data,0,$limit);
        }
    }

    private function textAnalys($data1, $data2){

    }

    public function textCleaning($str){
        // remove from tag and lower

        $str = strtolower(strip_tags($str));

        // remove tanda baca
        $str = trim( preg_replace( "/[^0-9a-z]+/i", " ", $str ) );


        // remove extra space
        $str = preg_replace('/\s+/',' ',$str);

        // explode to array
        $str = explode(" ",$str);

        // remove kata penghubung array
        $kataHubung = array("dan","dengan","serta","saat","ini","di","ke","yaitu","juga","hal","yang","per");
        $str = array_diff($str, $kataHubung);

        return $str;
    }

    /**
     * Source https://github.com/yooper/php-text-analysis/blob/master/src/Comparisons/CosineSimilarityComparison.php
     * @param $text1
     * @param $text2
     * @return float|int
     */
    public function cossineSimilarity($text1, $text2){
        $text1Freq = array_count_values($this->textCleaning($text1));
        $text2Freq = array_count_values($this->textCleaning($text2));
        $product = 0.0;

        // always choose the smaller document
        if(count($text1Freq) < count($text2Freq)) {
            $iterateTokens =& $text1Freq;
        } else {
            $iterateTokens =& $text2Freq;
        }

        // $iterateTokens =& $text1Freq;
        foreach($iterateTokens as $term => $freq)
        {
            if (isset($text1Freq[$term]) && isset($text2Freq[$term])) {
                $product += $text1Freq[$term] * $text2Freq[$term];
            }
        }

        $productFunc = function($carry, $freq)
        {
            $carry += pow($freq, 2);
            return $carry;
        };

        $text1VectorSum = sqrt(array_reduce(array_values($text1Freq), $productFunc, 0));
        $text2VectorSum = sqrt(array_reduce(array_values($text2Freq), $productFunc, 0));
        return $product / ($text1VectorSum * $text2VectorSum);
    }
}
