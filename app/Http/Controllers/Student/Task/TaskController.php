<?php

namespace App\Http\Controllers\Student\Task;

use App\Http\Controllers\Controller;
use App\Models\Learning\CoursesModel;
use App\Models\Learning\CoursesParticipantModel;
use App\Models\Learning\CoursesTaskModel;
use App\Models\Learning\CoursesTaskSubmit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function list($coursesID = null, $taskID = null)
    {
        if($coursesID == null && $taskID == null){
           return $this->getAllTask();
        }else if($coursesID != null && $taskID == null){
            return $this->taskPerCourses($coursesID);
        }else{
            return $this->taskDo($coursesID, $taskID);
        }
    }

    public function submitTask(Request $request, $coursesID, $taskID)
    {
        $assosiated = CoursesParticipantModel::where('id_courses','=',$coursesID)
            ->where('id_participant','=',auth()->id())
            ->where('id_company','=',auth()->user()->active_session)
            ->first();

        if(!$assosiated) return abort(404);

        $task = CoursesTaskModel::find($taskID);

        if(!$task) return abort(404);


        if($task->end_at != ''){
            if(Carbon::parse($task->end_at)->isPast()) return abort(404);
        }

        // Validate Max Submit

        if($task->max_submit != 0 && $task->submitStatus() >= $task->max_submit){
            return abort(404);
        }

        $validateData = Validator::make($request->all(),[
            'task_answer' => 'required_without_all:task_file',
            'task_file' => 'required_without_all:task_answer|file|max:10000',
        ]);


        if($validateData->passes()){
            $taskSubmit = DB::transaction(function() use ($task,$request,$coursesID,$taskID){
                $fileUrl = '';
                if($request->task_file){
                    $ext = $request->task_file->getClientOriginalExtension();
                    $fileName = Str::slug($task->title.' '.strtotime('now')).'.'.$ext;
                    $request->task_file->move(
                        public_path('storage/' . auth()->user()->company->uuid . '/file/task/'.auth()->id()),$fileName);
                    $fileUrl = asset('storage/' . auth()->user()->company->uuid . '/file/task/'.auth()->id().'/'.$fileName);
                }

                $task = CoursesTaskSubmit::create([
                    'id_courses' => $coursesID,
                    'id_company' => auth()->user()->active_session,
                    'id_task' => $taskID,
                    'content' => $request->task_answer,
                    'file_url' => $fileUrl,
                    'created_by' => auth()->id()
                ]);

                return $task;
            });

            return response()->json(['success'=>$taskSubmit]);
        }

        return response()->json(['error'=>$validateData->errors()->getMessages()]);

    }

    private function getAllTask()
    {
        $courses = CoursesParticipantModel::select('id_courses')->where('id_participant','=',auth()->id())
            ->where('id_company','=',auth()->user()->active_session)
            ->pluck('id_courses')->toArray();

        $task = CoursesTaskModel::whereIn('id_courses',$courses)
            ->where('is_deleted','=',0)
            ->orderBy('created_at','DESC')
            ->paginate(6);

        $nav = [
            'menu' => '',
            'submenu' => '',
            'widgetmenu' => '',
        ];

        return view('pages.student.task.tasklist')
            ->with(compact('nav','task'));
    }

    private function taskPerCourses($idCourses)
    {
        $assosiated = CoursesParticipantModel::where('id_courses','=',$idCourses)
            ->where('id_participant','=',auth()->id())
            ->where('id_company','=',auth()->user()->active_session)
            ->first();

        if(!$assosiated) return abort(404);

        $task = CoursesTaskModel::where('id_courses','=',$idCourses)
            ->where('is_deleted','=',0)
            ->orderBy('created_at','DESC')
            ->paginate(6);

        $nav = [
            'menu' => '',
            'submenu' => '',
            'widgetmenu' => '',
        ];

        return view('pages.student.task.tasklist')
            ->with(compact('nav','task'));
    }

    private function taskDo($idCourses, $idTask)
    {
        $assosiated = CoursesParticipantModel::where('id_courses','=',$idCourses)
            ->where('id_participant','=',auth()->id())
            ->where('id_company','=',auth()->user()->active_session)
            ->first();

        if(!$assosiated) return abort(404);

        $task = CoursesTaskModel::where('id_courses','=',$idCourses)
            ->where('id_task','=',$idTask)
            ->where('is_deleted','=',0)
            ->first();

        $isFinished = false;
        if($task->end_at != ''){
            if(Carbon::parse($task->end_at)->isPast()) $isFinished = true;
        }

        $nav = [
            'menu' => '',
            'submenu' => '',
            'widgetmenu' => '',
        ];

        return view('pages.student.task.taskdo')
            ->with(compact('nav','task','isFinished'));
    }
}
