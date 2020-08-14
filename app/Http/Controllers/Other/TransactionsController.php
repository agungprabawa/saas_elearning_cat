<?php

namespace App\Http\Controllers\Other;

use App\Http\Controllers\Controller;
use App\Models\AssistedTest\ExamModel;
use App\Models\Companies\CompaniesTransaction;
use App\Models\Learning\CoursesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TransactionsController extends Controller
{


    public function companyTransaction(Request $request)
    {
        $my = auth()->user();
        $ownerOf = $my->ownerOf()->pluck('id_company')->toArray();

        $elearning = CompaniesTransaction::select('title','courses.id_company as fid_company','companies.company_name as fcompany_name','companies_transactions.price','companies_transactions.created_at','users.name as buyer_name','users.id as buyer_id')
            ->where('type_product','=',1)
            ->whereIn('courses.id_company',$ownerOf)
            ->join('courses','courses.id_courses','=','id_product')
            ->join('companies','companies.id_company','=','courses.id_company')
            ->join('users','users.id','=','companies_transactions.created_by');

        $assistedtest = CompaniesTransaction::select('title','exams.id_company as fid_company','companies.company_name as fcompany_name','companies_transactions.price','companies_transactions.created_at','users.name as buyer_name','users.id as buyer_id')
            ->where('type_product','=',2)
            ->whereIn('exams.id_company',$ownerOf)
            ->join('exams','exams.id_exam','=','id_product')
            ->join('companies','companies.id_company','=','exams.id_company')
            ->join('users','users.id','=','companies_transactions.created_by');

        $a = DB::table(DB::raw("({$elearning->toSql()}) as a"))
            ->mergeBindings($elearning->getQuery())
            ->selectRaw("a.*");

        $b = DB::table(DB::raw("({$assistedtest->toSql()}) as b"))
            ->mergeBindings($assistedtest->getQuery())
            ->selectRaw("b.*");

        // dd($a->union($b)->get());

        $query = $a->union($b);

        // $query = DB::table(DB::raw("({$b->toSql()}) as x"))
        //     ->select(['title', 'fid_company']);
        
        return Datatables::of($query)->make(true);
    }

    public function myTransactions(Request $request)
    {
        $my = auth()->user();
        // $owner = $my->ownerOf()->pluck('id_company')->toArray();

        $elearning = CompaniesTransaction::select('title','courses.id_company as fid_company','companies.company_name as fcompany_name','companies_transactions.price','companies_transactions.created_at')->where('type_product','=',1)->where('companies_transactions.created_by','=',$my->id)
            ->join('courses','courses.id_courses','=','id_product')
            ->join('companies','companies.id_company','=','courses.id_company');

        $assistedtest = CompaniesTransaction::select('title','exams.id_company as fid_company','companies.company_name as fcompany_name','companies_transactions.price','companies_transactions.created_at')->where('type_product','=',2)
            ->where('companies_transactions.created_by','=',$my->id)
            ->join('exams','exams.id_exam','=','id_product')
            ->join('companies','companies.id_company','=','exams.id_company');

        $a = DB::table(DB::raw("({$elearning->toSql()}) as a"))
            ->mergeBindings($elearning->getQuery())
            ->selectRaw("a.*");

        $b = DB::table(DB::raw("({$assistedtest->toSql()}) as b"))
            ->mergeBindings($assistedtest->getQuery())
            ->selectRaw("b.*");

        // dd($a->union($b)->get());

        $query = $a->union($b);

        // $query = DB::table(DB::raw("({$b->toSql()}) as x"))
        //     ->select(['title', 'fid_company']);
        
        return Datatables::of($query)->make(true);
    }
}
