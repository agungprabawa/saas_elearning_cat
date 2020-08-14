<?php

namespace App\Http\Controllers\SaaSAdmin\Customers;

use App\Http\Controllers\Controller;
use App\Models\Companies\CompaniesModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class CustomersMonitorController extends Controller
{
    public function customersList()
    {
        $nav = [
            'menu' => 'overview',
            'submenu' => ''
        ];

        return view('pages.saas_admin.customers.list')
            ->with(compact('nav'));
    }

    public function customersDataTables()
    {
       $customers = DB::select(DB::raw(
           "SELECT count(DISTINCT id_user) as users,company_name,companies_type.label as company_type, subscribe_until, companies.created_at, companies.id_company as ids FROM companies
           INNER JOIN user_srv_dtl ON user_srv_dtl.id_company = companies.id_company
           INNER JOIN companies_type ON company_type = id_type
           GROUP BY company_name"
       ));

        return datatables()->of($customers)->toJson();
    }

    public function elearnings($id_company)
    {
        # code...
    }

    public function elearningDetails($id_company, $courses_uuid)
    {
        # code...
    }

    public function assistedtest($id_company)
    {
        # code...
    }

    public function assistedtestDetail($id_company, $exams_uuid)
    {
        # code...
    }
}
