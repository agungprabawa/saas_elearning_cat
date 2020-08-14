<?php

namespace App\Http\Controllers\SaaSAdmin\Customers;

use App\Http\Controllers\Controller;
use App\Models\TransactionsModel\TransactionsModel;
use App\Models\TransactionsModel\TransactionItemsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CustomersTransactionsController extends Controller
{
    public function transactionsList()
    {

        $status[0] = 'btn-warning kt-font-warning';
        $status[1] = 'btn-success kt-font-success';
        $status[2] = '';


        $nav = [
            'menu' => 'transactions',
            'submenu' => ''
        ];


        return view('pages.saas_admin.transactions.list')
            ->with(compact('nav'));
    }

    public function transactionsDetail($idtransactions)
    {
        $transactions = TransactionsModel::find($idtransactions);
        $transactionItemsQuery = DB::raw(
            "SELECT * FROM srv_transaction_items WHERE id_s_transactions = $transactions->id_s_transaction
            JOIN srv_attributes ON srv_transaction_items.id_s_attribute = srv_attributes.id_s_attributes"
        );

        $transactionsItems = DB::select($transactionItemsQuery);

        // var_dump($transactionItemsQuery);
    }
    
    public function transactionsDataTables(Request $request)
    {

        if($request->detail){
            // return response()->json('test');

            $transactions = TransactionsModel::where('id_s_transaction','=',$request->detail)->first();

            if(!$transactions) return null;

            $transItem = TransactionItemsModel::select('srv_transaction_items.size','srv_transaction_items.total_price','srv_attributes.label')
                ->join('srv_attributes','srv_attributes.id_s_attributes','=','id_s_attribute')
                ->where('id_s_transaction','=',$request->detail)
                ->where('srv_transaction_items.total_price','!=',0)
                ->get();

            return response()->json($transItem);

        }else{
            $transactionsQuery = DB::raw(
                'SELECT srv_transactions.id_s_transaction as id_t, company_name, srv_transactions_type.label as type, srv_transactions_status.label as status, srv_transactions.created_at, total_price
                FROM srv_transactions
                INNER JOIN companies ON companies.id_company = srv_transactions.id_company
                INNER JOIN srv_transactions_type ON srv_transactions.type = srv_transactions_type.id_t_tyoe
                INNER JOIN srv_transactions_status ON srv_transactions.status = srv_transactions_status.id_t_status
                ORDER BY srv_transactions.created_at DESC'
            );
            $transactions = DB::select($transactionsQuery);
            return datatables()->of($transactions)->toJson();
        }
    }
}
