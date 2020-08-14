<?php

namespace App\Http\Controllers\Other;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Learning\CoursesModel;
use App\Models\AssistedTest\ExamModel;
use App\Models\CommentsModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Pusher\Pusher;
use App\Events\Commenting;
use App\Models\AnnouncementModel;
use App\Models\AssistedTest\ExamParticipantModel;
use App\Models\Learning\CoursesParticipantModel;
use App\User;
use App\Notifications\CommentNotification;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Notification;

class CommentController extends Controller
{

    /**
     * @param Request $request
     * @param $uuid
     * @return \Illuminate\Http\JsonResponse
     */

    public function getComments(Request $request)
    {
    	$type = $request->type;
    	if(!$type){ exit(); }

    	if($type == 1){
            $getProduct = CoursesModel::where('uuid','=',$request->uuid)->first();
            $id = $getProduct->id_courses;
    	}else if($type == 2){
            $getProduct = ExamModel::where('uuid','=',$request->uuid)->first();
            $id = $getProduct->id_exam;
        }else{
            $getProduct = AnnouncementModel::where('uuid','=',$request->uuid)->first();
            $id = $getProduct->id_ann;
        }

        $comments = CommentsModel::with('creator')->where('id_post','=',$id)
                    ->where('id_company','=',auth()->user()->active_session)
                    ->where('type_post','=',$request->type)
                    ->where('is_deleted','=',0)
                    ->orderBy('created_at','DESC')
                    ->paginate(5);


        return response()->json(['comments'=>$comments],200);
        // return $comments;
    }

    /**
     * @param Request $request
     * @param $uuid
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
    	$validateData = Validator::make($request->all(),[
    	   'comment'=>'required|string',
        ]);

    	if($validateData->passes()){
            $type = $request->type_post;
            if(!$type){
                header('HTTP/1.0 400 Bad error', true, 400);
                exit();
            }

            if($type == 1){
                $getProduct = CoursesModel::where('uuid','=',$request->uuid)->first();
                $id = $getProduct->id_courses;
            }else if($type == 2){
                $getProduct = ExamModel::where('uuid','=',$request->uuid)->first();
                // $notifyUser = ExamParticipantModel::where('id_exam','=',$getProduct->id_exam)->first();
                $id = $getProduct->id_exam;
            }else{
                $getProduct = AnnouncementModel::where('uuid','=',$request->uuid)->first();
                $id = $getProduct->id_ann;
            }

            if(!$id){
                header('HTTP/1.0 400 Bad error', true, 400);
                exit();
            }

    	    $insertedComment = CommentsModel::create([
                'content' => $request->comment,
                'created_by' => auth()->id(),
                'id_company'=>auth()->user()->active_session,
                'id_post' => $id,
                'type_post' => $request->type_post,
            ]);

            broadcast(new Commenting($insertedComment->load('creator'),$getProduct->uuid))->toOthers();


            if($type == 3){
                $notifyUser = User::whereIn('id',$getProduct->hasNotified()->diff([auth()->id()]))->get() ;
            }else{
                $notifyUser = User::whereIn('id',$getProduct->participants->pluck('id_participant')->diff([auth()->id()]))->get();
            }

            Notification::send(
                $notifyUser,
                new CommentNotification(
                    $insertedComment,
                    $insertedComment->creator->name. ' berkomentar pada '.$getProduct->title,
                    $request->type_post
                )
            );

            // if(auth()->id() != $getProduct->creator->id){
            //     Notification::send(
            //         $getProduct->creator,
            //         new CommentNotification(
            //             $insertedComment,
            //             $insertedComment->creator->name .' berkomentar pada '.$getProduct->title,
            //             $request->type_post
            //         ),
            //     );
            // }

            return response()->json(['comment'=>$insertedComment->load('creator'), 'user'=>auth()->user(), 'response'=>$request->all()]);
        }

        return response()->json(['error' => $validateData->errors()->getMessages()]);
    }

    /**
     * @param  string|product uuid
     * @return json
     */
    public function edit($uuid)
    {

    	return responses()->json();
    }

    /**
     * @param  string|product uuid
     * @return json
     */
    public function update(Request $request)
    {
    	$validateData = Validator::make($request->all(),[
            'comment'=>'required|string',
         ]);

         if($validateData->passes()){

             $updatedComment = CommentsModel::where('id_comment','=', $request->id_comment)
             ->where('id_company','=',auth()->user()->active_session)
             ->update([
                 'content' => $request->comment,
                 'updated_by' => auth()->id(),
                 'updated_at' => Carbon::now(),
             ]);

             $newComment = CommentsModel::with('creator')->find($request->id_comment);

             broadcast(new Commenting($newComment,$request->uuid, 1))->toOthers();

             return response()->json(['comment'=>$newComment, 'user'=>auth()->user()]);
         }

         return response()->json(['error' => $validateData->errors()->getMessages()]);
    }

    /**
     * @param  string|product uuid
     * @return json
     */
    public function delete(Request $request)
    {
        CommentsModel::where('id_comment','=',$request->id_comment)
            ->where('id_company','=',auth()->user()->active_session)
            ->update([
                'is_deleted' => 1,
                'deleted_at' => Carbon::now(),
                'deleted_by' => auth()->id(),
            ]);

        $deleted = CommentsModel::find($request->id_comment);

        broadcast(new Commenting($deleted,$request->uuid, 2))->toOthers();
        return response()->json(['id_comment'=>$request->id_comment]);

    }
}
