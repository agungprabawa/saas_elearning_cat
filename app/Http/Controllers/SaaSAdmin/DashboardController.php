<?php

namespace App\Http\Controllers\SaaSAdmin;

use App\Http\Controllers\Controller;
use App\Models\LogModels\GeneralLogsModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App;
use App\Models\Companies\CompaniesModel;
use App\User;
use Illuminate\Support\Facades\DB;
use DateInterval;
use DateTime;
use DatePeriod;
use App\Models\Learning\CoursesModel;
use App\Models\AssistedTest\ExamModel;
use App\Models\AnnouncementModel;

class DashboardController extends Controller
{

    public function index(Request $request){
        // return 'you are sudo';

        $total_customers = CompaniesModel::all();
        $total_users = User::all();

        $courses = CoursesModel::all();
        $exams = ExamModel::all();
        $announc = AnnouncementModel::all();

        $serviceTransactions = $this->servicesTransactions();
        $nonServiceTransactions = $this->nonServicesTransactions();


        $nav = [
            'menu' => 'dashboard',
            'submenu' => ''
        ];
        return view('pages.saas_admin.dashboard.dashboard')
            ->with(compact('nav','request', 'total_customers', 'total_users','courses', 'exams','announc','serviceTransactions','nonServiceTransactions'));
    }

    public function dynActivityLogs(Request $request){

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
            WHERE access_at BETWEEN ? AND ?
            GROUP BY $groupStr";

        $queryActity = DB::select($queryString, [$start,$end]);

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

        $per_c = $this->activityPerCompany($start, $end);

        return response()->json(['label'=>$labelData,'counted'=>$countedData,'per_c'=>$per_c]);

    }

    public function dynTransactionsLogs(Request $request){

        $start = $request->start_date;
        $end = $request->stop_date;
        $group = $request->grouping;

        // generate select / group

        if ($group === 'd'){
            $groupStr = $selectStr = "DATE_FORMAT(st.created_at, '%Y-%c-%d')";
            $groupStr2 = $selectStr2 = "DATE_FORMAT(ct.created_at, '%Y-%c-%d')";
            $interval = 'P1D';
            $phpDateFormater = 'Y-n-d';
            $dateLocaleFormat = '%d %b %Y';
        }else if ($group === 'm'){
            $groupStr = $selectStr = "DATE_FORMAT(st.created_at, '%Y-%c')";
            $groupStr2 = $selectStr2 = "DATE_FORMAT(ct.created_at, '%Y-%c')";
            $interval = 'P1M';
            $phpDateFormater = 'Y-n';
            $dateLocaleFormat = '%b %Y';
        }else{
            $groupStr = $selectStr = "DATE_FORMAT(st.created_at, '%Y')";
            $groupStr2 = $selectStr2 = "DATE_FORMAT(ct.created_at, '%Y')";
            $interval = 'P1Y';
            $phpDateFormater = 'Y';
            $dateLocaleFormat = '%Y';
        }


        $start_ = new DateTime($start);
        $end_ = new DateTime($end);
        $interval_ = new DateInterval($interval);
        $dateRange = new DatePeriod($start_,$interval_,$end_);


        // service transactions query string
        $queryString1 =
            "SELECT
                $selectStr as dates,
                SUM(IF(st.status = 1, st.total_price, 0)) as counted
            FROM srv_transactions st
            WHERE st.created_at BETWEEN ? AND ?
            GROUP BY $groupStr";


        $queryTransactions = DB::select($queryString1, [$start,$end]);


        $transactionsData = array();
        foreach ($queryTransactions as $data){
            $transactionsData[strval(trim($data->dates))] = [
                'date' => $data->dates,
                'counted' => $data->counted,
            ];
        }
//        dd($transactionsData);
        // non service transaction query string

        $queryString2 =
            "SELECT
                $selectStr2 as dates,
                SUM(IF(ct.status = 1, ct.price, 0)) as counted
            FROM companies_transactions ct
            WHERE ct.created_at BETWEEN ? AND ?
            GROUP BY $groupStr2";

        $nonServiceTranscations = DB::select($queryString2, [$start,$end]);

        $nonSrvTransData = array();
        foreach ($nonServiceTranscations as $data){
            $nonSrvTransData[strval(trim($data->dates))] = [
                'date' => $data->dates,
                'counted' => $data->counted,
            ];
        }


        $readyActivityData = array();
        $labelData = array();
        $transactionSum = array();
        $nonSrvTransSum = array();
        foreach ($dateRange as $date){

            $actCounter1 = 0;
            $actCounter2 = 0;
            $dateFormater = strval(trim($date->format($phpDateFormater)));

            if (array_key_exists($dateFormater,$transactionsData)){

                $actCounter1 = $transactionsData[$dateFormater]['counted'];
            }

            if (array_key_exists($dateFormater, $nonSrvTransData)){
                $actCounter2 = $nonSrvTransData[$dateFormater]['counted'];
            }


            //push label data
            array_push($labelData,
                Carbon::parse($date)->formatLocalized($dateLocaleFormat)
            );


            // push transaction srv data counted
            array_push($transactionSum,
                $actCounter1
            );

            // push non srv transactions data counted
            array_push($nonSrvTransSum,
                $actCounter2
            );

        }

        $tr_per_c = $this->transactionPerCompany($start, $end);

        return response()->json(['label'=>$labelData,'srv_transactions'=>$transactionSum,'non_srv_transactions'=>$nonSrvTransSum,'tr_per_c'=>$tr_per_c]);

    }

    public function activityPerCompany($start, $end){
        $queryString =
            "SELECT
                c.company_name,
                COUNT(*) as counted
            FROM general_activity_log
            INNER JOIN companies c on general_activity_log.id_company = c.id_company
            WHERE access_at BETWEEN ? AND ?
            GROUP BY c.id_company
            LIMIT 10";

        $queryActity = DB::select($queryString, [$start,$end]);

        return $queryActity;
    }

    public function transactionPerCompany($start,$end){
        $queryString1 =
            "SELECT
                c.company_name,
                SUM(IF(st.status = 1,st.total_price,0)) as counted
            FROM srv_transactions st
            INNER JOIN companies c ON c.id_company = st.id_company
            WHERE st.created_at BETWEEN ? AND ?
            GROUP BY c.id_company";

        $queryString2 =
            "SELECT
                c.company_name,
                SUM(IF(ct.status = 1,ct.price,0)) as counted
            FROM companies_transactions ct
            INNER JOIN companies c ON c.id_company = ct.id_company
            WHERE ct.created_at BETWEEN ? AND ?
            GROUP BY c.id_company";

        $queryBindings = [
          $start,
          $end
        ];

        $srvTr = DB::select($queryString1, $queryBindings);
        $nonSrvTr = DB::select($queryString2, $queryBindings);

        return [
          'srv_transactions' => $srvTr,
          'non_srv_transactions' => $nonSrvTr
        ];
    }

    private function activityLogs($begin, $end, $interval){
        $begin_ = new DateTime(Carbon::parse($begin));
        $end_ = new DateTime(Carbon::parse($begin));

        $interval = new DateInterval($interval);
        $daterange = new DatePeriod($begin, $interval ,$end);

        $logs = GeneralLogsModel::select(DB::raw('DATE(access_at) as date'))
            ->where('page_type','=',2) // 1 admin, 2 student
            ->whereBetween('access_at',[$begin,$end])->get()
            ->groupBy('date')
            ->toArray();

        $queryString = '';

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

        return response()->json($datalog);
    }

    private function servicesTransactions(){
        $queryString =
            'SELECT
                   count(IF(status = 1, 1, null)) as total_c_success,
                   SUM(IF(status = 1, total_price, null)) as total_s_success
            FROM srv_transactions';

        $transactions = DB::select($queryString);

        return collect($transactions)->first();
    }

    private function nonServicesTransactions(){
        $queryString =
            'SELECT
                   count(IF(status = 1, 1, null)) as total_c_success,
                   SUM(IF(status = 1, price, null)) as total_s_success
            FROM companies_transactions';

        $transactions = DB::select($queryString);

        return collect($transactions)->first();
    }


    public function storageUsage()
    {

        $path = storage_path('app/public/');
        $sizeByte = folderSize($path);
        $gbSize = number_format($sizeByte / 1073741824, 5);
        $humanSize = formatSize($sizeByte);
        return response()->json([
            'human_size' => $humanSize,
        ], 200);
    }
}
