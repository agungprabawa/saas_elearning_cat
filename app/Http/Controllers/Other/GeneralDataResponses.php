<?php

namespace App\Http\Controllers\Other;

use App\Http\Controllers\Controller;
use App\Models\AssistedTest\ExamModel;
use App\Models\AssistedTest\ExamParticipantModel;
use App\User;
use Illuminate\Http\Request;
use App\Models\Learning\CoursesModel;
use App\Models\Learning\CoursesParticipantModel;
use Illuminate\Support\Facades\DB;

class GeneralDataResponses extends Controller
{
    public function searchUsers(Request $request, $uuid){

        if($request->type == 'elearning'){
            $post = CoursesModel::select(DB::raw('id_courses as id'))->where('uuid','=',$uuid)->first();
            $cparticipant = CoursesParticipantModel::select('id_participant')
                ->where('id_courses','=',$post->id)
                ->get()->pluck('id_participant');
        }else{
            $post = ExamModel::select(DB::raw('id_exam as id'))->where('uuid','=',$uuid)->first();
            $cparticipant = ExamParticipantModel::select('id_participant')
                ->where('id_exam','=',$post->id)
                ->get()->pluck('id_participant');
        }


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
               "text" => $user->name .' @'.$user->username,
            );
         }

        return json_encode($response);
    }

    public function getGroups(Request $request){
        if($request->type == 'elearning'){
            $post = CoursesModel::select(DB::raw('id_courses as id, title'))->where('id_company','=',auth()->user()->active_session)->where('is_deleted','=',0);

        }else{
            $post = ExamModel::select(DB::raw('id_exam as id, title'))->where('id_company','=',auth()->user()->active_session)->where('is_deleted','=',0);

        }

        if(isset($request->searchTerm)){
            $post = $post->where('title','like','%'.$request->searchTerm.'%')
                ->get();
        }else{
            $post = $post->get();

        }

        $response = array();

        // dd($request->all());

        foreach($post as $item){
            $response[] = array(
                "id" => 'KD'.$item->id,
                "text" => $item->title,
            );
        }

        return json_encode($response);
    }
}
