<?php

namespace App\Http\Controllers\SrvAdmin\AssistedTest;

use App\Http\Controllers\Controller;
use App\Models\AssistedTest\ExamAnswerModel;
use Illuminate\Http\Request;
use App\Models\Learning\CoursesCategoriesModel;
use App\Models\AssistedTest\ExamModel;
use App\Models\AssistedTest\ExamParticipantModel;
use App\Models\AssistedTest\ExamsCoursesRelModel;
use App\Models\AssistedTest\QuestionAdvModel;
use App\Models\AssistedTest\QuestionModel;
use App\Models\AssistedTest\QuestionOptionsModel;
use App\Models\Learning\CoursesModel;
use App\Models\Learning\CoursesParticipantModel;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class ExamController extends Controller
{

    private $current_exam;
    public function __construct(Request $request)
    {
        $exam_uuid = $request->route()->parameters()['uuid'] ?? null;
        if ($exam_uuid !== null) {
            $exam = ExamModel::where('uuid', '=', $exam_uuid)->first();
            $this->current_exam = $exam;

            if ($exam->is_deleted == 1) return abort(404);

            
        }
    }

    public function create()
    {
        $examCategory = CoursesCategoriesModel::where('id_company', '=', auth()->user()->company->id_company)
            ->where('is_deleted', '=', 0)
            ->orderBy('category', 'ASC')
            ->get();

        $company = auth()->user()->company;

        $nav = [
            'menu' => 'assisted_test',
            'submenu' => 'create'
        ];

        return view('pages.srv_admin.assisted_test.create')
            ->with(compact('nav', 'examCategory','company'));
    }

    public function store(Request $request)
    {
        $validatorRule = [
            'ctitle' => 'required',
            'cdesc' => 'required',
            'start_date' => 'required|date',
            'max_time' => 'required|numeric|min:10',
        ];

        if (!$request->is_no_end_time) {
            $validatorRule['end_date'] = 'required|date|after_or_equal:start_date';
        }

        $validateData = Validator::make($request->all(), $validatorRule);


        if ($validateData->passes()) {
            $exam = DB::transaction(function () use ($request) {
                $share_link = '';
                $user_max = 0;
                $start_date = null;
                $end_date = null;
                $exam_price = 0;
                $uuid = Str::orderedUuid();


                if ($request->is_unlimited_users) {
                    $user_max = $request->max_user;
                }

                $start_date = Carbon::parse($request->start_date)->format('Y-m-d H:i');
                if ($request->is_no_end_time) {
                    $end_date = Carbon::parse('9999-12-30')->format('Y-m-d H:i');

                    // $end_time = Carbon::parse($request->end_time)->format('Y-m-d');
                }else{
                    $end_date = Carbon::parse($request->end_date)->format('Y-m-d H:i');
                }

                if (!$request->is_free_course) {
                    $exam_price = $request->course_price;
                }

                $exam = ExamModel::create([
                    'title' => $request->ctitle,
                    'id_company' => auth()->user()->company->id_company,
                    'uuid' => $uuid,
                    'category' => $request->ccategory,
                    'descriptions' => $request->cdesc,
                    'cover_img_url' => $request->filepath,
                    'random_q' => ($request->random_q) ? 1 : 0,
                    'random_c' => ($request->random_c) ? 1 : 0,
                    'max_time' => $request->max_time,
                    'is_share_link' => ($request->share_link) ? 1 : 0,
                    'is_unlimited_users' => ($request->is_unlimited_users) ? 1 : 0,
                    'max_users' => $user_max,
                    'start_date' => $start_date,
                    'is_no_end_time' => ($request->is_no_end_time) ? 1 : 0,
                    'end_date' => $end_date,
                    'is_free' => ($request->is_free_course) ? 1 : 0,
                    'is_private' => ($request->is_private) ? 1 : 0,
                    'exam_price' => $exam_price,
                    'created_by' => auth()->user()->id,

                ]);

                ExamParticipantModel::create([
                    'id_exam' => $exam->id_exam,
                    'id_participant' => auth()->user()->id,
                    'created_by' => auth()->user()->id,
                    'id_company' => auth()->user()->active_session,
                    'status' => 1
                ]);

                $bulkRel = array();

                foreach($request->selected_elearning as $item){
                    $real_courses_id = explode('.',$item)[1];
                    $bulkRel[] = array(
                        'id_exam' => $exam->id_exam,
                        'id_courses' => $real_courses_id,
                        'id_company' => auth()->user()->active_session,
                        'created_by' => auth()->id(),
                    );
                }

                ExamsCoursesRelModel::insert($bulkRel);

                return $exam;
            });


            return response()->json(['success' => 'Saved', 'uuid' => $exam->uuid, 'data' => $request->all()]);
        }

        return response()->json(['error' => $validateData->errors()->getMessages(), 'data' => $request->all()]);
    }

    public function remove(Request $request){
        $my = auth()->user();

        $exam = ExamModel::where('uuid',$request->uuid)
            ->where('id_company','=', $my->active_session)
            ->first();

        if(Hash::check($request->password,$my->password) && $exam){
            $exam->update([
                'is_deleted' => 1,
                'deleted_at' => Carbon::now(),
                'deleted_by' => $my->id
            ]);

            return response()->json(['success'=>'']);
        }

        return response()->json(['error'=>'1']);
    }

    public function showAllExams(Request $request)
    {

        if (auth()->user()->active_status == 1){
            $act = '!=';
            $id_creator = '';
        }else{
            $act = '=';
            $id_creator = auth()->id();
        }

        if ($request->title) {
            $exams = ExamModel::where('id_company', '=', auth()->user()->active_session)
                ->where('title', 'like', '%' . $request->title . '%')
                ->where('is_deleted','=',0)
                ->where('created_by',$act,$id_creator)
                ->paginate(6);
            $exams->appends(['title' => $request->title]);
        } else {
            $exams = ExamModel::where('id_company', '=', auth()->user()->active_session)
                ->where('is_deleted','=',0)
                ->where('created_by',$act,$id_creator)
                ->paginate(6);
        }

        $nav = [
            'menu' => 'assisted_test',
            'submenu' => 'manage'
        ];

        return view('pages.srv_admin.assisted_test.manage')
            ->with(compact('nav', 'exams'));
    }

    public function manageOverview($uuid)
    {
        $exam = ExamModel::where('id_company', '=', auth()->user()->active_session)
            ->where('uuid', '=', $uuid)
            ->first();

        // $questions = ExamAnswerModel::where('id_exam','=',$exam->id_exam)
        //    ->where('id_company','=',auth()->user()->active_session)
        //    ->avgr('time_used');

        return redirect()->route('srv_admin.assistedtest.questions',$uuid);
        $nav = [
            'menu' => 'assisted_test',
            'submenu' => 'manage',
            'widgetmenu' => 'overview',
        ];

        return view('pages.srv_admin.assisted_test.manage.overview')
            ->with(compact('nav', 'exam'));
    }

    public function questions($uuid)
    {
        $exam = ExamModel::where('id_company', '=', auth()->user()->active_session)
            ->where('uuid', '=', $uuid)
            ->first();

        $externalQues = QuestionAdvModel::where('id_exam', '=', $exam->id_exam)->where('is_deleted','=',0)->get();
        $nav = [
            'menu' => 'assisted_test',
            'submenu' => 'manage',
            'widgetmenu' => 'question',
        ];

        return view('pages.srv_admin.assisted_test.manage.question')
            ->with(compact('nav', 'exam', 'externalQues'));
    }

    public function participants($uuid)
    {
        $exam = ExamModel::where('id_company', '=', auth()->user()->active_session)
            ->where('uuid', '=', $uuid)
            ->first();

        $nav = [
            'menu' => 'assisted_test',
            'submenu' => 'manage',
            'widgetmenu' => 'participant',
        ];

        return view('pages.srv_admin.assisted_test.manage.participant')
            ->with(compact('nav', 'exam'));
    }

    public function examParticipants($uuid)
    {
        $exam = ExamModel::select('id_exam')->where('uuid', '=', $uuid)->where('id_company', '=', auth()->user()->active_session)->first();

        // return $exam->id_exam;

        $participant = ExamParticipantModel::select('users.id', 'users.name', 'users.username', 'exam_participant.status', 'exam_participant.exam_start', 'exam_participant.final_result')
            ->where('exam_participant.id_exam', '=', $exam->id_exam)
            ->join('users', 'users.id', '=', 'exam_participant.id_participant')
            ->groupBy('exam_participant.id_participant');

        return datatables()->of($participant)->toJson();
    }

    public function enrollStore(Request $request, $uuid)
    {
        $exam = ExamModel::select('id_exam')->where('uuid', '=', $uuid)->first();

        $validateData = Validator::make($request->all(), [
            'selected_users' => 'required_without_all:selected_elearning,selected_assistedtest',
            'selected_elearning' => 'required_without_all:selected_users,selected_assistedtest',
            'selected_assistedtest' => 'required_without_all:selected_users,selected_elearning'
        ]);

        if (!$validateData->passes()) {
            return response()->json(['data' => $request->all(), 'error' => $validateData->errors()->getMessages()]);
            // header('HTTP/1.0 400 Bad error',true,400);
            // exit();
        }

        // NORMAL ENROOL
        if (isset($request->selected_users)) {
            foreach ($request->selected_users as $user) {
                ExamParticipantModel::firstOrCreate(
                    ['id_exam' => $exam->id_exam, 'id_participant' => str_replace("KD", "", $user)],
                    [
                        'created_by' => auth()->id(),
                        'id_company' => auth()->user()->active_session,
                    ]
                );
            }
        }

        // WITH Other Elearning Enrool
        if (isset($request->selected_elearning)) {

            foreach ($request->selected_elearning as $selEl) {
                $elearningUsers = CoursesParticipantModel::where('id_courses', '=', str_replace("KD", "", $selEl))
                    ->where('id_company', '=', auth()->user()->active_session)->get();

                foreach ($elearningUsers as $userEl) {
                    ExamParticipantModel::firstOrCreate(
                        ['id_exam' => $exam->id_exam, 'id_participant' => $userEl->id_participant],
                        [
                            'created_by' => auth()->id(),
                            'id_company' => auth()->user()->active_session,
                        ]
                    );
                }
            }
        }

        // WITH Other Assisted Test Enrool
        if (isset($request->selected_assistedtest)) {
            foreach ($request->selected_assistedtest as $selAssisted) {
                $assistedTestUsers = ExamParticipantModel::where('id_exam', '=', str_replace("KD", "", $selAssisted))
                    ->where('id_company', '=', auth()->user()->active_session)->get();

                foreach ($assistedTestUsers as $userAssisted) {
                    ExamParticipantModel::firstOrCreate(
                        ['id_exam' => $exam->id_exam, 'id_participant' => $userAssisted->id_participant],
                        [
                            'created_by' => auth()->id(),
                            'id_company' => auth()->user()->active_session,
                        ]
                    );
                }
            }
        }

        return response()->json(['data' => $request->all()]);
    }

    public function deleteParticipant(Request $request, $uuid)
    {
        // $user = ExamParticipantModel::where('')
        $exam = ExamModel::select('id_exam')->where('uuid', '=', $uuid)->first();

        if ($exam) {
            ExamParticipantModel::where('id_exam', '=', $exam->id_exam)
                ->where('id_participant', '=', $request->id_user)
                ->delete();

            return response()->json(['success' => 'deleted'], 200);
        }

        header('HTTP/1.0 400 Bad error', true, 400);
        exit();
    }

    public function searchUsers(Request $request, $uuid)
    {

        $exam = ExamModel::where('id_company', '=', auth()->user()->active_session)
            ->where('uuid', '=', $uuid)
            ->first();

        $cparticipant = ExamParticipantModel::select('id_participant')
            ->where('id_exam', '=', $exam->id_exam)
            ->get()->pluck('id_participant');

        if (isset($request->searchTerm)) {

            // select untuk membuat table virtual, dikarenakan nanti menggunakan orWhere
            $sub = User::select('id', 'name', 'username', 'id_company')
                ->join('user_srv_dtl', 'user_srv_dtl.id_user', '=', 'users.id')
                ->where('user_srv_dtl.id_company', '=', auth()->user()->active_session)
                ->whereNotIn('id', $cparticipant)
                ->groupBy('user_srv_dtl.id_user');

            $users = DB::table(DB::raw("({$sub->toSql()}) AS s_users"))
                ->mergeBindings($sub->getQuery())
                ->where('s_users.name', 'like', '%' . $request->searchTerm . '%')
                ->orWhere('s_users.username', 'like', '%' . $request->searchTerm . '%')
                ->get();
        } else {
            $users = User::select('id', 'name', 'username', 'id_company')
                ->join('user_srv_dtl', 'user_srv_dtl.id_user', '=', 'users.id')
                ->where('user_srv_dtl.id_company', '=', auth()->user()->active_session)
                ->whereNotIn('id', $cparticipant)
                ->groupBy('user_srv_dtl.id_user')
                ->get();
        }

        $response = array();

        foreach ($users as $user) {
            $response[] = array(
                "id" => 'KD' . $user->id,
                "text" => $user->id_company . ' ' . $user->name . ' @' . $user->username,
            );
        }

        return json_encode($response);
    }

    public function searchUserGroups()
    {

    }

    public function editExamInfo($uuid)
    {
        $exam = ExamModel::where('id_company', '=', auth()->user()->active_session)
            ->where('uuid', '=', $uuid)
            ->first();

        $examCategory = CoursesCategoriesModel::where('id_company', '=', auth()->user()->company->id_company)
            ->where('is_deleted', '=', 0)
            ->orderBy('category', 'ASC')
            ->get();

        $nav = [
            'menu' => 'assisted_test',
            'submenu' => 'manage',
            'widgetmenu' => 'informations',
        ];

        return view('pages.srv_admin.assisted_test.manage.informations')
            ->with(compact('nav', 'exam', 'examCategory'));
    }

    public function editExamConfig($uuid)
    {
        $exam = ExamModel::where('id_company', '=', auth()->user()->active_session)
            ->where('uuid', '=', $uuid)
            ->first();

        $nav = [
            'menu' => 'assisted_test',
            'submenu' => 'manage',
            'widgetmenu' => 'config',
        ];

        return view('pages.srv_admin.assisted_test.manage.configuration')
            ->with(compact('nav', 'exam'));
    }

    public function editExamType($uuid)
    {
        $exam = ExamModel::where('id_company', '=', auth()->user()->active_session)
            ->where('uuid', '=', $uuid)
            ->first();

        $nav = [
            'menu' => 'assisted_test',
            'submenu' => 'manage',
            'widgetmenu' => 'type',
        ];

        return view('pages.srv_admin.assisted_test.manage.type')
            ->with(compact('nav', 'exam'));
    }

    public function updateExamInfo(Request $request, $uuid)
    {
        $validateData = Validator::make($request->all(), [
            'ctitle' => 'required',
            'cdesc' => 'required',

        ]);

        if ($validateData->passes()) {
            $exam = ExamModel::where('uuid', '=', $uuid)
                ->where('id_company', '=', auth()->user()->active_session)
                ->update([
                    'title' => $request->ctitle,
                    'category' => $request->ccategory,
                    'descriptions' => $request->cdesc,
                    'cover_img_url' => $request->filepath,
                ]);
            return response()->json(['success' => 'Saved', 'uuid' => $uuid, 'data' => $request->all()]);
        }
        return response()->json(['error' => $validateData->errors()->getMessages(), 'data' => $request->all()]);
    }

    public function updateExamConfig(Request $request, $uuid)
    {
        $validatorRule = [
            'start_date' => 'required|date',
            'max_choices' => 'required',
        ];

        if (!$request->is_no_end_time) {
            $validatorRule['end_date'] = 'required|date|after_or_equal:start_date';
        }

        $validateData = Validator::make($request->all(), $validatorRule);

        $share_link = '';
        $user_max = 0;
        $start_date = null;
        $end_date = null;

        if (!$request->is_unlimited_users) {
            $user_max = $request->max_user;
        }

        $start_date = Carbon::parse($request->start_date)->format('Y-m-d H:i');

        if($request->is_no_end_time){
            $end_date = Carbon::parse('9999-12-30')->format('Y-m-d H:i');

            // $end_time = Carbon::parse($request->end_time)->format('Y-m-d');
        }else{
            $end_date = Carbon::parse($request->end_date)->format('Y-m-d H:i');
        }


        if ($validateData->passes()) {
            $exam = ExamModel::where('uuid', '=', $uuid)
                ->where('id_company', '=', auth()->user()->active_session)
                ->update([
                    'random_q' => ($request->random_q) ? 1 : 0,
                    'random_c' => ($request->random_c) ? 1 : 0,
                    'max_choices' => $request->max_choices,
                    'is_share_link' => ($request->share_link) ? 1 : 0,
                    'is_unlimited_users' => ($request->is_unlimited_users) ? 1 : 0,
                    'max_users' => $user_max,
                    'start_date' => $start_date,
                    'is_no_end_time' => ($request->is_no_end_time) ? 1 : 0,
                    'end_date' => $end_date,
                ]);
            return response()->json(['success' => 'Saved', 'uuid' => $uuid, 'data' => $request->all()]);
        }
        return response()->json(['error' => $validateData->errors()->getMessages(), 'data' => $request->all()]);
    }

    public function updateExamType(Request $request, $uuid)
    {
        $validateData = Validator::make($request->all(), [
            'exam_price' => 'numeric|min:10000',
        ]);

        $exam_price = 0;
        if (!$request->is_free) {
            $exam_price = $request->exam_price;
        }

        if ($validateData->passes()) {
            $exam = ExamModel::where('uuid', '=', $uuid)
                ->where('id_company', '=', auth()->user()->active_session)
                ->update([
                    'is_free' => ($request->is_free) ? 1 : 0,
                    'exam_price' => $exam_price,
                    'is_private' => ($request->is_private) ? 1 : 0,
                ]);
            return response()->json(['success' => 'Saved', 'uuid' => $uuid, 'data' => $request->all()]);
        }
        return response()->json(['error' => $validateData->errors()->getMessages(), 'data' => $request->all()]);
    }

    public function questionsJson($uuid)
    {
        $my = auth()->user();
        $exam = ExamModel::where('id_company', '=', auth()->user()->active_session)
            ->where('uuid', '=', $uuid)
            ->first();


        $queryString =
            "SELECT
                REGEXP_REPLACE(question, '<[^>]*>+', '') as question,
                qt.label,
                q.created_at,
                q.created_by,
                q.id_question,
                q.id_exam,
                q.id_company,
                us.name,
                count(IF((q.type = 1 or q.type = 2) and q.answer = ea.answer,1,null)) benar,
                count(IF((q.type = 1 or q.type = 2) and q.answer != ea.answer,1,null)) salah
            FROM questions q
                 INNER JOIN question_type qt on qt.id_q_type = q.type
                 INNER JOIN users us ON us.id = q.created_by
                 LEFT JOIN exam_answers ea on q.id_question = ea.id_question
            WHERE q.id_company = :id_company AND q.id_exam = :id_exam AND q.is_deleted = 0
            GROUP BY q.id_question ASC";

        $queryBindings = [
            'id_company' => $my->active_session,
            'id_exam' => $exam->id_exam
        ];

        $questionsQuery = DB::select($queryString, $queryBindings);

        return datatables()->of($questionsQuery)->toJson();


//        $question = QuestionModel::where('id_exam', '=', $exam->id_exam)
//            ->where('id_company', '=', auth()->user()->active_session)
//            ->where('is_deleted', '=', 0);
//
//        return datatables()->of($question)
//            ->editColumn('question', function ($data) {
//                return strip_tags($data->question);
//            })->toJson();

        // return datatables()->of($question)->toJson();
    }

    public function createQuestionObj(Request $request, $uuid)
    {
        $exam = ExamModel::where('id_company', '=', auth()->user()->active_session)
            ->where('uuid', '=', $uuid)
            ->first();
        $nav = [
            'menu' => 'assisted_test',
            'submenu' => 'manage',
            'widgetmenu' => 'question',
        ];

        $pageView = '';
        if (empty($request->type)) {
            $pageView = 'pages.srv_admin.assisted_test.manage.questions.create-1';
        } else if ($request->type == 2) {
            $pageView = 'pages.srv_admin.assisted_test.manage.questions.create-2';
        } else if ($request->type == 3) {
            $pageView = 'pages.srv_admin.assisted_test.manage.questions.create-3';
        } else {
            $pageView = 'pages.srv_admin.assisted_test.manage.questions.create-1';
        }

        return view($pageView)
            ->with(compact('nav', 'exam'));
    }

    public function questionObjStore(Request $request, $uuid)
    {
        $exam = ExamModel::where('id_company', '=', auth()->user()->active_session)
            ->where('uuid', '=', $uuid)
            ->first();

        $validateData = Validator::make($request->all(), [
            'question_text' => 'required',
            'optiontext.*' => 'required',
            'randkey.*' => 'required',
            'answer' => 'required',
            'q_score' => 'required|numeric|min:1'
        ]);

        if ($validateData->passes()) {
            $question = DB::transaction(function () use ($request, $exam) {
                $question = QuestionModel::create([
                    'id_company' => auth()->user()->active_session,
                    'id_exam' => $exam->id_exam,
                    'question' => $request->question_text,
                    'type' => 1,
                    'score' => $request->q_score,
                    'answer' => $request->answer,
                    'created_by' => auth()->user()->id,
                ]);

                for ($i = 0; $i < count($request->randkey); $i++) {
                    QuestionOptionsModel::create([
                        'id_company' => auth()->user()->active_session,
                        'id_question' => $question->id_question,
                        'optiontext' => $request->optiontext[$i],
                        'randkeys' => $request->randkey[$i],
                        'created_by' => auth()->user()->id,
                    ]);
                }

                Session::flash('q_saved');
                return $question;

            });

            return response()->json(['success' => 'Saved', 'uuid' => $question, 'data' => $request->all()]);
        }

        return response()->json(['error' => $validateData->errors()->getMessages(), 'data' => $request->all()]);
    }

    public function questionTFStore(Request $request, $uuid)
    {
        $exam = ExamModel::where('id_company', '=', auth()->user()->active_session)
            ->where('uuid', '=', $uuid)
            ->first();

        $validateData = Validator::make($request->all(), [
            'question_text' => 'required',
            'answer' => 'required',
            'q_score' => 'required|numeric|min:1'
        ]);

        if ($validateData->passes()) {
            $question = DB::transaction(function () use ($request, $exam) {
                $question = QuestionModel::create([
                    'id_company' => auth()->user()->active_session,
                    'id_exam' => $exam->id_exam,
                    'question' => $request->question_text,
                    'type' => 2,
                    'score' => $request->q_score,
                    'answer' => $request->answer,
                    'created_by' => auth()->user()->id,
                ]);

                Session::flash('q_saved');
                return $question;

            });

            return response()->json(['success' => 'Saved', 'uuid' => $question, 'data' => $request->all()]);
        }

        return response()->json(['error' => $validateData->errors()->getMessages(), 'data' => $request->all()]);
    }

    public function questionEsayStore(Request $request, $uuid)
    {
        $exam = ExamModel::where('id_company', '=', auth()->user()->active_session)
            ->where('uuid', '=', $uuid)
            ->first();

        $validateData = Validator::make($request->all(), [
            'question_text' => 'required',
            'answer' => 'required',
            'q_score' => 'required|numeric|min:1'
        ]);

        if ($validateData->passes()) {
            $question = DB::transaction(function () use ($request, $exam) {
                $question = QuestionModel::create([
                    'id_company' => auth()->user()->active_session,
                    'id_exam' => $exam->id_exam,
                    'question' => $request->question_text,
                    'type' => 3,
                    'score' => $request->q_score,
                    'answer' => $request->answer,
                    'created_by' => auth()->user()->id,
                ]);

                Session::flash('q_saved');
                return $question;

            });

            return response()->json(['success' => 'Saved', 'uuid' => $question, 'data' => $request->all()]);
        }

        return response()->json(['error' => $validateData->errors()->getMessages(), 'data' => $request->all()]);
    }

    public function questionStore(Request $request, $uuid)
    {
        $type = $request->questType;
        if ($type == 1) {
            $response = $this->questionObjStore($request, $uuid);
        } else if ($type == 2) {
            $response = $this->questionTFStore($request, $uuid);
        } else if ($type == 3) {
            $response = $this->questionEsayStore($request, $uuid);
        } else {
            header('HTTP/1.0 400 Bad error', true, 400);
            exit();
        }

        return $response;
    }

    public function questionEdit($uuid, $id)
    {
        $exam = ExamModel::where('id_company', '=', auth()->user()->active_session)
            ->where('uuid', '=', $uuid)
            ->first();

        $question = QuestionModel::where('id_company', '=', auth()->user()->active_session)
            ->where('id_question', '=', $id)->first();

        if (!$question) {
            return redirect()->route('srv_admin.assistedtest.questions', $exam->uuid);
        }

        $nav = [
            'menu' => 'assisted_test',
            'submenu' => 'manage',
            'widgetmenu' => 'question',
        ];

        if ($question->type == 1) {
            $qOptions = QuestionOptionsModel::where('id_question', '=', $question->id_question)
                ->get();

            $viewPage = 'pages.srv_admin.assisted_test.manage.questions.edit-1';
            $viewData = compact('nav', 'exam', 'question', 'qOptions');
        } else if ($question->type == 2) {

            $viewPage = 'pages.srv_admin.assisted_test.manage.questions.edit-2';
            $viewData = compact('nav', 'exam', 'question');
        } else if ($question->type == 3) {
            $viewPage = 'pages.srv_admin.assisted_test.manage.questions.edit-3';
            $viewData = compact('nav', 'exam', 'question');
        } else {
            return abort(404);
        }

        return view($viewPage)
            ->with($viewData);
    }

    public function questionObjUpdate(Request $request, $uuid)
    {
        $exam = ExamModel::where('id_company', '=', auth()->user()->active_session)
            ->where('uuid', '=', $uuid)
            ->first();

        $validateData = Validator::make($request->all(), [
            'id_question' => 'required',
            'question_text' => 'required',
            'optiontext.*' => 'required',
            'randkey.*' => 'required',
            'answer' => 'required',
            'q_score' => 'required|numeric|min:1'
        ]);

        if ($validateData->passes()) {
            $question = DB::transaction(function () use ($request, $exam) {
                $question = QuestionModel::where('id_company', '=', auth()->user()->active_session)
                    ->where('id_question', '=', $request->id_question)
                    ->update([
                        'question' => $request->question_text,
                        'score' => $request->q_score,
                        'answer' => $request->answer,
                        'updated_by' => auth()->user()->id,
                        'updated_at' => Carbon::now()
                    ]);

                for ($i = 0; $i < count($request->randkey); $i++) {
                    QuestionOptionsModel::where('id_question', '=', $request->id_question)
                        ->where('randkeys', '=', $request->randkey[$i])
                        ->update([
                            'optiontext' => $request->optiontext[$i],
                            'updated_by' => auth()->user()->id,
                            'updated_at' => Carbon::now()
                        ]);
                }

                Session::flash('q_saved');
                return $question;

            });

            return response()->json(['success' => 'Saved', 'uuid' => $question, 'data' => $request->all()]);
        }

        return response()->json(['error' => $validateData->errors()->getMessages(), 'data' => $request->all()]);
    }

    public function questionTFUpdate(Request $request, $uuid)
    {
        $exam = ExamModel::where('id_company', '=', auth()->user()->active_session)
            ->where('uuid', '=', $uuid)
            ->first();

        $validateData = Validator::make($request->all(), [
            'id_question' => 'required',
            'question_text' => 'required',
            'answer' => 'required',
            'q_score' => 'required|numeric|min:1'
        ]);

        if ($validateData->passes()) {
            $question = DB::transaction(function () use ($request, $exam) {
                $question = QuestionModel::where('id_company', '=', auth()->user()->active_session)
                    ->where('id_question', '=', $request->id_question)
                    ->update([
                        'question' => $request->question_text,
                        'score' => $request->q_score,
                        'answer' => $request->answer,
                        'updated_by' => auth()->user()->id,
                        'updated_at' => Carbon::now()
                    ]);

                Session::flash('q_saved');
                return $question;
            });

            return response()->json(['success' => 'Saved', 'uuid' => $question, 'data' => $request->all()]);
        }

        return response()->json(['error' => $validateData->errors()->getMessages(), 'data' => $request->all()]);
    }

    public function questionEsayUpdate(Request $request, $uuid)
    {
        $exam = ExamModel::where('id_company', '=', auth()->user()->active_session)
            ->where('uuid', '=', $uuid)
            ->first();

        $validateData = Validator::make($request->all(), [
            'id_question' => 'required',
            'question_text' => 'required',
            'answer' => 'required',
            'q_score' => 'required|numeric|min:1'
        ]);

        if ($validateData->passes()) {
            $question = DB::transaction(function () use ($request, $exam) {
                $question = QuestionModel::where('id_company', '=', auth()->user()->active_session)
                    ->where('id_question', '=', $request->id_question)
                    ->update([
                        'question' => $request->question_text,
                        'score' => $request->q_score,
                        'answer' => $request->answer,
                        'updated_by' => auth()->user()->id,
                        'updated_at' => Carbon::now()
                    ]);


                Session::flash('q_saved');
                return $question;

            });

            return response()->json(['success' => 'Saved', 'uuid' => $question, 'data' => $request->all()]);
        }

        return response()->json(['error' => $validateData->errors()->getMessages(), 'data' => $request->all()]);
    }

    public function questionUpdate(Request $request, $uuid)
    {
        $type = $request->questType;
        if ($type == 1) {
            $response = $this->questionObjUpdate($request, $uuid);
        } else if ($type == 2) {
            $response = $this->questionTFUpdate($request, $uuid);
        } else if ($type == 3) {
            $response = $this->questionEsayUpdate($request, $uuid);
        } else {
            header('HTTP/1.0 400 Bad error', true, 400);
            exit();
        }
        return $response;
    }

    public function questionDelete(Request $request, $uuid)
    {
        $exam = ExamModel::where('id_company', '=', auth()->user()->active_session)
            ->where('uuid', '=', $uuid)
            ->first();

        $validateData = Validator::make($request->all(), [
            'id_question' => 'required',
        ]);

        if ($validateData->passes()) {
            $question = DB::transaction(function () use ($request, $exam) {
                $question = QuestionModel::where('id_company', '=', auth()->user()->active_session)
                    ->where('id_question', '=', $request->id_question)
                    ->update([
                        'is_deleted' => 1,
                        'deleted_by' => auth()->user()->id,
                        'deleted_at' => Carbon::now()
                    ]);
                Session::flash('q_saved');
                return $question;
            });

            return response()->json(['success' => 'Saved', 'uuid' => $question, 'data' => $request->all()]);
        }

        return response()->json(['error' => $validateData->errors()->getMessages(), 'data' => $request->all()]);
    }

    public function searchExam(Request $request, $uuid)
    {
        $exam = ExamModel::where('id_company', '=', auth()->user()->active_session)
            ->where('uuid', '=', $uuid)
            ->first();

        $alAssosiate = QuestionAdvModel::select('imported_from')
            ->where('id_company', '=', auth()->user()->active_session)
            ->where('id_exam', '=', $exam->id_exam)
            ->where('is_deleted', '=', 0)
            ->get()->pluck('imported_from');

        if (isset($request->searchTerm)) {

            $exams = ExamModel::where('id_company', '=', auth()->user()->active_session)
                ->whereNotIn('id_exam', $alAssosiate)
                ->where('id_exam', '!=', $exam->id_exam)
                ->where('title', 'like', '%' . $request->searchTerm . '%')
                ->get();
        } else {

            $exams = ExamModel::where('id_company', '=', auth()->user()->active_session)
                ->whereNotIn('id_exam', $alAssosiate)
                ->where('id_exam', '!=', $exam->id_exam)
                ->get();
        }

        $response = array();

        $i = 1;
        foreach ($exams as $exam) {
            $response[] = array(
                "id" => 'KD' . $i,
                "text" => $exam->title,
                "uuid" => $exam->uuid,
                "total_questions" => $exam->questionsCount(),
            );

            $i++;
        }
        return json_encode($response);
    }

    public function linkQuestion(Request $request, $uuid)
    {
        $exam = ExamModel::where('id_company', '=', auth()->user()->active_session)
            ->where('uuid', '=', $uuid)
            ->first();

        if (!$exam) {
            header('HTTP/1.0 400 Bad error', true, 400);
            exit();
        };

        $selectedExam = ExamModel::where('uuid', '=', $request->uuid)->first();

        if (!$selectedExam) {
            header('HTTP/1.0 400 Bad error', true, 400);
            exit();
        };

        $validateData = Validator::make($request->all(), [
            'selected_exam' => 'required',
            'picked' => 'numeric|min:0|max:' . $selectedExam->questions->count(),
        ]);


        if ($validateData->passes()) {


            $questionLink = QuestionAdvModel::create([
                'id_company' => auth()->user()->active_session,
                'id_exam' => $exam->id_exam,
                'imported_from' => $selectedExam->id_exam,
                'picked' => $request->picked,
                'created_by' => auth()->user()->id,
            ]);

            return response()->json(['success' => 'Saved', 'uuid' => $exam->uuid, 'data' => $request->all()]);
        }

        return response()->json(['error' => $validateData->errors()->getMessages(), 'data' => $request->all()]);
    }

    public function linkedQuestions($uuid)
    {
        $exam = ExamModel::where('id_company', '=', auth()->user()->active_session)
            ->where('uuid', '=', $uuid)
            ->first();

        $externalQues = QuestionAdvModel::where('exam_questions_adv.id_exam', '=', $exam->id_exam)
            ->join('exams', 'exams.id_exam', '=', 'exam_questions_adv.imported_from')
            ->where('exam_questions_adv.is_deleted', '=', 0);

        try {
            return datatables()->of($externalQues)->toJson();
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function linkedQuestionEdit($uuid, $idLink)
    {
        $exam = ExamModel::where('id_company', '=', auth()->user()->active_session)
            ->where('uuid', '=', $uuid)
            ->first();

        $externalQues = QuestionAdvModel::select('exams.title', 'picked', 'imported_from', 'id_exam_question')
            ->where('exam_questions_adv.id_exam', '=', $exam->id_exam)
            ->where('id_exam_question', '=', $idLink)
            ->join('exams', 'exams.id_exam', '=', 'exam_questions_adv.imported_from')
            ->first();

        $selectedExam = ExamModel::where('id_exam', '=', $externalQues->imported_from)->first();

        return response()->json(['data' => $externalQues, 'max_picked' => $selectedExam->questions->count()]);
    }

    public function linkQuestionUpdate(Request $request, $uuid)
    {
        $exam = ExamModel::where('id_company', '=', auth()->user()->active_session)
            ->where('uuid', '=', $uuid)
            ->first();

        if (!$exam) {
            header('HTTP/1.0 400 Bad error', true, 400);
            exit();
        };

        $selectedExam = ExamModel::where('uuid', '=', $request->uuid)->first();

        if (!$selectedExam) {
            header('HTTP/1.0 400 Bad error', true, 400);
            exit();
        };

        $validateData = Validator::make($request->all(), [
            'picked' => 'numeric|min:0|max:' . $selectedExam->questions->count(),
        ]);


        if ($validateData->passes()) {
            $questionLink = QuestionAdvModel::where('id_exam_question', '=', $request->id_picked)
                ->where('id_company', '=', auth()->user()->active_session)
                ->update([
                    'picked' => $request->picked,
                    'updated_by' => auth()->user()->id,
                    'updated_at' => Carbon::now()
                ]);

            return response()->json(['success' => 'Saved', 'uuid' => $exam->uuid, 'data' => $request->all()]);
        }

        return response()->json(['error' => $validateData->errors()->getMessages(), 'data' => $request->all()]);
    }

    public function linkedExamRemove(Request $request, $uuid)
    {
        $exam = ExamModel::where('id_company', '=', auth()->user()->active_session)
            ->where('uuid', '=', $uuid)
            ->first();

        if (!$exam) {
            header('HTTP/1.0 400 Bad error', true, 400);
            exit();
        };

        $selectedExam = ExamModel::where('uuid', '=', $request->uuid)->first();

        if (!$selectedExam) {
            header('HTTP/1.0 400 Bad error', true, 400);
            exit();
        };

        $validateData = Validator::make($request->all(), [
            'id_picked' => 'required',
        ]);


        if ($validateData->passes()) {
            $questionLink = QuestionAdvModel::where('id_exam_question', '=', $request->id_picked)
                ->where('id_company', '=', auth()->user()->active_session)
                ->update([
                    'is_deleted' => 1,
                    'deleted_by' => auth()->user()->id,
                    'deleted_at' => Carbon::now(),
                ]);

            return response()->json(['success' => 'Saved', 'uuid' => $exam->uuid, 'data' => $request->all()]);
        }
        return response()->json(['error' => $validateData->errors()->getMessages(), 'data' => $request->all()]);
    }

    public function examResult(Request $request, $uuid, $id)
    {
        $exam = ExamModel::where('id_company', '=', auth()->user()->active_session)
            ->where('uuid', '=', $uuid)
            ->first();

        if (!$exam) {
            return redirect()->route('srv_admin.assistedtest.show');
        }

        $user = ExamParticipantModel::where('id_participant', '=', $id)
            ->join('users', 'users.id', '=', 'id_participant')
            ->where('id_exam', '=', $exam->id_exam)
            ->where('id_company', '=', auth()->user()->active_session)
            ->first();

        // if (!$user || $user->exam_start == '' || $user->exam_end == '') return redirect()->route('srv_admin.assistedtest.participants', $exam->uuid);

        if ($request->type == 'all') {
            $questions = QuestionModel::select('questions.question', 'questions.id_question', 'questions.type', 'exam_answers.answer as panswer', 'questions.answer as key', 'questions.score', 'exam_answers.sys_score', 'exam_answers.id_answer')
                ->join('exam_answers', 'exam_answers.id_question', '=', 'questions.id_question')
                ->where('exam_answers.id_company', '=', auth()->user()->active_session)
                ->where('exam_answers.id_exam', '=', $exam->id_exam)
                ->where('exam_answers.id_participant', '=', $request->id)
                ->where('questions.is_deleted', '=', 0)
                ->orderBy('exam_answers.id_answer', 'ASC')
                ->get();
        } else {
            $questions = QuestionModel::select('questions.question', 'questions.id_question', 'questions.type', 'exam_answers.answer as panswer', 'questions.answer as key', 'questions.score', 'exam_answers.sys_score', 'exam_answers.id_answer')
                ->join('exam_answers', 'exam_answers.id_question', '=', 'questions.id_question')
                ->where('exam_answers.id_company', '=', auth()->user()->active_session)
                ->where('exam_answers.id_exam', '=', $exam->id_exam)
                ->where('exam_answers.id_participant', '=', $request->id)
                ->where('questions.type', '=', 3)
                ->where('questions.is_deleted', '=', 0)
                ->orderBy('exam_answers.id_answer', 'ASC')
                ->get();
        }

        $next = $exam->participants->where('id_participant', '>', $id)->sortBy('id_participant')->first();
        $previous = $exam->participants->where('id_participant', '<', $id)->sortByDesc('id_participant')->first();

        $navigate = [
            'next' => ($next) ? $next->id_participant : '',
            'previous' => ($previous) ? $previous->id_participant : ''
        ];

        $nav = [
            'menu' => 'assisted_test',
            'submenu' => 'manage',
            'widgetmenu' => 'participant',
        ];

        return view('pages.srv_admin.assisted_test.manage.participant.view')
            ->with(compact('exam', 'questions', 'user', 'nav', 'navigate'));

    }

    public function examResultUpdate(Request $request, $uuid)
    {
        $exam = ExamModel::where('id_company', '=', auth()->user()->active_session)
            ->where('uuid', '=', $uuid)
            ->first();

        if (!$exam) {
            header('HTTP/1.0 400 Bad error', true, 400);
            exit();
        }

        $newScore = DB::transaction(function () use ($request, $exam) {
            foreach ($request->all() as $key => $item) {
                $idAnswer = str_replace('answer-', '', $key);
                ExamAnswerModel::where('id_answer', '=', $idAnswer)
                    ->where('id_company', '=', auth()->user()->active_session)
                    ->where('id_exam', '=', $exam->id_exam)
                    ->where('id_participant', '=', $request->id)
                    ->update([
                        'sys_score' => $item
                    ]);
            }

            $newScore = ExamAnswerModel::where('id_company', '=', auth()->user()->active_session)
                ->where('id_exam', '=', $exam->id_exam)
                ->where('id_participant', '=', $request->id)
                ->sum('sys_score');

            $maxScore = ExamAnswerModel::join('questions', 'questions.id_question', '=', 'exam_answers.id_question')
                ->where('exam_answers.id_exam', '=', $exam->id_exam)
                ->where('exam_answers.id_participant', '=', $request->id)
                ->where('exam_answers.id_company', '=', auth()->user()->active_session)
                ->sum('questions.score');

            $newFinalScore = round(($newScore / $maxScore) * 100, 2);

            ExamParticipantModel::where('id_company', '=', auth()->user()->active_session)
                ->where('id_exam', '=', $exam->id_exam)
                ->where('id_participant', '=', $request->id)
                ->update([
                    'final_result' => $newFinalScore
                ]);

            return $newFinalScore;
        });

        return response()->json(['newscore' => $newScore]);
    }

    public function withCoursesRelationsPage($uuid){
        $exam = ExamModel::where('id_company', '=', auth()->user()->active_session)
            ->where('uuid', '=', $uuid)
            ->first();

        $nav = [
            'menu' => 'assisted_test',
            'submenu' => 'manage',
            'widgetmenu' => 'courses_rel',
        ];

        return view('pages.srv_admin.assisted_test.manage.with_courses_rel')
            ->with(compact('nav', 'exam'));
    }

    public function hasRelationsWith($uuid){
    
        $queryString = 
            "SELECT ecr.id_relation, c.title  FROM exams e 
            INNER JOIN exams_courses_relations ecr ON ecr.id_exam = e.id_exam
            INNER JOIN courses c ON c.id_courses = ecr.id_courses
                WHERE e.id_company = ? AND 
                    e.uuid = ? AND 
                    e.is_deleted = 0 AND
                    c.is_deleted = 0";
        $queryBindings = [
            auth()->user()->active_session,
            $uuid
        ];

        $queryResult = DB::select($queryString,$queryBindings);

        return datatables()->of($queryResult)->toJson();
    }

    public function withCoursesRelations(Request $request){
        $my = auth()->user();

        if($request->type == 'edit'){

            if (isset($request->searchTerm)) {
                $getAlreadyRelated = ExamsCoursesRelModel::where('id_exam','=',$request->id_exam)
                    ->where('id_company','=',$my->active_session)
                    ->get()->pluck('id_courses')->toArray();

                $courses = CoursesModel::where('id_company','=',$my->active_session)
                    ->where('is_deleted','=',0)
                    ->whereNotIn('id_courses',$getAlreadyRelated)
                    ->where('title','like','%'.$request->searchTerm.'%')
                    ->get();
            }else{
                $getAlreadyRelated = ExamsCoursesRelModel::where('id_exam','=',$request->id_exam)
                    ->where('id_company','=',$my->active_session)
                    ->get()->pluck('id_courses')->toArray();

                $courses = CoursesModel::where('id_company','=',$my->active_session)
                    ->where('is_deleted','=',0)
                    ->whereNotIn('id_courses',$getAlreadyRelated)
                    ->get();
            }
            
        }else{
            $courses = CoursesModel::where('id_company','=',$my->active_session)
                ->where('is_deleted','=',0)
                ->get();
        }
        

        $response = array();

        foreach($courses as $item){
            $response[] = array(
                'id' => 'courses.'.$item->id_courses,
                'text' => $item->title,
            ); 
        }
        
        return json_encode($response);
    }

    public function storeRelations(Request $request, $uuid){
        $bulkRel = array();

        $validateData = Validator::make($request->all(),[
            'selected_elearning'=>'required'
        ]);

        if($validateData->passes()){
            foreach($request->selected_elearning as $item){
                $real_courses_id = explode('.',$item)[1];
                $bulkRel[] = array(
                    'id_exam' => $this->current_exam->id_exam,
                    'id_courses' => $real_courses_id,
                    'id_company' => auth()->user()->active_session,
                    'created_by' => auth()->id(),
                );
            }
    
            ExamsCoursesRelModel::insert($bulkRel);

            return response()->json(['success']);
        }

        return response()->json(['error'=>$validateData->errors()->getMessages()]);
        
    }

    public function removeRelation(Request $request, $uuid){
        $relations = ExamsCoursesRelModel::where('id_exam','=',$this->current_exam->id_exam)
            ->where('id_relation','=',$request->id_relation)
            ->where('id_company','=',auth()->user()->active_session)
            ->first();

        if($relations){
            $relations->delete();
        }

        return response()->json(['success']);
    }

}
