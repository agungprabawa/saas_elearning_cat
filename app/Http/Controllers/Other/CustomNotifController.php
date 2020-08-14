<?php

namespace App\Http\Controllers\Other;

use App\Http\Controllers\Controller;
use App\Models\AnnouncementModel;
use App\Models\AssistedTest\ExamModel;
use App\Models\Learning\CoursesModel;
use App\Models\Learning\CoursesTaskModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\NotificationsModel;
use Carbon\Carbon;
use App\User;

class CustomNotifController extends Controller
{
    public function getNotifications()
    {

        // mengambil notifikasi
        $notifications = NotificationsModel::with('owner')
            ->with('triggerBy')
            ->where('notifiable_id','=',auth()->id())
            ->orderBy('created_at','DESC')
            ->get();

        $orderedNotif = [];
        $finallNotifications = [];

        // pengelompokan berdasar owner notif, elearning, exam, etc.
//        $groupedNotif = $notifications->groupBy(['notif_owner','owner_type'])->take(10);

        $groupedNotif = $notifications->groupBy(function ($item, $key){
           return $item['notif_owner']."-".$item['owner_type'].'-'.$item['notif_type'];
        });

//         dd($groupedNotif->toArray());
        //Set DESC created at as array key and set the item AKA replace $groupedNotif key as created_at
        foreach($groupedNotif as $gnotif){
            $sort = $gnotif->sortByDesc('created_at')->first();
            // dd($sort->post);
            $orderedNotif[trim($sort->created_at)] = [
                'data'=>$gnotif->toArray(),
                'type'=>$sort->notif_type,
                'notifKey' => $sort->notif_type.'.'.$sort->notif_owner.'.'.$sort->owner_type,
                'subject' => $sort->post->title,
                'data_mentah' => $sort,
                'updated_notif' => Carbon::parse($sort->created_at)->format('Y-m-d H:i:s'),
                'read_at' => $sort->read_at,
                'url' => route('notifications.read2',[$sort->id]),
                'id' => $sort->id,
            ];
        }
        krsort($orderedNotif);
        // dd($orderedNotif);

        foreach($orderedNotif as $key => $notif){
            // dd($key);
            switch ($notif['type']) {
                case 'comment':

                    $commentUser[$key] = [];
                    foreach($notif['data'] as $item){
                        // $commentUser[$key] = $item['owner']['name'];
                        array_push($commentUser[$key],$item['trigger_by']['name']);
                    }
                    $uniqueUserComment[$key] = collect($commentUser[$key])->unique()->toArray();

                   // Get top 3 name
                    $implodeName = implode(', ',array_slice($uniqueUserComment[$key],0,2));

                    if(count($uniqueUserComment[$key]) > 2){
                        $implodeName .= ' dan ';
                        $implodeName .= count($uniqueUserComment[$key]) - 2;
                        $implodeName .= ' lainnya ';
                    }else if (count($uniqueUserComment[$key])==2){
                        $implodeName = $uniqueUserComment[$key][0];
                        $implodeName .= '</strong> dan <strong>';
                        $implodeName .= $uniqueUserComment[$key][1];
                    }

                    // $finallNotifications[] = $implodeName.' mengomentari ...';
                    $orderedNotif[$key]['data'] = '<strong>'.$implodeName.'</strong> mengomentari <strong>'.$notif['subject'] .'</strong>';
                    break;
                case 'rating':
                    $ratingUser[$key] = [];
                    foreach($notif['data'] as $item){
                        // $commentUser[$key] = $item['owner']['name'];
                        array_push($ratingUser[$key],$item['trigger_by']['name']);
                    }
                    $uniqueUserComment[$key] = collect($ratingUser[$key])->unique()->toArray();

                    // Get top 3 name
                    $implodeName = implode(', ',array_slice($uniqueUserComment[$key],0,2));

                    if(count($uniqueUserComment[$key]) > 2){
                        $implodeName .= ' dan ';
                        $implodeName .= count($uniqueUserComment[$key]) - 2;
                        $implodeName .= ' lainnya ';
                    }else if (count($uniqueUserComment[$key])==2){
                        $implodeName = $uniqueUserComment[$key][0];
                        $implodeName .= '</strong> dan <strong>';
                        $implodeName .= $uniqueUserComment[$key][1];
                    }

                    // $finallNotifications[] = $implodeName.' mengomentari ...';
                    $orderedNotif[$key]['data'] = '<strong>'.$implodeName.'</strong> menambahkan ulasa pada <strong>'.$notif['subject'] .'</strong>';
                    break;
                case 'announcement':
                    $orderedNotif[$key]['data'] = 'Pengumuman: <strong>'.$notif['subject'].'</strong>';
                    break;

                case 'elearning':

                    break;
                case 'assistedtest':

                    break;
                case 'task':
                    $orderedNotif[$key]['data'] = 'Tugas: <strong>'.$notif['subject'].'</strong> dari '.$orderedNotif[$key]['data_mentah']->taskFrom()->courses->title;
                    break;
                default:
                    # code...
                    break;
            }
        }
        // dd($uniqueUserComment);
        // Humanize notification
        // dd($orderedNotif);

        // return $orderedNotif;
        return response()->json(['notif'=>$orderedNotif]);
//        return response()->json(['notif'=>array_slice($orderedNotif,0,5)]);
    }

    public function read($uuid)
    {
        $notif = NotificationsModel::where('id','=',$uuid)
            ->where('notifiable_id','=',auth()->id())
            ->first();

        if(!$notif) return abort(404);
        if($notif->read_at == '') $this->readNotif($uuid);

        $type = $notif->notif_type;
        if($type == 'elearning'){

        }else if($type == 'assistedtest'){

        }else if($type == 'comment') {

            $commentType = $notif->owner_type;
            $commentParrent = str_replace('c', '', $notif->notif_owner);

            if ($commentType == 1) {
                $courses = CoursesModel::find($commentParrent);
                return redirect()->route('student.learning.materials', [$courses->uuid, 1]);
            } else if ($commentType == 2) {
                $exam = ExamModel::find($commentParrent);
                return redirect()->route('student.assistedtest.overview', $exam->uuid);
            } else if ($commentType == 3) {
                $announ = AnnouncementModel::find($commentParrent);
                return redirect()->route('general.announcement.read', [$announ->uuid]);
            }

        }else if($type == 'rating'){
            $ratingType = $notif->owner_type;
            $commentParrent = $notif->notif_owner;

            if ($ratingType == 1) {
                $courses = CoursesModel::find($commentParrent);
                return redirect()->route('student.learning.learning', $courses->uuid);
            } else if ($ratingType == 2) {
                $exam = ExamModel::find($commentParrent);
                return redirect()->route('student.assistedtest.overview', $exam->uuid);
            } else if ($ratingType == 3) {
                $announ = AnnouncementModel::find($commentParrent);
                return redirect()->route('general.announcement.read', [$announ->uuid]);
            }
        }else if($type == 'announcement'){
            $announ = AnnouncementModel::find($notif->notif_owner);

            return redirect()->route('general.announcement.read',[$announ->uuid]);

        }else if($type == 'task'){

            $idTask = $notif->notif_owner;
            $task = CoursesTaskModel::find($idTask);
            return redirect()->route('student.task.list',[$task->id_courses,$task->id_task]);

        }else{
            return abort(404);
        }
    }

    private function readNotif($notif_uuid)
    {
        $notif = NotificationsModel::find($notif_uuid);
        $notif->update([
            'read_at' => Carbon::now(),
        ]);

        return $notif;
    }


    public function readNotification($type, $uuid){

        $userAssos = auth()->user()->allStatus->pluck('id_company');
        // dd($type);
        switch ($type) {
            case 1:
                $post = CoursesModel::where('uuid','=',$uuid)
                    ->whereIn('id_company',$userAssos)->first();

                if(!$post) return abort(404);

                $url = DB::transaction(function() use ($post){
                    User::find(auth()->id())
                    ->update([
                        'active_status' => 3,
                        'active_session' => $post->id_company
                    ]);

                    NotificationsModel::where('notif_owner','=',$post->id_courses)
                        ->update([
                            'read_at' => Carbon::now(),
                        ]);

                    return route('student.learning.learning',[$post->uuid]);
                });

                return redirect($url);
                break;
            case 2:

            case 3:
                $post = AnnouncementModel::where('uuid','=',$uuid)
                    ->whereIn('id_company',$userAssos)->first();

                if(!$post) return abort(404);

                $url = DB::transaction(function() use ($post){
                    NotificationsModel::where('notif_owner','=',$post->id_courses)
                        ->update([
                            'read_at' => Carbon::now(),
                        ]);

                    return route('general.announcement.read',[$post->uuid]);
                });
                return redirect($url);
                break;
            case 4:

            break;
            default:
                # code...
                return abort(404);
                break;
        }
    }


    public function getNotifications_old()
    {
        $notifications = NotificationsModel::where('notifiable_id','=',auth()->id())
            ->orderBy('created_at','DESC')
            ->get();


        $orderedNotif = [];
        $finallNotifications = [];

        // Goruping
        $groupedNotif = $notifications->groupBy('notif_type');

        //Set DESC created at as array key and set the item AKA replace $groupedNotif key as created_at
        foreach($groupedNotif as $gnotif){
            $sort = $gnotif->sortByDesc('created_at')->first();
            $orderedNotif[$sort->created_at] = ['data'=>$gnotif->toArray(),'type'=>'comment'];
        }
        krsort($orderedNotif);

        foreach($orderedNotif as $notif){
            switch ($notif['type']) {
                case 'comment':
                    # code...
                    $notifCount = count($notif['data']);
                    $finallNotifications[] = $notifCount.' Komentar baru pada';
                    break;

                default:
                    # code...
                    break;
            }
        }

        // Humanize notification
        dd($finallNotifications);

        return response()->json([$orderedNotif]);
    }
}
