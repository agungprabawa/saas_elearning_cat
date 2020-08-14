<?php

namespace App\Http\Controllers\Other;

use App\Events\UpdateNotifications;
use App\Http\Controllers\Controller;
use App\Models\AnnouncementModel;
use App\Models\AnnouncementNotifyable;
use App\Models\AssistedTest\ExamModel;
use App\Models\AssistedTest\ExamParticipantModel;
use App\Models\Learning\CoursesModel;
use App\Models\Learning\CoursesParticipantModel;
use App\Models\NotificationsModel;
use App\Models\User\UserSrvAssosiation;
use App\Notifications\AnnouncementNotification;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
// use Yajra\DataTables;
use Yajra\DataTables\Facades\DataTables;

class AnnouncementController extends Controller
{
    public function index()
    {
        # code...
    }

    public function get($uuid)
    { }

    public function list(Request $request){

        $idAnnouncement = NotificationsModel::select('notif_owner')
            ->where('notif_type','=','announcement')
            ->where('notifiable_id','=',auth()->id())
            ->pluck('notif_owner');

        if($request->title){
            $announcement = AnnouncementModel::whereIn('id_ann',$idAnnouncement)
            ->where('title','like','%'.$request->title.'%')
            ->paginate(6);

            $announcement->appends(['title' => $request->title]);
        }else{
            $announcement = AnnouncementModel::whereIn('id_ann',$idAnnouncement)
            ->paginate(6);
        }


        $nav = [
            'menu' => 'announcement',
            'submenu' => 'your-announ'
        ];

        return view('pages.other.announcement.announcement_list')
            ->with(compact('nav','announcement'));
    }

    public function read($uuid)
    {

        $announcement = DB::transaction(function() use ($uuid){
            $assosiatedCompany = UserSrvAssosiation::select('id_company')->where('id_user','=',auth()->id())
            ->pluck('id_company');

            $announcement = AnnouncementModel::where('uuid','=',$uuid)
                ->whereIn('id_company',$assosiatedCompany)
                ->first();

            if(!$announcement) {
                return null;
            }

            NotificationsModel::where('owner_type','=',3)
                ->where('notif_owner','=',$announcement->id_ann)
                ->where('notifiable_id','=',auth()->id())
                ->update([
                    'read_at'=>Carbon::now()
                ]);

            return $announcement;

        });

        $nav = [
            'menu' => 'announcement',
            'submenu' => 'your-announ'
        ];

        if($announcement === null) {
            return redirect()->route('general.announcement.all');
        }

        return view('pages.other.announcement.announcement')
            ->with(compact('nav','announcement'));
    }

    public function create()
    {
        $nav = [
            'menu' => 'announcement',
            'submenu' => 'create'
        ];
        return view('pages.srv_admin.announcement.create')
            ->with(compact('nav'));
    }

    public function listAdm()
    {
        $nav = [
            'menu' => 'announcement',
            'submenu' => 'list'
        ];
        return view('pages.srv_admin.announcement.list')
            ->with(compact('nav'));
    }

    public function edit($uuid)
    {
        $announcement = AnnouncementModel::where('uuid','=',$uuid)
            ->where('id_company','=',auth()->user()->active_session)
            ->first();
        $wasNotifyTo = AnnouncementNotifyable::where('id_announcement','=',$announcement->id_ann)
            ->get();
        // dd($wasNotifyTo[1]->wasNotifyToPost);
        if(!$announcement) return abort(404);

        $nav = [
            'menu' => 'announcement',
            'submenu' => 'edit'
        ];
        return view('pages.srv_admin.announcement.edit')
            ->with(compact('nav','announcement','wasNotifyTo'));
    }

    public function announcementJson()
    {
        $queryString =
            "SELECT
                an.title,
                an.created_at,
                an.uuid,
                count(IF(n.read_at is not NULL,1,NULL)) as readable,
                an.created_by
            FROM announcement an
            LEFT JOIN notifications n ON n.notif_owner = an.id_ann
            WHERE
                  n.notif_type = 'announcement' AND
                  n.owner_type = 3 AND
                  an.id_company = ? AND
                  an.is_deleted = 0
            GROUP BY n.notif_owner";


        $queryBindings =[
            auth()->user()->active_session
        ];

        $queryAnn = collect(DB::select($queryString, $queryBindings));

        if (auth()->user()->active_status == 2){
            $queryAnn = $queryAnn->where('created_by','=',auth()->id());
        }

        return datatables()->of($queryAnn)->toJson();

    }

    public function sendAnnouncement(Request $request)
    {

        // return $request->all();
        $validateRole = [
            'title' => 'required',
            'content' => 'required',
        ];

        if (auth()->user()->active_status == 1){
            $validateRole['send_to_all'] = 'required_without_all:send_to_role,send_to_elearning,send_to_assistedtest';
        }else{
            $validateRole['send_to_elearning'] = 'required_without_all:send_to_assistedtest';
            $validateRole['send_to_assistedtest'] = 'required_without_all:send_to_elearning';
        }

//        return response()->json(['error'=>$validateRole]);

        $validateData = Validator::make($request->all(), $validateRole);

        if(!$validateData->passes()){
            return response()->json(['error'=>$validateData->errors()->getMessages()]);
        }

        $notify = DB::transaction(function() use ($request){

            $announ = AnnouncementModel::create([
                'id_company' => auth()->user()->active_session,
                'uuid' => Str::orderedUuid(),
                'title' => $request->title,
                'content' => $request->content,
                'cover_img' => $request->cover_img_url,
                'created_by' => auth()->id(),
            ]);

            $response = $this->notificationSender($request,$announ);
            return $response;
        });


        return response()->json(['success'=>'sended','notify'=>$notify,'input'=>$request->all()]);
    }

    public function updateAnnouncement(Request $request,$uuid)
    {
        $validateData = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
        ]);

        if(!$validateData->passes()){
            return response()->json(['error'=>$validateData->errors()->getMessages()]);
        }

        $notify = DB::transaction(function() use ($request,$uuid){
            $announ = AnnouncementModel::where('uuid','=',$uuid)
                ->where('id_company','=',auth()->user()->active_session)
                ->first();

            $announ->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'cover_img' => $request->cover_img_url,
                    'updated_at' =>Carbon::now(),
                    'updated_by' => auth()->id(),
                ]);

            $usersId = NotificationsModel::where('notif_owner','=',$announ->id_ann)
                ->where('notif_type','=','announcement')
                ->get()->pluck('notifiable_id')->toArray();

            if($request->re_notify){
                AnnouncementNotifyable::where('id_announcement','=',$announ->id_ann)
                    ->delete();
                NotificationsModel::where('notif_owner','=',$announ->id_ann)
                    ->where('notif_type','=','announcement')
                    ->delete();

                $response = $this->notificationSender($request,$announ);
            }

            foreach($usersId as $id){
                broadcast(new UpdateNotifications($id));
            }
        });

        return response()->json(['success'=>'sended','notify'=>$notify,'input'=>$request->all()]);
    }

    public function deleteAnnouncement(Request $request, $uuid)
    {
        $announcement = AnnouncementModel::where('uuid','=',$uuid)
            ->where('id_company','=',auth()->user()->active_session)
            ->first();

        if($announcement){
            $notif = DB::transaction(function() use ($request, $uuid, $announcement){

                $usersId = NotificationsModel::where('notif_owner','=',$announcement->id_ann)
                    ->where('notif_type','=','announcement')
                    ->get()->pluck('notifiable_id')->toArray();

                $announcement->update([
                    'is_deleted' => 1,
                    'deleted_at' => Carbon::now(),
                    'deleted_by' => auth()->id()
                ]);

                AnnouncementNotifyable::where('id_announcement','=',$announcement->id_ann)
                    ->delete();

                NotificationsModel::where('notif_owner','=',$announcement->id_ann)
                    ->where('notif_type','=','announcement')
                    ->delete();

                foreach($usersId as $id){
                    broadcast(new UpdateNotifications($id));
                }
            });
        }

        return response()->json(['success'=>'sended']);
    }

    public function notificationSender(Request $request, $announ)
    {
        // NOTIFY ALL
        $notifiableUser = array();
        if($request->send_to_all){

            AnnouncementNotifyable::create([
                'id_company' => auth()->user()->active_session,
                'id_announcement' => $announ->id_ann,
                'notify_to' => 'all',
                'notify_type' => 0,
            ]);

            $users = UserSrvAssosiation::select('id_user')
                ->where('id_company','=',auth()->user()->active_session)
                ->pluck('id_user')->toArray();

            array_push($notifiableUser,...$users);
        }

        // NOTIFY ROLE
        if($request->send_to_role){
            if(empty($request->selected_role)){
                AnnouncementNotifyable::create([
                    'id_company' => auth()->user()->active_session,
                    'id_announcement' => $announ->id_ann,
                    'notify_to' => 'role',
                    'notify_type' => 0,
                ]);

                $users = UserSrvAssosiation::select('id_user')->where('id_company','=',auth()->user()->active_session)
                    ->groupBy('id_user')
                    ->pluck('id_user')->toArray();

                array_push($notifiableUser,...$users);
            }else{
                $idRole = [];
                foreach ($request->selected_role as $key => $value) {
                    # code...
                    $readVal = explode('.',$value)[1];
                    AnnouncementNotifyable::create([
                        'id_company' => auth()->user()->active_session,
                        'id_announcement' => $announ->id_ann,
                        'notify_to' => 'role',
                        'notify_type' => $readVal,
                    ]);
                    $idRole[] = $readVal;
                }

                $users = UserSrvAssosiation::select('id_user')->where('id_company','=',auth()->user()->active_session)
                    ->whereIn('status',$idRole)
                    ->pluck('id_user')->toArray();

                array_push($notifiableUser,...$users);
            }
        }

        // NOTIFY E-Learning
        if($request->send_to_elearning){
            if(empty($request->selected_elearning)){
                AnnouncementNotifyable::create([
                    'id_company' => auth()->user()->active_session,
                    'id_announcement' => $announ->id_ann,
                    'notify_to' => 'elearning',
                    'notify_type' => 0,
                ]);

                if(auth()->user()->active_status == 1){
                    $users = CoursesParticipantModel::select('id_participant')
                        ->where('id_company','=',auth()->user()->active_session)
                        ->pluck('id_participant')->toArray();
                }else{
                    $staf_created = CoursesModel::select('id_courses')
                        ->where('id_company','=',auth()->user()->active_session)
                        ->where('created_by','=',auth()->id())
                        ->pluck('id_courses')->toArray();

                    $users = CoursesParticipantModel::select('id_participant')
                        ->where('id_company','=',auth()->user()->active_session)
                        ->whereIn('id_courses',$staf_created)
                        ->pluck('id_participant')->toArray();
                }


                array_push($notifiableUser,...$users);
            }else{
                $idCourses = [];
                foreach ($request->selected_elearning as $key => $value) {
                    # code...
                    $readVal = explode('.',$value)[1];
                    AnnouncementNotifyable::create([
                        'id_company' => auth()->user()->active_session,
                        'id_announcement' => $announ->id_ann,
                        'notify_to' => 'elearning',
                        'notify_type' => $readVal,
                    ]);
                    $idCourses[] = $readVal;
                }

                $users = CoursesParticipantModel::select('id_participant')->where('id_company','=',auth()->user()->active_session)
                    ->whereIn('id_courses',$idCourses)
                    ->pluck('id_participant')->toArray();

                array_push($notifiableUser,...$users);
            }
        }

        if($request->send_to_assistedtest){
            if(empty($request->selected_assistedtest)){
                AnnouncementNotifyable::create([
                    'id_company' => auth()->user()->active_session,
                    'id_announcement' => $announ->id_ann,
                    'notify_to' => 'assistedtest',
                    'notify_type' => 0,
                ]);


                if(auth()->user()->active_status == 1){
                    $users = ExamParticipantModel::select('id_participant')
                        ->where('id_company','=',auth()->user()->active_session)
                        ->pluck('id_participant')->toArray();
                }else{
                    $staf_created = ExamModel::select('id_exam')
                        ->where('id_company','=',auth()->user()->active_session)
                        ->where('created_by','=',auth()->id())
                        ->pluck('id_exam')->toArray();

                    $users = ExamParticipantModel::select('id_participant')
                        ->where('id_company','=',auth()->user()->active_session)
                        ->whereIn('id_exam',$staf_created)
                        ->pluck('id_participant')->toArray();
                }

                array_push($notifiableUser,...$users);
            }else{
                $idExam = [];
                foreach ($request->selected_role as $key => $value) {
                    # code...
                    $readVal = explode('.',$value)[1];
                    AnnouncementNotifyable::create([
                        'id_company' => auth()->user()->active_session,
                        'id_announcement' => $announ->id_ann,
                        'notify_to' => 'assistedtest',
                        'notify_type' => $readVal,
                    ]);
                    $idExam[] = $readVal;
                }

                $users = ExamParticipantModel::select('id_participant')->where('id_company','=',auth()->user()->active_session)
                    ->whereIn('id_exam',$idExam)
                    ->pluck('id_user')->toArray();

                array_push($notifiableUser,...$users);
            }
        }

        $notifiableUser=User::whereIn('id',array_unique($users))->get();

        Notification::send(
            $notifiableUser,
            new AnnouncementNotification($announ)
        );
        return $notifiableUser;
    }

    public function getShouldNotifiableUser(Request $request)
    {

        $finalResponses = null;
        switch ($request->typeSearch) {
            case 'all':
                # code...
                $finalResponses = $this->getUser($request);
                break;
            case 'elearning':
                $finalResponses = $this->getElearning($request);
                break;
            case 'assistedtest':
                $finalResponses = $this->getAssistedTest($request);
                break;
            default:
                # code...
                break;
        }

        return $finalResponses;
    }

    private function getUser(Request $request)
    {
        if($request->type == 'edit'){

        }else{
            $onNorifiableUser = [];
        }

        if (isset($request->searchTerm)) {

            // select untuk membuat table virtual, dikarenakan nanti menggunakan orWhere
            $sub = User::select('id', 'name', 'username', 'id_company')
                ->join('user_srv_dtl', 'user_srv_dtl.id_user', '=', 'users.id')
                ->where('user_srv_dtl.id_company', '=', auth()->user()->active_session)
                ->whereNotIn('id', $onNorifiableUser)
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
                ->whereNotIn('id', $onNorifiableUser)
                ->groupBy('user_srv_dtl.id_user')
                ->get();
        }

        $response = array();

        foreach ($users as $user) {
            $response[] = array(
                "id" => 'user.' . $user->id,
                "text" => $user->name . ' @' . $user->username,
            );
        }

        return json_encode($response);
    }

    private function getElearning($request)
    {
        if($request->type == 'edit'){

        }else{
            $onNorifiableUser = [];
        }

        if (isset($request->searchTerm)) {
            $learning = CoursesModel::where('id_company','=',auth()->user()->active_session)
                ->whereNotIn('id_courses',$onNorifiableUser)
                ->where('title','like','%'.$request->searchTerm.'%')
                ->where('is_deleted','=',0)
            ->get();

        } else {
            $learning = CoursesModel::where('id_company','=',auth()->user()->active_session)
                ->where('is_deleted','=',0)
                ->whereNotIn('id_courses',$onNorifiableUser)
                ->get();
        }

        $response = array();

        foreach ($learning as $item) {
            $response[] = array(
                "id" => 'elearning.' . $item->id_courses,
                "text" => $item->title,
            );
        }

        return json_encode($response);
    }

    private function getAssistedTest($request)
    {
        if($request->type == 'edit'){

        }else{
            $onNorifiableUser = [];
        }


        $id_creator = '';
        $where_act = '!=';
        if (auth()->user()->active_status == 2){
            $id_creator = auth()->id();
            $where_act = '=';
        }

        if (isset($request->searchTerm)) {
            $learning = ExamModel::where('id_company','=',auth()->user()->active_session)
                ->whereNotIn('id_exam',$onNorifiableUser)
                ->where('title','like','%'.$request->searchTerm.'%')
                ->where('created_by',$where_act,$id_creator)
                ->where('is_deleted','=',0)
                ->get();

        } else {
            $learning = ExamModel::where('id_company','=',auth()->user()->active_session)
                ->where('is_deleted','=',0)
                ->where('created_by',$where_act,$id_creator)
                ->whereNotIn('id_exam',$onNorifiableUser)
                ->get();
        }

        $response = array();

        foreach ($learning as $item) {
            $response[] = array(
                "id" => 'assistedtest.' . $item->id_exam,
                "text" => $item->title,
            );
        }

        return json_encode($response);
    }
}
