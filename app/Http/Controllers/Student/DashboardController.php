<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\AssistedTest\ExamParticipantModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Learning\CoursesModel;
use App\Models\NotificationsModel;
use App\Models\AnnouncementModel;

class DashboardController extends Controller
{
    public function index()
    {
        $my = auth()->user();
        $courses = CoursesModel::join('courses_participant','courses.id_courses','=','courses_participant.id_courses')
            ->where('id_participant','=',auth()->user()->id)
            ->where('courses.id_company','=',$my->active_session)
            ->where('end_date','>',Carbon::now())
            ->where('is_deleted','=',0)
            ->orderBy('courses_participant.created_at','DESC')
            ->limit(3)
            ->get();

        $exams = ExamParticipantModel::join('exams','exams.id_exam','=','exam_participant.id_exam')
            ->join('users','users.id','=','exams.created_by')
            ->where('exam_participant.id_participant','=',$my->id)
            ->where('exam_participant.id_company','=',$my->active_session)
            ->where('is_deleted','=',0)
            ->select([
                'exams.uuid',
                'exams.title',
                'exams.descriptions',
                'exams.created_by',
                'exams.created_at',
                'exams.start_date',
                'exams.end_date',
                'exams.cover_img_url',
                'exam_participant.id_exam',
                'exam_participant.exam_start',
                'exam_participant.exam_end',
                'exam_participant.final_result',
                'users.name',
                'users.email',
            ])
            ->get();
        // dd($exams);

        $idAnnouncement = NotificationsModel::select('notif_owner')
            ->where('notif_type','=','announcement')
            ->where('notifiable_id','=',$my->id)
            ->pluck('notif_owner');

        $announcement = AnnouncementModel::whereIn('id_ann',$idAnnouncement)
            ->orderBy('created_at','DESC')
            ->limit(10)->get();

        // dd($announcement->toArray());

        $nav = [
            'menu' => 'dashboard',
            'submenu' => '',

        ];

        return view('pages.student.dashboard')
            ->with(compact('nav','courses','exams','announcement'));
    }
}
