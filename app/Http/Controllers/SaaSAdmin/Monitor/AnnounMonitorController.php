<?php

namespace App\Http\Controllers\SaaSAdmin\Monitor;

use App\Events\UpdateNotifications;
use App\Http\Controllers\Controller;
use App\Models\AnnouncementModel;
use App\Models\AnnouncementNotifyable;
use App\Models\Companies\CompaniesModel;
use App\Models\NotificationsModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AnnounMonitorController extends Controller
{
    private $currentCompany;

    public function __construct(Request $request)
    {
        $id_company = $request->route()->parameters()['id_company'];

        $company = CompaniesModel::find($id_company);
        if(!$company) return redirect()->route('sudo.customers.monitor.list');
        $this->currentCompany = $company;
    }

    public function announcList($id_company)
    {

        $nav = [
            'menu' => 'm-announcement',
            'submenu' => '',

        ];

        $managed = [
            'id_company' => $id_company,
            'company' => $this->currentCompany,
        ];
        // dd($logData);
        return view('pages.saas_admin.customers.monitor.announcement.list')
            ->with(compact('nav','managed'));
    }

    public function announcement($id_company, $id_announcement)
    {
        $announcement = AnnouncementModel::find($id_announcement);
        if(!$announcement) return redirect()->route('sudo.customers.monitor.announ.list',$id_company);

        $nav = [
            'menu' => 'm-announcement',
            'submenu' => '',
            'widgetmenu' => 'overview',
        ];

        $managed = [
            'id_company' => $id_company,
            'company' => $this->currentCompany,
        ];
        // dd($logData);
        return view('pages.saas_admin.customers.monitor.announcement.pages.overview')
            ->with(compact('nav','managed','announcement'));
    }

    public function deleteAnnouncement(Request $request, $id_company)
    {
        $announcement = AnnouncementModel::find($request->id_ann);

        if($announcement){
            $notif = DB::transaction(function() use ($request, $announcement){

                $usersId = NotificationsModel::where('notif_owner','=',$announcement->id_ann)
                    ->where('notif_type','=','announcement')
                    ->get()->pluck('notifiable_id')->toArray();

                $announcement->update([
                    'is_deleted' => 1,
                    'deleted_by' => auth()->id(),
                    'deleted_at' => Carbon::now()
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

    public function notifiedUsers($id_company, $id_announcement){
        $announcement = AnnouncementModel::find($id_announcement);
        if(!$announcement) return redirect()->route('sudo.customers.monitor.announ.list',$id_company);

        $nav = [
            'menu' => 'm-announcement',
            'submenu' => '',
            'widgetmenu' => 'participant',
        ];

        $managed = [
            'id_company' => $id_company,
            'company' => $this->currentCompany,
        ];
        // dd($logData);
        return view('pages.saas_admin.customers.monitor.announcement.pages.notifiedusers.list')
            ->with(compact('nav','managed','announcement'));
    }

    public function announcementListJson($id_company){
        $queryString =
            "SELECT
                an.id_ann,
                an.title,
                an.created_at,
                an.id_company,
                SUBSTR(REGEXP_REPLACE(an.content, '<[^>]*>+', ''),1,100) as content,
                u.name
            FROM announcement an
            INNER JOIN users u on u.id = an.created_by
            WHERE id_company = ? AND an.is_deleted = 0";

        $queryBindings = [
            $id_company
        ];

        $announcementQuery = DB::select($queryString, $queryBindings);

        return datatables()->of($announcementQuery)->toJson();
    }

    public function notifiedUsersJsonList($id_company, $id_announcement){
        $queryString =
            "SELECT
                u.name,
                n.read_at
            FROM notifications n
            INNER JOIN announcement a ON a.id_ann = n.notif_owner
            INNER JOIN users u ON u.id = n.notifiable_id
            WHERE
                  n.id_company = ? and
                  n.owner_type = 3 and
                  n.notif_type = 'announcement' and
                  a.id_ann = ?";

        $queryBindings = [
            $id_company,
            $id_announcement
        ];

        $notifiedUsersQuery = DB::select($queryString, $queryBindings);

        return datatables()->of($notifiedUsersQuery)->toJson();
    }
}
