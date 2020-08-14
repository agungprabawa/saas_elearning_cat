<?php

namespace App\Http\Controllers\SaaSAdmin\Monitor;

use App\Http\Controllers\Controller;
use App\Models\AssistedTest\ExamModel;
use App\Models\AssistedTest\QuestionModel;
use App\Models\Learning\CoursesModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Companies\CompaniesModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AssistedTestMonitorController extends Controller
{
    private $currentCompany;
	public function __construct(Request $request)
	{
		$id_company = $request->route()->parameters()['id_company'];

		$company = CompaniesModel::find($id_company);
		if(!$company) return redirect()->route('sudo.customers.monitor.list');
		$this->currentCompany = $company;
    }

    public function examList($id_company)
	{

		$nav = [
            'menu' => 'm-exams',
			'submenu' => '',

        ];

        $managed = [
            'id_company' => $id_company,
            'company' => $this->currentCompany,
        ];
        // dd($logData);
        // dd($managed);
        return view('pages.saas_admin.customers.monitor.assistedtest.list')
            ->with(compact('nav','managed'));
    }

    public function exam($id_company, $id_exam)
	{
		$exam = ExamModel::find($id_exam);
		if(!$exam) return redirect()->route('sudo.customers.monitor.exams.list',$id_company);

		$nav = [
            'menu' => 'm-exams',
			'submenu' => '',
			'widgetmenu' => 'overview',
        ];

        $managed = [
            'id_company' => $id_company,
            'company' => $this->currentCompany,
        ];

        // dd($logData);
        return view('pages.saas_admin.customers.monitor.assistedtest.pages.overview')
            ->with(compact('nav','managed','exam'));
	}

    public function remove(Request $request, $id_company){
        $my = auth()->user();

        $exam = ExamModel::where('id_exam',$request->id_exam)
            ->where('id_company','=', $id_company)
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

	public function questions($id_company, $id_exam)
	{
		$exam = ExamModel::find($id_exam);
		if(!$exam) return redirect()->route('sudo.customers.monitor.exams.list',$id_company);

		$nav = [
            'menu' => 'm-exams',
			'submenu' => '',
			'widgetmenu' => 'questions',
        ];

        $managed = [
            'id_company' => $id_company,
            'company' => $this->currentCompany,
        ];

        // dd($logData);
        return view('pages.saas_admin.customers.monitor.assistedtest.pages.questions')
            ->with(compact('nav','managed','exam'));
	}

    public function questionDelete(Request $request, $id_company, $id_exam)
    {
        $exam = ExamModel::where('id_company', '=', $id_company)
            ->where('id_exam', '=', $id_exam)
            ->first();

        $question = DB::transaction(function () use ($request, $exam, $id_company, $id_exam) {
            $question = QuestionModel::where('id_company', '=', $id_company)
                ->where('id_question', '=', $request->id_question)
                ->update([
                    'is_deleted' => 1,
                    'deleted_by' => auth()->user()->id,
                    'deleted_at' => Carbon::now()
                ]);
        });

        return response()->json(['success' => 'Saved', 'uuid' => $question, 'data' => $request->all()]);

    }

    public function participants($id_company, $id_exam)
    {
        $exam = ExamModel::find($id_exam);
        if(!$id_exam) return redirect()->route('sudo.customers.monitor.exams.list',$id_company);

        $nav = [
            'menu' => 'm-exams',
            'submenu' => '',
            'widgetmenu' => 'participant',
        ];

        $managed = [
            'id_company' => $id_company,
            'company' => $this->currentCompany,
        ];
        // dd($logData);
        return view('pages.saas_admin.customers.monitor.assistedtest.pages.participant.list')
            ->with(compact('nav','managed','exam'));
    }

    public function examsListJson($id_company)
	{
		$queryBindings = [
			'id_company'=>$id_company,
		];
		$queryString =
		'SELECT
			 exams.id_exam,
			 exams.id_company,
			 exams.title as title,
			 exams.created_at as created_at,
			 users.name as name,
			 count(DISTINCT(exam_participant.id_participant)) as partisipant,
			 count(DISTINCT(questions.id_question)) as questions
		FROM exams
		INNER JOIN users ON users.id = exams.created_by
		LEFT JOIN questions on questions.id_exam = exams.id_exam
		INNER JOIN exam_participant ON exam_participant.id_exam = exams.id_exam
		WHERE exams.id_company = :id_company AND exams.is_deleted = 0
		GROUP BY exams.id_exam';

		$examQuery = DB::select($queryString,$queryBindings);
		// dd($coursesQuery);

		return datatables()->of($examQuery)->toJson();
	}

	public function questionsListJson($id_company, $id_exam)
	{
		$queryString =
		"SELECT
			REGEXP_REPLACE(question, '<[^>]*>+', '') as question,
			question_type.label,
			questions.created_at,
			questions.created_by,
			questions.id_question,
			questions.id_exam,
			questions.id_company,
			users.name
		FROM questions
		INNER JOIN question_type on question_type.id_q_type = questions.type
		INNER JOIN users ON users.id = questions.created_by
		WHERE questions.id_company = :id_company AND questions.id_exam = :id_exam AND questions.is_deleted = 0";

		$queryBindings = [
			'id_company' => $id_company,
			'id_exam' => $id_exam
		];

		$questionsQuery = DB::select($queryString, $queryBindings);

		return datatables()->of($questionsQuery)->toJson();
	}

	public function questionSingleJson($id_company,$id_exam,$id_questions)
	{
		$queryString =
		"SELECT
			questions.question,
			questions.answer,
			questions.created_at,
			questions.created_by,
			questions.id_question,
			questions.id_exam,
			questions.id_company,
			question_type.label as type,
			question_type.id_q_type as id_type
		FROM questions
		INNER JOIN question_type ON question_type.id_q_type = questions.type
		WHERE questions.id_question = :id_question";

		$queryBindings = [
			'id_question' => $id_questions,
		];

		$questionsQuery = collect(DB::select($queryString, $queryBindings))->first();

        $objectiveChoiceQuery = [];
		if($questionsQuery->id_type === 1){
		    $queryString2 =
                'SELECT *
                FROM questions_option
                WHERE questions_option.id_question = :id_question';

		    $queryBindings2 = [
		        'id_question' => $id_questions
            ];
		    $objectiveChoiceQuery = DB::select($queryString2,$queryBindings2);
        }

		return response()->json(['data'=>$questionsQuery,'quest_option' => $objectiveChoiceQuery]);
	}

	public function removeQuestions($id_company,$id_exam,$id_questions){
        $quest = QuestionModel::find($id_questions);
        $quest->update([
           'is_deleted' => 1
        ]);

        return response()->json(['success'=>'']);
    }

    public function partisipantsJson($id_company, $id_exam)
    {
        $queryString =
            'SELECT
			exam_participant.created_at,
			exam_participant.id_exam,
			exam_participant.id_participant,
			exam_participant.id_exam_participant,
			users.name,
			users.username,
			users.email
		FROM exam_participant
		INNER JOIN users ON users.id = exam_participant.id_participant
		WHERE id_company = ? AND id_exam = ?';

        $queryBindings = [
            $id_company,
            $id_exam
        ];

        $participant = DB::select($queryString, $queryBindings);

        return datatables()->of($participant)->toJson();
    }

}
