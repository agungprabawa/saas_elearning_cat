<?php

namespace App\Http\Controllers\SrvAdmin\Learning;

use App\Events\UpdateNotifications;
use App\Http\Controllers\Controller;
use App\Models\AssistedTest\ExamParticipantModel;
use Illuminate\Http\Request;
use App\Models\Learning\CoursesCategoriesModel;
use App\Models\Learning\CoursesModel;
use App\Models\Learning\TeachMaterialsModel;
use App\Models\Learning\CoursesParticipantModel;
use App\Models\Learning\CoursesTaskModel;
use App\Models\Learning\CoursesTaskSubmit;
use App\Models\NotificationsModel;
use App\Notifications\TaskNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
//use Validator;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Notification;

class CoursesController extends Controller
{

    public function __construct(Request $request)
    {
        if(isset($request->route()->parameters()['uuid'])){
            $courses_uuid = $request->route()->parameters()['uuid'] ?? null;
            if($courses_uuid !== null){
                $courses = CoursesModel::select('is_deleted')->where('uuid','=',$courses_uuid)->first();
                if($courses->is_deleted == 1) return abort(404);
            }
        }

    }

    public function create(){
        $coursesCategory = CoursesCategoriesModel::where('id_company','=', auth()->user()->company->id_company)
            ->where('is_deleted','=',0)
            ->orderBy('category','ASC')
            ->get();

        $nav = [
            'menu' => 'learning',
            'submenu' => 'create'
        ];

        return view('pages.srv_admin.elearning.create')
            ->with(compact('nav','coursesCategory'));
    }

    public function store(Request $request){
        $my = auth()->user();

        $validatorRule = [
            'ctitle' => 'required',
            'cdesc' => 'required',
            'start_date'    => 'required|date',
            'courses_cover' => 'image',
        ];

        if(!$request->is_no_end_time){
            $validatorRule['end_date'] = 'required|date|after_or_equal:start_date';
        }

        $validateData = Validator::make($request->all(), $validatorRule);

        if ($validateData->passes()) {
            $courses = DB::transaction(function () use ($request, $my) {
                $share_link = '';
                $user_max = 0;
                $start_date = null;
                $end_date = null;
                $courses_price = 0;
                $uuid = Str::orderedUuid();

                // Moving Cover
                $fileUrl = '';
                if($request->courses_cover){
                    $ext = $request->courses_cover->getClientOriginalExtension();
                    $fileName = Str::slug($request->ctitle.' '.strtotime('now')).'.'.$ext;
                    $request->courses_cover->move(
                        public_path('storage/' . $my->company->uuid . '/cover/'),$fileName);
                    $fileUrl = asset('storage/' . $my->company->uuid . '/cover/'.$fileName);
                }


                if ($request->is_unlimited_users) {
                    $user_max = $request->max_user;
                }

                $start_date = Carbon::parse($request->start_date)->format('Y-m-d H:i');
                if ($request->is_no_end_time) {
                    $end_date = Carbon::parse('9999-12-30')->format('Y-m-d H:i');

                }else{
                    $end_date = Carbon::parse($request->end_date)->format('Y-m-d H:i');
                }

                if (!$request->is_free_course) {
                    $courses_price = $request->course_price;
                }

                $courses = CoursesModel::create([
                    'title' => $request->ctitle,
                    'id_company' => $my->company->id_company,
                    'uuid' => $uuid,
                    'category' => $request->ccategory,
                    'descriptions' => $request->cdesc,
                    'cover_img_url' => $fileUrl,
                    'is_manual_add' => 1,
                    'is_share_link' => ($request->share_link) ? 1 : 0,
                    'is_unlimited_users' => ($request->is_unlimited_users) ? 1 : 0,
                    'max_users' => $user_max,
                    'start_date' => $start_date,
                    'is_no_end_time' => ($request->is_no_end_time) ? 1 : 0,
                    'end_date' => $end_date,
                    'is_free' => ($request->is_free_course) ? 1 : 0,
                    'is_private' => ($request->is_private) ? 1 : 0,
                    'courses_price' => $courses_price,
                    'created_by' => $my->id,
                ]);

                CoursesParticipantModel::create([
                    'id_courses'=>$courses->id_courses,
                    'id_participant' => $my->id,
                    'created_by' => $my->id,
                    'id_company' => $my->active_session,
                    'status' => 1
                ]);

                return $courses;
            });


            return response()->json(['success' => 'Saved', 'uuid' => $courses->uuid, 'data' => $request->all()]);
        }

        return response()->json(['error' => $validateData->errors()->getMessages(), 'data' => $request->all()]);
    }

    public function remove(Request $request){
        $my = auth()->user();

        $courses = CoursesModel::where('uuid',$request->uuid)
            ->where('id_company','=', $my->active_session)
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

    public function showAllCourses(Request $request){

        if (auth()->user()->active_status == 1){
            $act = '!=';
            $id_creator = '';
        }else{
            $act = '=';
            $id_creator = auth()->id();
        }

        if($request->title){
            $courses = CoursesModel::where('id_company','=',auth()->user()->active_session)
                ->where('title','like','%'.$request->title.'%')
                ->where('is_deleted','=',0)
                ->where('created_by',$act,$id_creator)
                ->paginate(6);

            $courses->appends(['title' => $request->title]);

        }else{
            $courses = CoursesModel::where('id_company','=',auth()->user()->active_session)
                ->where('is_deleted','=',0)
                ->where('created_by',$act,$id_creator)
                ->paginate(6);
        }

        $nav = [
            'menu' => 'learning',
            'submenu' => 'manage'
        ];

        return view('pages.srv_admin.elearning.manage')
            ->with(compact('nav','courses'));
    }

    public function manageCourses($uuid){
        $courses = CoursesModel::where('id_company','=',auth()->user()->active_session)
            ->where('uuid','=',$uuid)
            ->first();

        return redirect()->route('srv_admin.courses.teach',$uuid);

        // Over4view not ready yet
        $nav = [
            'menu' => 'learning',
            'submenu' => 'manage',
            'widgetmenu' => 'overview',
        ];

        return view('pages.srv_admin.elearning.manage.overview')
            ->with(compact('nav','courses'));
    }

    public function editCoursesInfo($uuid){
        $courses = CoursesModel::where('id_company','=',auth()->user()->active_session)
            ->where('uuid','=',$uuid)
            ->first();

        $coursesCategory = CoursesCategoriesModel::where('id_company','=', auth()->user()->company->id_company)
            ->where('is_deleted','=',0)
            ->orderBy('category','ASC')
            ->get();

        $nav = [
            'menu' => 'learning',
            'submenu' => 'manage',
            'widgetmenu' => 'informations',
        ];

        return view('pages.srv_admin.elearning.manage.informations')
            ->with(compact('nav','courses','coursesCategory'));
    }

    public function editCoursesConfig($uuid){
        $courses = CoursesModel::where('id_company','=',auth()->user()->active_session)
            ->where('uuid','=',$uuid)
            ->first();

        $nav = [
            'menu' => 'learning',
            'submenu' => 'manage',
            'widgetmenu' => 'config',
        ];

        return view('pages.srv_admin.elearning.manage.configuration')
            ->with(compact('nav','courses'));
    }

    public function editCoursesType($uuid)
    {
        $courses = CoursesModel::where('id_company','=',auth()->user()->active_session)
            ->where('uuid','=',$uuid)
            ->first();

        $nav = [
            'menu' => 'learning',
            'submenu' => 'manage',
            'widgetmenu' => 'type',
        ];

        return view('pages.srv_admin.elearning.manage.type')
            ->with(compact('nav','courses'));
    }

    public function updateCoursesInfo(Request $request, $uuid)
    {
        $validateData = Validator::make($request->all(),[
            'ctitle' => 'required',
            'cdesc' => 'required',

        ]);

        if($validateData->passes()){
            $courses = CoursesModel::where('uuid','=',$uuid)
                ->where('id_company','=',auth()->user()->active_session)
                ->update([
                    'title'=>$request->ctitle,
                    'category'=>$request->ccategory,
                    'descriptions'=>$request->cdesc,
                    'cover_img_url'=>$request->filepath,
                ]);
            return response()->json(['success'=>'Saved','uuid'=>$uuid,'data'=>$request->all()]);
        }
        return response()->json(['error'=>$validateData->errors()->getMessages(),'data'=>$request->all()]);
    }

    public function updateCoursesConfig(Request $request, $uuid){
        $validatorRule = [
            'start_date'    => 'required|date',
        ];

        if(!$request->is_no_end_time){
            $validatorRule['end_date'] = 'required|date|after_or_equal:start_date';
        }

        $validateData = Validator::make($request->all(),$validatorRule);

        $share_link = '';
        $user_max = 0;
        $start_date = null;
        $end_date = null;

        if(!$request->is_unlimited_users){
            $user_max = $request->max_user;
        }

        $start_date = Carbon::parse($request->start_date)->format('Y-m-d H:i');

        if($request->is_no_end_time){
            $end_date = Carbon::parse('9999-12-30')->format('Y-m-d H:i');

            // $end_time = Carbon::parse($request->end_time)->format('Y-m-d');
        }else{
            $end_date = Carbon::parse($request->end_date)->format('Y-m-d H:i');
        }

        if($validateData->passes()){
            $exam = CoursesModel::where('uuid','=',$uuid)
                ->where('id_company','=',auth()->user()->active_session)
                ->update([
                    'is_share_link'=>($request->share_link) ? 1 : 0,
                    'is_unlimited_users' => ($request->is_unlimited_users) ? 1 : 0,
                    'max_users' => $user_max,
                    'start_date' => $start_date,
                    'is_no_end_time' => ($request->is_no_end_time) ? 1 : 0,
                    'end_date' => $end_date,
                ]);
            return response()->json(['success'=>'Saved','uuid'=>$uuid,'data'=>$request->all()]);
        }
        return response()->json(['error'=>$validateData->errors()->getMessages(),'data'=>$request->all()]);
    }

    public function updateCoursesType(Request $request, $uuid)
    {
        $validateData = Validator::make($request->all(),[
            'course_price' => 'numeric|min:10000',
        ]);

        $courses_price = 0;
        if(!$request->is_free_course){
            $courses_price = $request->course_price;
        }

        if($validateData->passes()){
            $courses = CoursesModel::where('uuid','=',$uuid)
                ->where('id_company','=',auth()->user()->active_session)
                ->update([
                    'is_free' => ($request->is_free_course) ? 1 : 0,
                    'courses_price'=> $courses_price,
                    'is_private' => ($request->is_private) ? 1 : 0,
                ]);
            return response()->json(['success'=>'Saved','uuid'=>$uuid,'data'=>$request->all()]);
        }
        return response()->json(['error'=>$validateData->errors()->getMessages(),'data'=>$request->all()]);
    }

    public function teachMaterials($uuid)
    {
        $courses = CoursesModel::where('id_company','=',auth()->user()->active_session)
            ->where('uuid','=',$uuid)
            ->first();

        $teachMaterials = TeachMaterialsModel::where('id_courses','=',$courses->id_courses)
            ->where('is_deleted','=',0)
            ->orderBy('location','ASC')
            ->get();

        $nav = [
            'menu' => 'learning',
            'submenu' => 'manage',
            'widgetmenu' => 'teach',
        ];

        return view('pages.srv_admin.elearning.manage.teach_material.sortable')
            ->with(compact('nav','courses','teachMaterials'));
    }

    public function createTeachMaterial($uuid){
        $courses = CoursesModel::where('id_company','=',auth()->user()->active_session)
            ->where('uuid','=',$uuid)
            ->first();


        $nav = [
            'menu' => 'learning',
            'submenu' => 'manage',
            'widgetmenu' => 'teach',
        ];

        return view('pages.srv_admin.elearning.manage.teach_material.create')
            ->with(compact('nav','courses'));
    }

    public function editTeachMaterial($uuid, $id)
    {
        $courses = CoursesModel::where('id_company','=',auth()->user()->active_session)
            ->where('uuid','=',$uuid)
            ->first();

        $teachM = TeachMaterialsModel::where('id_tech_material','=',$id)
            ->where('id_courses','=',$courses->id_courses)->first();

        if(!$teachM){
            return redirect()->back();
        }

        $nav = [
            'menu' => 'learning',
            'submenu' => 'manage',
            'widgetmenu' => 'teach',
        ];

        return view('pages.srv_admin.elearning.manage.teach_material.edit')
            ->with(compact('nav','courses','teachM'));
    }

    public function storeTeachMaterial(Request $request, $uuid)
    {
        $validateData = Validator::make($request->all(),[
            'title' => 'required',
        ]);

        $coursesCheck = CoursesModel::find($request->id_courses);

        if($coursesCheck){
            if(!$coursesCheck->uuid == $uuid){
            //    return http_response_code(500);
                header('HTTP/1.0 400 Bad error',true,400);
                exit();
            }
        }else{
        //    return http_response_code(500);
            header('HTTP/1.0 400 Bad error',true,400);
            exit();
        }


        // untuk check jika allow_download checkbok disabled
        if ($request->main_file_path != null) {
            $cleanUrl = str_replace('http://elcat.localhost/', '', $request->main_file_path);
            $localingPath = str_replace('/', '\\', $cleanUrl);
            $final = public_path($localingPath);
            $extension = pathinfo($final)['extension'];

            $mimeType = mime_content_type($final);
            $fileType = explode('/',$mimeType)[0];
            $fileList = array('video','audio');

            if(in_array($fileType,$fileList) || $mimeType == 'application/pdf'){
               $allow_download = $request->allow_download;
            }else{
                $allow_download = 1;
            }
        }else{
            $allow_download = 0;
        }


        if($validateData->passes()){
            $lastMaterials = TeachMaterialsModel::where('id_courses','=',$request->id_courses)
                ->where('id_company','=',auth()->user()->active_session)
                ->orderBy('location','DESC')
                ->first();

            $newLoc = 1;

            if($lastMaterials){
                $newLoc = ($lastMaterials->location + 1);
            }

            $techMaterials = TeachMaterialsModel::create([
                'id_courses' => $request->id_courses,
                'id_company' => auth()->user()->active_session,
                'title' => $request->title,
                'description' => $request->description,
                'main_file_path' => $request->main_file_path,
                'created_by' => auth()->user()->id,
                'location' => $newLoc,
                'allow_download' => $allow_download
            ]);

            return response()->json(['success'=>'Saved','uuid'=>$uuid,'data'=>$request->all()]);
        }

        return response()->json(['error'=>$validateData->errors()->getMessages(),'data'=>$request->all()]);
    }

    public function updateTeachMaterial(Request $request, $uuid)
    {
        $validateData = Validator::make($request->all(),[
            'title' => 'required',
        ]);

        $coursesCheck = CoursesModel::find($request->id_courses);

        if($coursesCheck){
            if($coursesCheck->uuid != $uuid){
            //    return http_response_code(500);
                header('HTTP/1.0 400 Bad error',true,400);
                exit();
            }
        }else{
        //    return http_response_code(500);
            header('HTTP/1.0 400 Bad error',true,400);
            exit();
        }



        // untuk check jika allow_download checkbok disabled
        if ($request->main_file_path != null) {
            $cleanUrl = str_replace('http://elcat.localhost/', '', $request->main_file_path);
            $localingPath = str_replace('/', '\\', $cleanUrl);
            $final = public_path($localingPath);
            $extension = pathinfo($final)['extension'];

            $mimeType = mime_content_type($final);
            $fileType = explode('/',$mimeType)[0];
            $fileList = array('video','audio');

            if(in_array($fileType,$fileList) || $mimeType == 'application/pdf'){
               $allow_download = $request->allow_download;
            }else{
                $allow_download = 1;
            }
        }else{
            $allow_download = 0;
        }

        if($validateData->passes()){

            $techMaterials = TeachMaterialsModel::where('id_tech_material','=',$request->id_teach_material)
            ->update([
                'title' => $request->title,
                'description' => $request->description,
                'main_file_path' => $request->main_file_path,
                'updated_by' => auth()->user()->id,
                'updated_at' => Carbon::now(),
                'allow_download' => $allow_download
            ]);

            return response()->json(['success'=>'Saved','uuid'=>$uuid,'data'=>$request->all()]);
        }

        return response()->json(['error'=>$validateData->errors()->getMessages(),'data'=>$request->all()]);
    }

    public function deleteTeachMaterials(Request $request, $uuid){
        $courses = CoursesModel::where('uuid','=',$uuid)
            ->where('id_company','=',auth()->user()->active_session)
            ->first();

        if(!$courses) return abort(404);

        $teach = DB::transaction(function() use ($request, $uuid, $courses){

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

    public function sortTeachMaterials(Request $request, $uuid)
    {

        $coursesCheck = CoursesModel::where('uuid','=',$uuid)->first();

        $newLoc = 1;
        foreach($request->new_sort as $item){
            TeachMaterialsModel::where('id_tech_material','=',$item)
                ->where('id_courses','=',$coursesCheck->id_courses)
                ->update([
                    'location' => $newLoc
                ]);
            $newLoc++;
        }

        return response()->json(['success'=>$request->all()]);
    }

    public function taskCourses($uuid)
    {
        $courses = CoursesModel::where('uuid','=',$uuid)
            ->where('id_company','=',auth()->user()->active_session)->first();

        if(!$courses) return abort(404);

        $task = CoursesTaskModel::where('id_courses','=',$courses->id_courses)
            ->where('id_company','=',auth()->user()->active_session)
            ->where('is_deleted','=',0)
            ->get();

        $nav = [
            'menu' => 'learning',
            'submenu' => 'manage',
            'widgetmenu' => 'task',
        ];

        return view('pages.srv_admin.elearning.manage.task.tasklist')
            ->with(compact('nav','courses','task'));
    }

    public function taskCreate($uuid)
    {
        $courses = CoursesModel::where('id_company','=',auth()->user()->active_session)
            ->where('uuid','=',$uuid)
            ->first();

        $nav = [
            'menu' => 'learning',
            'submenu' => 'manage',
            'widgetmenu' => 'task',
        ];

        return view('pages.srv_admin.elearning.manage.task.create')
            ->with(compact('nav','courses'));
    }

    public function storeTask(Request $request, $uuid)
    {

        $courses = CoursesModel::where('uuid','=',$uuid)
            ->where('id_company','=',auth()->user()->active_session)
            ->first();
        if(!$courses) return abort(404);

        $validatorRule = [
            'title' => 'required',
            'content' => 'required',
            'start_date'    => 'required|date',
            'max_submit' => 'required|numeric|min:0'
        ];

        if(!$request->is_no_end_time){
            $validatorRule['end_date'] = 'required|date|after_or_equal:start_date';
        }

        $validateData = Validator::make($request->all(),$validatorRule);

        if($validateData->passes()){
           $task = DB::transaction(function() use ($request,$courses){
                $task = CoursesTaskModel::create([
                    'id_company' => auth()->user()->active_session,
                    'id_courses' => $courses->id_courses,
                    'title' => $request->title,
                    'content' => $request->content,
                    'start_at' => $request->start_date,
                    'end_at' => ($request->is_no_end_time) ? null : $request->end_date,
                    'created_by' => auth()->id(),
                    'max_submit' => $request->max_submit,
                ]);

                $users = CoursesParticipantModel::select('id_participant')
                    ->where('id_courses','=',$courses->id_courses)
                    ->where('id_participant','!=',auth()->id())
                    ->groupBy('id_participant')
                    ->get()->pluck('id_participant')->toArray();

                $userNotify = User::whereIn('id',$users)->get();

                Notification::send(
                    $userNotify,
                    new TaskNotification($task->load('courses'))
                );

                return $task;
            });
            return response()->json(['success'=>$task]);
        }
        return response()->json(['error'=>$validateData->errors()->getMessages()]);
    }

    public function taskEdit($uuid, $id)
    {
        $courses = CoursesModel::where('uuid','=',$uuid)
            ->where('id_company','=',auth()->user()->active_session)
            ->first();
        if(!$courses) return abort(404);

        $task = CoursesTaskModel::where('id_courses','=',$courses->id_courses)
            ->where('id_task','=',$id)
            ->first();


        $nav = [
            'menu' => 'learning',
            'submenu' => 'manage',
            'widgetmenu' => 'task',
        ];

        return view('pages.srv_admin.elearning.manage.task.edit')
            ->with(compact('nav','courses','task'));

    }

    public function taskUpdate(Request $request, $uuid)
    {
        $courses = CoursesModel::where('uuid','=',$uuid)
        ->where('id_company','=',auth()->user()->active_session)
        ->first();

        if(!$courses) return abort(404);

        $validatorRule = [
            'title' => 'required',
            'content' => 'required',
            'start_date'    => 'required|date',
            'max_submit' => 'required|numeric|min:0'
        ];

        if(!$request->is_no_end_time){
            $validatorRule['end_date'] = 'required|date|after_or_equal:start_date';
        }

        $validateData = Validator::make($request->all(),$validatorRule);

        if($validateData->passes()){

            $task = DB::transaction(function() use ($request, $validateData, $courses){
                $task = CoursesTaskModel::where('id_courses','=',$courses->id_courses)
                ->where('id_task','=',$request->id_task)->first();

                $task->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'start_at' => $request->start_date,
                    'end_at' => ($request->is_no_end_time) ? null : $request->end_date,
                    'updated_at' => Carbon::now(),
                    'updated_by' => auth()->id(),
                    'max_submit' => $request->max_submit
                ]);

                $usersId = NotificationsModel::where('notif_owner','=',$task->id_task)
                    ->where('notif_type','=','task')
                    ->get()->pluck('notifiable_id')->toArray();

                foreach($usersId as $id){
                    broadcast(new UpdateNotifications($id));
                }

                return $task;
            });
            return response()->json(['success'=>$task]);
        }
        return response()->json(['error'=>$validateData->errors()->getMessages()]);
    }

    public function taskDelete(Request $request, $uuid)
    {
        $courses = CoursesModel::where('uuid','=',$uuid)
            ->where('id_company','=',auth()->user()->active_session)
            ->first();

        if(!$courses) return abort(404);

        $task = DB::transaction(function() use ($request, $uuid, $courses){
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

    public function participants($uuid)
    {
        $courses = CoursesModel::where('id_company','=',auth()->user()->active_session)
            ->where('uuid','=',$uuid)
            ->first();


        $nav = [
            'menu' => 'learning',
            'submenu' => 'manage',
            'widgetmenu' => 'participant',
        ];

        return view('pages.srv_admin.elearning.manage.participant')
            ->with(compact('nav','courses'));
    }

    public function coursesParticipants($uuid){
        $courses = CoursesModel::select('id_courses')->where('uuid','=',$uuid)->where('id_company','=',auth()->user()->active_session)->first();

        // return $courses->id_courses;

        $participant = CoursesParticipantModel::select(DB::raw("ROUND(SUM(courses_log.total_access_time) / 60,1) as total_time"),DB::raw("max(courses_log.start_access) as last_access"),'users.id','users.name','users.username','courses_participant.status')
            ->where('courses_participant.id_courses','=',$courses->id_courses)
            ->join('users','users.id','=','courses_participant.id_participant')
            ->leftJoin('courses_log','courses_participant.id_participant','=','courses_log.id_participant')
            ->groupBy('courses_participant.id_participant');

        // dd($participant);
        // return var_dump($participant);
        // return datatables()->eloquent($participant)
        //     ->addColumn('last_access', function(CoursesParticipantModel $participant){
        //         return $participant->coursesLog->map(function($part){
        //             return $part->start_access;
        //         });
        //     })->toJson();


        return datatables()->of($participant)
            ->orderColumn('courses_log.start_access $1','name')->toJson();
    }

    public function enrollStore(Request $request, $uuid)
    {
        $courses = CoursesModel::select('id_courses')->where('uuid','=',$uuid)->first();

        $validateData = Validator::make($request->all(),[
            'selected_users'=>'required_without_all:selected_elearning,selected_assistedtest',
            'selected_elearning'=>'required_without_all:selected_users,selected_assistedtest',
            'selected_assistedtest' => 'required_without_all:selected_users,selected_elearning'
        ]);

        if(!$validateData->passes()){
            return response()->json(['data'=>$request->all(),'error'=>$validateData->errors()->getMessages()]);
            // header('HTTP/1.0 400 Bad error',true,400);
            // exit();
        }

        // NORMAL ENROOT
        if(isset($request->selected_users)){
            foreach($request->selected_users as $user){
                CoursesParticipantModel::firstOrCreate(
                    ['id_courses' => $courses->id_courses, 'id_participant' => str_replace("KD","",$user)],
                    [
                        'created_by' => auth()->id(),
                        'id_company' => auth()->user()->active_session,
                    ]
                );
            }
        }

        // WITH Other Elearning Enrool
        if(isset($request->selected_elearning)){

            foreach($request->selected_elearning as $selEl){
                $elearningUsers = CoursesParticipantModel::where('id_courses','=', str_replace("KD","",$selEl))
                    ->where('id_company','=',auth()->user()->active_session)->get();

                foreach($elearningUsers as $userEl){
                    CoursesParticipantModel::firstOrCreate(
                        ['id_courses' => $courses->id_courses,'id_participant' => $userEl->id_participant],
                        [
                            'created_by' => auth()->id(),
                            'id_company' => auth()->user()->active_session,
                        ],
                    );
                }
            }
        }

        // WITH Other Assisted Test Enrool
        if(isset($request->selected_assistedtest)){
            foreach($request->selected_assistedtest as $selAssisted){
                $assistedTestUsers = ExamParticipantModel::where('id_exam','=', str_replace("KD","",$selAssisted))
                    ->where('id_company','=',auth()->user()->active_session)->get();

                foreach($assistedTestUsers as $userAssisted){
                    CoursesParticipantModel::firstOrCreate(
                        ['id_courses' => $courses->id_courses,'id_participant' => $userAssisted->id_participant],
                        [
                            'created_by' => auth()->id(),
                            'id_company' => auth()->user()->active_session,
                        ],
                    );
                }
            }
        }

        return response()->json(['data'=>$request->all()]);
    }

    public function deleteParticipant(Request $request,$uuid)
    {
        // $user = CoursesParticipantModel::where('')
        $courses = CoursesModel::select('id_courses')->where('uuid','=',$uuid)->first();

        if($courses){
            CoursesParticipantModel::where('id_courses','=',$courses->id_courses)
                ->where('id_participant','=',$request->id_user)
                ->delete();

            return response()->json(['success'=>'deleted'],200);
        }

        header('HTTP/1.0 400 Bad error',true,400);
        exit();
    }

    public function searchUsers(Request $request, $uuid){

        $courses = CoursesModel::select('id_courses')->where('uuid','=',$uuid)->first();

        $cparticipant = CoursesParticipantModel::select('id_participant')
            ->where('id_courses','=',$courses->id_courses)
            ->get()->pluck('id_participant');


        if(isset($request->searchTerm)){

            $sub = User::select('id','name','username','id_company')
                ->join('user_srv_dtl','user_srv_dtl.id_user','=','users.id')
                ->where('user_srv_dtl.id_company','=',auth()->user()->active_session)
                ->whereNotIn('id',$cparticipant)
                ->groupBy('user_srv_dtl.id_user');

            $users = DB::table(DB::raw("({$sub->toSql()}) AS s_users"))
                ->mergeBindings($sub->getQuery())
                ->where('s_users.name','like','%'.$request->searchTerm.'%')
                ->orWhere('s_users.username','like','%'.$request->searchTerm.'%')
                ->get();
        }else{
            $users = User::select('id','name','username','id_company')
            ->join('user_srv_dtl','user_srv_dtl.id_user','=','users.id')
            ->where('user_srv_dtl.id_company','=',auth()->user()->active_session)
            ->whereNotIn('id',$cparticipant)
            ->groupBy('user_srv_dtl.id_user')
            ->get();
        }

        $response = array();

        foreach($users as $user){
            $response[] = array(
               "id" => 'KD'.$user->id,
               "text" => $user->id_company.' '.$user->name .' @'.$user->username,
            );
         }

        return json_encode($response);
    }

    public function searchUserGroups(){

    }

    public function viewParticipant($uuid, $id)
    {
        $courses = CoursesModel::where('uuid','=',$uuid)
            ->where('id_company','=',auth()->user()->active_session)
            ->first();

        if(!$courses) return abort(404);
        $user = $courses->participants->where('id_participant','=',$id)->first();
        if(!$user) return abort(404);
        // $user = User::find($user->id_participant);

        $user = CoursesParticipantModel::select(DB::raw("ROUND(SUM(courses_log.total_access_time) / 60,1) as total_time"),DB::raw("max(courses_log.start_access) as last_access"),'users.id','users.name','users.username','courses_participant.status','users.cover_img','users.email','users.bio')
            ->join('users','users.id','=','courses_participant.id_participant')
            ->leftJoin('courses_log','courses_participant.id_participant','=','courses_log.id_participant')
            ->where('courses_participant.id_courses','=',$courses->id_courses)
            ->where('courses_participant.id_participant','=', $id)
            ->groupBy('courses_participant.id_participant')
            ->first();

        $task = CoursesTaskModel::where('id_courses','=',$courses->id_courses)
                ->where('is_deleted','=',0)
                ->orderBy('created_at','DESC')
                ->get();

        $next = $courses->participants->where('id_participant','>',$id)->sortBy('id_participant')->first();
        $previous = $courses->participants->where('id_participant','<',$id)->sortByDesc('id_participant')->first();

        $navigate = [
            'next' => ($next) ? $next->id_participant:'',
            'previous' => ($previous) ? $previous->id_participant:''
        ];
        // dd($navigate);

        $nav = [
            'menu' => 'learning',
            'submenu' => 'manage',
            'widgetmenu' => 'participant',
        ];

        return view('pages.srv_admin.elearning.manage.participant.view')
            ->with(compact('nav','courses','task','user','navigate'));

    }
}
