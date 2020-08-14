<?php

namespace App\Http\Controllers\SaaSAdmin\Monitor;

use App\Http\Controllers\Controller;
use App\Models\Companies\CompaniesModel;
use App\Models\LogModels\GeneralLogsModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Companies\CompanySubscribtions;
use DateTime;
use DateInterval;
use DatePeriod;
use Illuminate\Support\Facades\Hash;

class DashboardMonitorController extends Controller
{

    public function __construct(Request $request)
    {
        # code...
        // dd($request->route()->parameters()['id_company']);
    }

	public function dashboard(Request $request, $id_company)
    {
        // masa langganan, besar pembayaran selanjutnya
        $company = CompaniesModel::find($id_company);

//        dd($company->toArray());
        if(!$company) return redirect()->route('sudo.customers.monitor.list');

        $companySubscribtions = $company->subscribtions();
        // penggunaan prodak, elearning, assisted test, storage, users

        // total user, total pendapatan

        //statistik aktivitas

        $log_data_json = $this->activityLog($request,$id_company);

        $nav = [
            'menu' => 'overview',
            'submenu' => ''
        ];

        $managed = [
            'id_company' => $id_company,
            'company' => $company,
        ];
        // dd($logData);
        return view('pages.saas_admin.customers.monitor.dashboard')
            ->with(compact('nav','managed','company','log_data_json'));

    }

    public function inactivate(Request $request){
        $my = auth()->user();

        $company = CompaniesModel::find($request->id_company);

        if(Hash::check($request->password,$my->password) && $company){
            $company->update([
                'service_status' => 1,
                'updated_at' => Carbon::now(),
                'updated_by' => $my->id
            ]);

            return response()->json(['success'=>'']);
        }

        return response()->json(['error'=>'1']);
    }

    public function activate(Request $request){
        $my = auth()->user();

        $company = CompaniesModel::find($request->id_company);

        if(Hash::check($request->password,$my->password) && $company){
            $company->update([
                'service_status' => 0,
                'updated_at' => Carbon::now(),
                'updated_by' => $my->id
            ]);

            return response()->json(['success'=>'']);
        }

        return response()->json(['error'=>'1']);
    }

    public function activityLog(Request $request, $id_company){


        $begin = Carbon::now()->subDays(7)->format('Y-m-d');
        $end = Carbon::now()->format('Y-m-d 23:59:59');
        $daterange = makeDaterange($begin,$end,'P1D');

        $logActivity = GeneralLogsModel::select(DB::raw('DATE(access_at) as date, page_type'))
            ->where('id_company','=',$id_company)
            ->whereBetween('access_at',[$begin,$end])->get();

        $studentActivity = $logActivity->where('page_type','=',2)->groupBy('date')->toArray();
        $adminActivity = $logActivity->where('page_type','=',1)->groupBy('date')->toArray();

        // dd($studentActivity);

        $logData['admin'] = array();
        $logData['student'] = array();

        foreach($daterange as $date){

            $logAdmCount = 0;
            if(array_key_exists($date->format('Y-m-d'),$adminActivity)){
                $logAdmCount = count($adminActivity[$date->format('Y-m-d')]);
            }
            array_push($logData['admin'],[
                'date' => $date->format('Y-m-d'),
                'count' => $logAdmCount,
            ]);

            $logStdCount = 0;
            if(array_key_exists($date->format('Y-m-d'),$studentActivity)){
                $logStdCount = count($studentActivity[$date->format('Y-m-d')]);
            }
            array_push($logData['student'],[
                'date' => $date->format('Y-m-d'),
                'count' => $logStdCount,
            ]);
        }
        return json_encode($logData);
    }

    public function storageUsage($id_company)
    {

        $company = CompaniesModel::find($id_company);

        $currentSubsSize = CompanySubscribtions::select('size')->where('id_company', '=', $id_company)
            ->where('id_srv_attribute', '=', 4)
            ->first();

        $path = storage_path('app/public/' . $company->uuid);
        $sizeByte = folderSize($path);
        $gbSize = number_format($sizeByte / 1073741824, 5);
        $humanSize = formatSize($sizeByte);
        $usagePercentage = ($gbSize / $currentSubsSize->size) * 100;
        return response()->json([
            'storage_size' => $currentSubsSize->size,
            'human_size' => $humanSize,
            'usage_percentage' => $usagePercentage.'%',
        ], 200);
    }


}
