<?php

namespace App\Http\Controllers\Student;

use App\Events\GiveRating;
use App\Http\Controllers\Controller;
use App\Models\AssistedTest\ExamModel;
use App\Models\Learning\CoursesModel;
use App\Models\OtherData\RatingsModel;
use App\Notifications\RatingNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller
{
    public function getRatings(Request $request){
        $my = auth()->user();
        $type = $request->type_post;
        if(!$type){
            header('HTTP/1.0 400 Bad error', true, 400);
            exit();
        }

        if($type == 1){
            $getProduct = CoursesModel::where('uuid','=',$request->uuid)->first();
            $id = $getProduct->id_courses;
        }else{
            $getProduct = ExamModel::where('uuid','=',$request->uuid)->first();
            // $notifyUser = ExamParticipantModel::where('id_exam','=',$getProduct->id_exam)->first();
            $id = $getProduct->id_exam;
        }

        if(!$id){
            header('HTTP/1.0 400 Bad error', true, 400);
            exit();
        }

        $rating = RatingsModel::with('creator')
            ->where('type_post','=',$type)
            ->where('id_company','=',$my->active_session)
            ->where('id_post','=',$id)
            ->where('created_by', '!=', $my->id)
            ->orderBy('updated_at','DESC')
            ->paginate(5);

        return response()->json(['ratings'=>$rating],200);
    }

    public function myRating(Request $request){
        $my = auth()->user();

        $type = $request->type_post;
        if(!$type){
            header('HTTP/1.0 400 Bad error', true, 400);
            exit();
        }

        if($type == 1){
            $getProduct = CoursesModel::where('uuid','=',$request->uuid)->first();
            $id = $getProduct->id_courses;
        }else{
            $getProduct = ExamModel::where('uuid','=',$request->uuid)->first();
            // $notifyUser = ExamParticipantModel::where('id_exam','=',$getProduct->id_exam)->first();
            $id = $getProduct->id_exam;
        }

        if(!$id){
            header('HTTP/1.0 400 Bad error', true, 400);
            exit();
        }

        $rating = RatingsModel::with('creator')
            ->where('type_post','=',$type)
            ->where('id_company','=',$my->active_session)
            ->where('id_post','=',$id)
            ->where('created_by', '=', $my->id)
            ->first();

        return response()->json(['my_rating'=>$rating],200);
    }

    public function postRating(Request $request){
        $my = auth()->user();

        $defValidation = [
            'rating_val' => 'between:1,5',
        ];


        $validateData = Validator::make($request->all(),$defValidation);

        if ($validateData->passes()){

            $type = $request->type_post;
            if(!$type){
                header('HTTP/1.0 400 Bad error', true, 400);
                exit();
            }

            if($type == 1){
                $getProduct = CoursesModel::where('uuid','=',$request->uuid)->first();
                $id = $getProduct->id_courses;
            }else{
                $getProduct = ExamModel::where('uuid','=',$request->uuid)->first();
                // $notifyUser = ExamParticipantModel::where('id_exam','=',$getProduct->id_exam)->first();
                $id = $getProduct->id_exam;
            }

            if(!$id){
                header('HTTP/1.0 400 Bad error', true, 400);
                exit();
            }

            // update if exist
            $getIfExist = RatingsModel::where('created_by','=',$my->id)
                ->where('id_post','=',$id)
                ->where('id_company','=',$my->active_session)
                ->where('type_post','=',$type)
                ->first();

            if($getIfExist){

                $getIfExist->update([
                    'rating_val' => $request->rating_val,
                    'rating_content' => $request->rating_content,
                    'updated_by'=>$my->id,
                    'updated_at'=>Carbon::now()
                ]);

                $updatedrating = RatingsModel::find($getIfExist->id_ratings);

                broadcast(new GiveRating($updatedrating->load('creator'),$getProduct->uuid,1))->toOthers();

            }else{
               $ratings = RatingsModel::create([
                    'id_company' => $my->active_session,
                    'id_post' => $id,
                    'type_post' => $type,
                    'rating_val' => $request->rating_val,
                    'rating_content' => $request->rating_content,
                    'created_by' => $my->id
                ]);

               broadcast(new GiveRating($ratings->load('creator'),$getProduct->uuid,0))->toOthers();

               Notification::send($getProduct->creator,
                new RatingNotification(
                    $ratings,
                    $ratings->creator->name.' memberikan ulasan untuk '. $getProduct->title,
                    $type
                )
               );
            }

            return response()->json(['success']);
        }

        return response()->json(['error'=>$validateData->errors()->getMessages()]);
    }
}
