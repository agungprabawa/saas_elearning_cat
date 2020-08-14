<?php

namespace App\Http\Controllers\SrvAdmin;

use App\Http\Controllers\Controller;
use App\Models\Companies\CompaniesModel;
use App\Models\Companies\CompanySubscribtions;
use App\Models\NotificationsModel;
use App\Models\AnnouncementModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\LogModels\GeneralLogsModel;
use DateTime;
use DatePeriod;
use DateInterval;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {

    }

    public function index(){

        // date range
        $my = auth()->user();

        $company = CompaniesModel::find($my->active_session);

        $begin = new DateTime(Carbon::now()->subDays(7)->format('Y-m-d'));

        $end = new DateTime(Carbon::now()->format('Y-m-d 23:59:59'));
        // $end = $end->modify('+1 day');
        // $end = $end->modify('+24 hours');

        // dd($end);

        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($begin, $interval ,$end);


        $logs = GeneralLogsModel::select(DB::raw('DATE(access_at) as date'))
            ->where('page_type','=',2) // 1 admin, 2 student
            ->where('id_company','=',$my->active_session)
            ->whereBetween('access_at',[$begin,$end])->get()
            ->groupBy('date')
            ->toArray();

        // dd($logs);

        $datalog = array();

        foreach($daterange as $date){

            // echo $date->format('Y-m-d').'<br>';

            $logCount = 0;

            if(array_key_exists($date->format('Y-m-d'),$logs)){
                // echo 'exist '. count($logs[$date->format('Y-m-d')]);
                $logCount = count($logs[$date->format('Y-m-d')]);
            }
            // $datalog[$date->format('Y-m-d')] = $logCount;

            array_push($datalog,[
                'date' => $date->format('Y-m-d'),
                'count' => $logCount,
            ]);

        }

        $logjson = json_encode($datalog);

        $idAnnouncement = NotificationsModel::select('notif_owner')
            ->where('notif_type','=','announcement')
            ->where('notifiable_id','=',$my->id)
            ->pluck('notif_owner');

        $announcement = AnnouncementModel::whereIn('id_ann',$idAnnouncement)
            ->orderBy('created_at','DESC')
            ->limit(10)->get();

        $nav = [
            'menu' => 'dashboard',
            'submenu' => ''
        ];
        return view('pages.srv_admin.dashboard.dashboard')
        ->with(compact('nav','logjson','company','announcement'));
    }

    public function dynActivityLogs(Request $request){

        $my = auth()->user();

        $start = $request->start_date;
        $end = $request->stop_date;
        $group = $request->grouping;

        // generate select / group

        if ($group === 'd'){
            $groupStr = $selectStr = "DATE_FORMAT(general_activity_log.access_at, '%Y-%c-%d')";
            $interval = 'P1D';
            $phpDateFormater = 'Y-n-d';
            $dateLocaleFormat = '%d %b %Y';
        }else if ($group === 'm'){
            $groupStr = $selectStr = "DATE_FORMAT(general_activity_log.access_at, '%Y-%c')";
            $interval = 'P1M';
            $phpDateFormater = 'Y-n';
            $dateLocaleFormat = '%b %Y';
        }else{
            $groupStr = $selectStr = "DATE_FORMAT(general_activity_log.access_at, '%Y')";
            $interval = 'P1Y';
            $phpDateFormater = 'Y';
            $dateLocaleFormat = '%Y';
        }


        $start_ = new DateTime($start);
        $end_ = new DateTime($end);
        $interval_ = new DateInterval($interval);
        $dateRange = new DatePeriod($start_,$interval_,$end_);

        $queryString =
            "SELECT
                $selectStr as dates,
                COUNT(*) as counted
            FROM general_activity_log
            WHERE access_at BETWEEN ? AND ? AND id_company = ?
            GROUP BY $groupStr";

        $queryActity = DB::select($queryString, [$start,$end,$my->active_session]);

        $activityData = array();
        foreach ($queryActity as $data){
            $activityData[strval(trim($data->dates))] = [
                'date' => $data->dates,
                'counted' => $data->counted,
            ];
        }

        $readyActivityData = array();
        $labelData = array();
        $countedData = array();
        foreach ($dateRange as $date){

            $actCounter = 0;
            $dateFormater = strval(trim($date->format($phpDateFormater)));

            if (array_key_exists($dateFormater,$activityData)){

                $actCounter = $activityData[$dateFormater]['counted'];
            }


            //push label data
            array_push($labelData,
                Carbon::parse($date)->formatLocalized($dateLocaleFormat)
            );

            // psuh data counted
            array_push($countedData,
                $actCounter
            );

        }

        return response()->json(['label'=>$labelData,'counted'=>$countedData]);

    }
}
