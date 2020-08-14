<?php

namespace App\Http\Controllers\SaaSAdmin\Monitor;

use App\Events\UpdateNotifications;
use App\Http\Controllers\Controller;
use App\Models\Companies\CompaniesModel;
use App\Models\Learning\CoursesModel;
use App\Models\Learning\CoursesTaskModel;
use App\Models\Learning\TeachMaterialsModel;
use App\Models\NotificationsModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables;

class ELearningMonitorController extends Controller
{

	private $currentCompany;
	public function __construct(Request $request)
	{
	    if (isset($request->route()->parameters()['id_company'])){
            $id_company = $request->route()->parameters()['id_company'];

            $company = CompaniesModel::find($id_company);
            if(!$company) return redirect()->route('sudo.customers.monitor.list');
            $this->currentCompany = $company;
        }


		if(isset($request->route()->parameters()['id_courses'])){
            $id_courses = $request->route()->parameters()['id_courses'];

            $courses = CoursesModel::find($id_courses);
            if(!$courses) return redirect()->route('sudo.customers.monitor.courses.list',$id_company);
        }
	}

	public function coursesList($id_company)
	{

		$nav = [
            'menu' => 'm-elearning',
			'submenu' => '',

        ];

        $managed = [
            'id_company' => $id_company,
            'company' => $this->currentCompany,
        ];
        // dd($logData);
        return view('pages.saas_admin.customers.monitor.elearning.list')
            ->with(compact('nav','managed'));
	}

	public function courses($id_company, $id_courses)
	{
		$courses = CoursesModel::find($id_courses);
		if(!$courses) return redirect()->route('sudo.customers.monitor.courses.list',$id_company);

		$nav = [
            'menu' => 'm-elearning',
			'submenu' => '',
			'widgetmenu' => 'overview',
        ];

        $managed = [
            'id_company' => $id_company,
            'company' => $this->currentCompany,
        ];
        // dd($logData);
        return view('pages.saas_admin.customers.monitor.elearning.pages.overview')
            ->with(compact('nav','managed','courses'));
	}

    public function remove(Request $request){
        $my = auth()->user();

        $courses = CoursesModel::where('id_courses',$request->id_courses)
            ->where('id_company','=', $request->id_company)
            ->first();

        if(Hash::check($request->password,$my->password) && $courses){
            $courses->update([
                'is_deleted' => 1,
                'deleted_at' => Carbon::now(),
                'deleted_by' => $my->id
            ]);

            return response()->json(['success'=>'']);
        }

        return response()->json(['error'=>'1']);
    }

	public function teachMaterials($id_company, $id_courses)
	{
		$courses = CoursesModel::find($id_courses);
		if(!$courses) return redirect()->route('sudo.customers.monitor.courses.list',$id_company);

		$nav = [
            'menu' => 'm-elearning',
			'submenu' => '',
			'widgetmenu' => 'teach',
        ];

        $managed = [
			'id_company' => $id_company,
			'company' => $this->currentCompany,
        ];
        // dd($logData);
        return view('pages.saas_admin.customers.monitor.elearning.pages.teach.teach-materials')
            ->with(compact('nav','managed','courses'));
	}

	public function teachMaterialDetail($id_company, $id_courses, $id_teachmaterials)
	{
		$courses = CoursesModel::find($id_courses);
		if(!$courses) return redirect()->route('sudo.customers.monitor.courses.list',$id_company);
		$teach = TeachMaterialsModel::where('id_courses','=',$courses->id_courses)
			->where('id_tech_material','=',$id_teachmaterials)->first();

		$nav = [
            'menu' => 'm-elearning',
			'submenu' => '',
			'widgetmenu' => 'teach',
        ];

        $managed = [
			'id_company' => $id_company,
			'company' => $this->currentCompany,
        ];
        // dd($logData);
        return view('pages.saas_admin.customers.monitor.elearning.pages.teach.details')
            ->with(compact('nav','managed','courses','teach'));
	}

    public function deleteTeachMaterials(Request $request, $id_company, $id_courses){
        $courses = CoursesModel::where('id_company','=',$id_company)
            ->where('id_courses','=',$id_courses)
            ->first();

        if(!$courses) return abort(404);

        $teach = DB::transaction(function() use ($request, $id_company, $id_courses, $courses){

            $teach = TeachMaterialsModel::where('id_courses','=', $courses->id_courses)
                ->where('id_tech_material','=',$request->teach_material)
                ->first();

            $teach->update([
                'deleted_at' => Carbon::now(),
                'deleted_by' => auth()->id(),
                'is_deleted' => 1
            ]);

            return $teach;
        });

        return response()->json(['success'=>$teach]);
    }

	public function tasks($id_company, $id_courses)
	{
		$courses = CoursesModel::find($id_courses);
		if(!$courses) return redirect()->route('sudo.customers.monitor.courses.list',$id_company);

		$nav = [
            'menu' => 'm-elearning',
			'submenu' => '',
			'widgetmenu' => 'task',
        ];

        $managed = [
			'id_company' => $id_company,
			'company' => $this->currentCompany,
        ];
        // dd($logData);
        return view('pages.saas_admin.customers.monitor.elearning.pages.task.list')
            ->with(compact('nav','managed','courses'));
	}

	public function taskDetails($id_company, $id_courses, $id_task)
	{
		$courses = CoursesModel::find($id_courses);
		if(!$courses) return redirect()->route('sudo.customers.monitor.courses.list',$id_company);
		$task = CoursesTaskModel::where('id_courses','=',$courses->id_courses)
			->where('id_task','=',$id_task)->first();

		$nav = [
            'menu' => 'm-elearning',
			'submenu' => '',
			'widgetmenu' => 'task',
        ];

        $managed = [
			'id_company' => $id_company,
			'company' => $this->currentCompany,
        ];
        // dd($logData);
        return view('pages.saas_admin.customers.monitor.elearning.pages.task.details')
            ->with(compact('nav','managed','courses','task'));
	}

    public function taskDelete(Request $request, $id_company, $id_courses)
    {
        $courses = CoursesModel::where('id_company','=',$id_company)
            ->where('id_courses','=',$id_courses)
            ->first();

        if(!$courses) return abort(404);

        $task = DB::transaction(function() use ($request, $id_company, $id_courses, $courses){
            $task = CoursesTaskModel::where('id_courses','=',$courses->id_courses)
                ->where('id_task','=',$request->id_task)->first();

            $task->update([
                'deleted_at' => Carbon::now(),
                'deleted_by' => auth()->id(),
                'is_deleted' => 1,
            ]);

            $usersId = NotificationsModel::where('notif_owner','=',$task->id_task)
                ->where('notif_type','=','task')
                ->get()->pluck('notifiable_id')->toArray();

            NotificationsModel::where('notif_owner','=',$task->id_task)
                ->where('notif_type','=','task')->delete();

            foreach($usersId as $id){
                broadcast(new UpdateNotifications($id));
            }

            return $task;
        });

        return response()->json(['success'=>$task]);
    }

	public function participants($id_company, $id_courses)
	{
		$courses = CoursesModel::find($id_courses);
		if(!$courses) return redirect()->route('sudo.customers.monitor.courses.list',$id_company);

		$nav = [
            'menu' => 'm-elearning',
			'submenu' => '',
			'widgetmenu' => 'participant',
        ];

        $managed = [
			'id_company' => $id_company,
			'company' => $this->currentCompany,
        ];
        // dd($logData);
        return view('pages.saas_admin.customers.monitor.elearning.pages.participant.list')
            ->with(compact('nav','managed','courses'));
	}

	public function coursesListJson($id_company)
	{
		$courses = CoursesModel::where('id_company','=',$id_company);

		$queryBindings = [
			'id_company'=>$id_company,
		];
		$queryString =
		'SELECT
			 courses.id_courses as id_c,
			 courses.id_company as id_company,
			 courses.title as title,
			 courses.created_at as created_at,
			 users.name as name,
			 count(DISTINCT(courses_participant.id_participant)) as partisipant,
			 count(DISTINCT(courses_teach_materials.id_tech_material)) as materials
		FROM courses
		INNER JOIN users ON users.id = courses.created_by
		LEFT JOIN courses_teach_materials on courses_teach_materials.id_courses = courses.id_courses
		INNER JOIN courses_participant ON courses_participant.id_courses = courses.id_courses
		WHERE courses.id_company = :id_company AND courses.is_deleted = 0
		GROUP BY courses.id_courses';

		$coursesQuery = DB::select($queryString,$queryBindings);
		// dd($coursesQuery);

		return datatables()->of($coursesQuery)->toJson();
	}

	public function teachMaterialsJson($id_company, $id_courses)
	{
		$queryString =
		'SELECT
			courses_teach_materials.id_tech_material,
			courses_teach_materials.location,
			courses_teach_materials.title,
			courses_teach_materials.main_file_path,
			courses_teach_materials.created_at,
			courses_teach_materials.id_courses as id_c,
            courses_teach_materials.id_company,
			users.name as name
		FROM courses_teach_materials
		INNER JOIN users ON users.id = courses_teach_materials.created_by
		WHERE id_company = ? AND id_courses = ? AND is_deleted = 0';

		$queryBindings = [
			$id_company,
			$id_courses
		];

		$teachQuery = DB::select($queryString,$queryBindings);

		return datatables()->of($teachQuery)->toJson();
	}

	public function taskListJson($id_company, $id_courses)
	{
		$queryString =
		'SELECT
			courses_task.id_task,
			courses_task.id_company,
			courses_task.id_courses,
			courses_task.title,
			courses_task.created_at,
			users.name as name
		FROM courses_task
		INNER JOIN users ON users.id = courses_task.created_by
		WHERE id_company = ? AND id_courses = ? AND is_deleted = 0';

		$queryBindings = [
			$id_company,
			$id_courses
		];

		$taskQuery = DB::select($queryString,$queryBindings);

		return datatables()->of($taskQuery)->toJson();
	}

	public function taskSubmitedJson($id_company, $id_courses, $id_task)
	{
		$queryString =
		'SELECT
			courses_task_submit.id_submit,
			courses_task_submit.created_at,
			users.name as name
		FROM courses_task_submit
		INNER JOIN users ON users.id = courses_task_submit.created_by
		WHERE id_company = ? AND id_task = ?';

		$queryBindings = [
			$id_company,
			$id_task
		];

		$taskSubmitedQuery = DB::select($queryString,$queryBindings);

		return datatables()->of($taskSubmitedQuery)->toJson();
	}

	public function partisipantsJson($id_company, $id_courses)
	{
		$queryString =
		'SELECT
			courses_participant.created_at,
			courses_participant.id_courses,
			courses_participant.id_participant,
			courses_participant.id_c_participant,
			users.name,
			users.username,
			users.email
		FROM courses_participant
		INNER JOIN users ON users.id = courses_participant.id_participant
		WHERE id_company = ? AND id_courses = ?';

		$queryBindings = [
			$id_company,
			$id_courses
		];

		$participant = DB::select($queryString, $queryBindings);

		return datatables()->of($participant)->toJson();
	}
}
