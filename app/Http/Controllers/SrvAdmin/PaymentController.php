<?php

namespace App\Http\Controllers\SrvAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Companies\CompanySubscribtions;
use App\Models\Companies\CompaniesModel;
use XenditClient\XenditPHPClient;
use Illuminate\Support\Str;
use App\Models\TransactionsModel\TransactionsModel;
use App\Models\TransactionsModel\TransactionItemsModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables;

class PaymentController extends Controller
{

    // STATUS KET. 0 - PENDDING, 1 - SETTLED/PAID, 2 - EXPIRED
    // SHOULD PAY KET. 0 - NO TRANSACTION NEEDED, 1 - TRANSACTION NEEDED, 2 - FIRST TRANSACTION, 3 UPGRADE TRANSACTION

    // public function __construct()
    // {
    //     $this->middleware('payment.validation');
    // }

    public function index()
    {
        $nav = [
            'menu' => 'payment',
            'submenu' => ''
        ];

        $lastTransaction = TransactionsModel::where('status', '=', 1)
            ->where('id_company', '=', auth()->user()->active_session)
            ->where('type', '=', 1)
            ->orderBy('until', 'DESC')
            ->first();

        $getLastUpgrade = TransactionsModel::where('type', '=', 2)
            ->where('status', '=', 0)
            ->where('id_company', '=', auth()->user()->active_session)
            ->orderBy('created_at', 'DESC')
            ->first();

        $company = CompaniesModel::where('id_company', '=', auth()->user()->active_session)->first();

        if ($company->subscribe_until != NULL) {
            $shouldPay = (Carbon::parse($company->subscribe_until)->subMonth(2) > Carbon::now()) ? 'no' : 'yes';
        } else {
            $shouldPay = 'yes';
        }


        $dueDate = '';
        if ($shouldPay == 1) {
            $dueDate = Carbon::parse($company->subscribe_until)->format('d F Y');
        }
        // return $shouldPay;
        // return Carbon::parse($lastTransaction->until) .'----'.Carbon::now().'----'.auth()->user()->active_session;

        $curentSubs = CompanySubscribtions::join('srv_attributes', 'srv_attributes.id_s_attributes', '=', 'id_srv_attribute')
            ->where('companies_subscribtions.id_company', '=', auth()->user()->active_session)
            ->get();


        if ($getLastUpgrade) {
            $lastTransaction = $getLastUpgrade;
            $yourUpgrades = TransactionItemsModel::where('id_s_transaction', '=', $getLastUpgrade->id_s_transaction)
                ->join('srv_attributes', 'srv_attributes.id_s_attributes', '=', 'id_s_attribute')
                ->where('total_price', '!=', 0)
                ->get();
            $shouldPay = 'upgrade';
            // return false;
            // return $yourUpgrade;

            return view('pages.srv_admin.payment.payment')
                ->with(compact('yourUpgrades', 'curentSubs', 'company', 'shouldPay', 'lastTransaction', 'nav'));
        }

        return view('pages.srv_admin.payment.payment')
            ->with(compact('curentSubs', 'shouldPay', 'company', 'dueDate', 'lastTransaction', 'nav'));
    }

    public function createPayment()
    {
        $lastTransaction = TransactionsModel::select('transaction_token', 'transaction_url', 'external_id')->where('status', '=', 0)
            ->where('id_company', '=', auth()->user()->active_session)
            ->orderBy('created_at', 'DESC')
            ->first();

        if ($lastTransaction) {
            if ($this->checkIfAlreadyPaid($lastTransaction->transaction_token)) {
                return redirect()->route('srv_admin.payment.validate', [$lastTransaction->external_id]);
            } else if ($this->checkIfExistTransaction($lastTransaction->transaction_token)) {
                return redirect($lastTransaction->transaction_url);
            };
        }

        $transactionUrl = DB::transaction(function () {
            $total = 0;
            $uuid = Str::orderedUuid();

            $option['secret_api_key'] = "xnd_development_7aF9gEqqHqtw48M6QrvwMWkCel1eZ9QvAq2mzFghzKbfms4a4jJ4AzBXHhfdCQLm";
            $XGateway = new XenditPHPClient($option);

            $curentSubs = CompanySubscribtions::select('srv_attributes.id_s_attributes', 'size', 'price')
                ->join('srv_attributes', 'srv_attributes.id_s_attributes', '=', 'id_srv_attribute')
                ->where('companies_subscribtions.id_company', '=', auth()->user()->active_session)
                ->get();

            foreach ($curentSubs as $item) {
                $total += ($item->size * $item->price);
            }

            $external_id = $uuid;
            $amount = $total;
            $payer_email = auth()->user()->email;
            $description = 'Pembayaran layanan E-learning dan Computer Assisted Test';
            // $success_redirect_url = route('srv_admin.payment.validate', [$external_id]);
            $success_redirect_url = route('srv_admin.payment.validate', [$external_id]);

            $response = $XGateway->createInvoice($external_id, $amount, $payer_email, $description, $success_redirect_url);

            $transaction =  TransactionsModel::create([
                'id_company' => auth()->user()->active_session,
                'id_user' => auth()->user()->id,
                'transaction_url' => $response['invoice_url'],
                'transaction_token' => $response['id'],
                'external_id' => $external_id,
                'total_price' => $amount,
                'type' => 1,
            ]);

            foreach ($curentSubs as $item) {
                TransactionItemsModel::create([
                    'id_s_transaction' => $transaction->id_s_transaction,
                    'id_s_attribute' => $item->id_s_attributes,
                    'size' => $item->size,
                    'total_price' => ($item->size * $item->price)
                ]);
            }
            return $response['invoice_url'];
        });

        return redirect($transactionUrl);
    }

    public function payUpgrade()
    {
        $lastTransaction = TransactionsModel::select('transaction_token', 'transaction_url', 'external_id','id_s_transaction')->where('status', '=', 0)
            ->where('id_company', '=', auth()->user()->active_session)
            ->where('type', '=', '2')
            ->orderBy('created_at', 'DESC')
            ->first();

        if ($lastTransaction) {
            $option['secret_api_key'] = "xnd_development_7aF9gEqqHqtw48M6QrvwMWkCel1eZ9QvAq2mzFghzKbfms4a4jJ4AzBXHhfdCQLm";
            $XGateway = new XenditPHPClient($option);

            $response = $XGateway->getInvoice($lastTransaction->transaction_token);

            if ($response['status'] == "EXPIRED") {

                $url = DB::transaction(function () use ($XGateway, $lastTransaction) {

                    $transactionItems = TransactionItemsModel::where('id_s_transaction', '=', $lastTransaction->id_s_transaction)->get();
                    $totalAmount = 0;
                    foreach ($transactionItems as $item) {
                        $totalAmount += $item->total_price;
                    }

                    $external_id = $lastTransaction->external_id;
                    $amount = $totalAmount;
                    $payer_email = auth()->user()->email;
                    $description = 'Pembayaran layanan E-learning dan Computer Assisted Test';
                    // $success_redirect_url = route('srv_admin.payment.validate', [$external_id]);
                    $success_redirect_url = route('srv_admin.payment.validate', [$external_id]);

                    $newResponse = $XGateway->createInvoice($external_id, $amount, $payer_email, $description, $success_redirect_url);
                    TransactionsModel::where('id_s_transaction','=',$lastTransaction->id_s_transaction)
                        ->update([
                            'transaction_url' => $newResponse['invoice_url'],
                            'transaction_token' => $newResponse['id'],
                        ]);

                    return $newResponse;
                });
                return redirect($url['invoice_url']);
            } else if ($response['status'] == "PENDING") {
                return redirect($response['invoice_url']);
            } else {
                return redirect()->route('srv_admin.payment.index');
            }
        }
    }

    public function transactionHistoryIndex()
    {

        $nav = [
            'menu' => 'payment',
            'submenu' => ''
        ];

        return view('pages.srv_admin.payment.history')
            ->with(compact('nav'));
    }

    public function transactionHistory(Request $request)
    {
        if($request->detail){
            $transactions = TransactionsModel::where('id_company','=',auth()->user()->active_session)
                ->where('id_s_transaction','=',$request->detail)->first();

            if(!$transactions) return null;

            $transItem = TransactionItemsModel::select('srv_transaction_items.size','srv_transaction_items.total_price','srv_attributes.label')
                ->join('srv_attributes','srv_attributes.id_s_attributes','=','id_s_attribute')
                ->where('id_s_transaction','=',$request->detail)
                ->where('srv_transaction_items.total_price','!=',0)
                ->get();

            return response()->json($transItem);
        }else{
            $transactions = TransactionsModel::where('id_company','=',auth()->user()->active_session);
        }
        
        return datatables()->of($transactions)->toJson();
    }

    function checkIfExistTransaction($token)
    {
        $option['secret_api_key'] = "xnd_development_7aF9gEqqHqtw48M6QrvwMWkCel1eZ9QvAq2mzFghzKbfms4a4jJ4AzBXHhfdCQLm";
        $XGateway = new XenditPHPClient($option);

        $response = $XGateway->getInvoice($token);

        if ($response['status'] == "PENDING") {
            return true;
        } else if ($response['status'] == "EXPIRED") {
            TransactionsModel::where('transaction_token', '=', $token)
                ->update([
                    'status' => '2',
                    'updated_at' => Carbon::now()
                ]);
            return false;
        } else {
            return false;
        }
    }


    public function checkIfAlreadyPaid($token)
    {
        $option['secret_api_key'] = "xnd_development_7aF9gEqqHqtw48M6QrvwMWkCel1eZ9QvAq2mzFghzKbfms4a4jJ4AzBXHhfdCQLm";
        $XGateway = new XenditPHPClient($option);

        $response = $XGateway->getInvoice($token);

        if ($response['status'] == "SETTLED") {
            return true;
        } else {
            return false;
        }
    }

    public function checkFinishedPayment($token)
    {
        // Token == eksternal_id
        $option['secret_api_key'] = "xnd_development_7aF9gEqqHqtw48M6QrvwMWkCel1eZ9QvAq2mzFghzKbfms4a4jJ4AzBXHhfdCQLm";
        $XGateway = new XenditPHPClient($option);

        $transaction = TransactionsModel::select('external_id', 'transaction_token', 'type')->where('external_id', '=', $token)->first();

        $response = $XGateway->getInvoice($transaction->transaction_token);
        $status = $response['status'];

        // Type 1 transaksi biasa, type 2 transaksi upgrade
        if ($transaction->type == 1) {

            if ($status == 'SETTLED' || $status == 'PAID') {
                TransactionsModel::where('external_id', '=', $token)
                    ->update([
                        'status' => '1',
                        'until' => Carbon::now()->addMonths(12),
                        'updated_at' => Carbon::now()
                    ]);
            }
            return redirect()->route('srv_admin.payment.index');
        } else {
            if ($status == 'SETTLED' || $status == 'PAID') {
                TransactionsModel::where('external_id', '=', $token)
                    ->update([
                        'status' => '1',
                        'updated_at' => Carbon::now()
                    ]);

                $idTransaction = TransactionsModel::where('external_id', '=', $token)->first();

                $transSubs = TransactionItemsModel::where('id_s_transaction', '=', $idTransaction->id_s_transaction)
                    ->get();

                foreach ($transSubs as $item) {
                    CompanySubscribtions::where('companies_subscribtions.id_company', '=', auth()->user()->active_session)
                        ->where('companies_subscribtions.id_srv_attribute', '=', $item->id_s_attribute)
                        ->update([
                            'size' => $item->size
                        ]);
                }
            } else if ($status == 'PENDING') {
                return redirect($response['invoice_url']);
            }

            return redirect()->route('srv_admin.subscribtions.index');
        }
    }

    public function checkFinishedPaymentFromUpgrade($token)
    {
        $option['secret_api_key'] = "xnd_development_7aF9gEqqHqtw48M6QrvwMWkCel1eZ9QvAq2mzFghzKbfms4a4jJ4AzBXHhfdCQLm";
        $XGateway = new XenditPHPClient($option);

        $transaction = TransactionsModel::select('external_id', 'transaction_token')->where('external_id', '=', $token)->first();

        $response = $XGateway->getInvoice($transaction->transaction_token);
        $status = $response['status'];

        if ($status == 'SETTLED' || $status == 'PAID') {
            TransactionsModel::where('external_id', '=', $token)
                ->update([
                    'status' => '1',
                    'updated_at' => Carbon::now()
                ]);

            $idTransaction = TransactionsModel::where('external_id', '=', $token)->first();

            $transSubs = TransactionItemsModel::where('id_s_transaction', '=', $idTransaction->id_s_transaction)
                ->get();

            foreach ($transSubs as $item) {
                CompanySubscribtions::where('companies_subscribtions.id_company', '=', auth()->user()->active_session)
                    ->where('companies_subscribtions.id_srv_attribute', '=', $item->id_s_attribute)
                    ->update([
                        'size' => $item->size
                    ]);
            }
        } else if ($status == 'PENDING') {
            return redirect($response['invoice_url']);
        }

        return redirect()->route('srv_admin.subscribtions.index');
    }

    public function cancelPaymentFromUpgrade($token)
    {
        $option['secret_api_key'] = "xnd_development_7aF9gEqqHqtw48M6QrvwMWkCel1eZ9QvAq2mzFghzKbfms4a4jJ4AzBXHhfdCQLm";
        $XGateway = new XenditPHPClient($option);

        $currentTransaction = TransactionsModel::where('transaction_token', '=', $token)
            ->where('id_company', '=', auth()->user()->active_session)
            ->first();

        if ($currentTransaction) {
            $XGateway->expireInvoice($token);
            TransactionsModel::where('transaction_token', '=', $token)
                ->where('id_company', '=', auth()->user()->active_session)
                ->update(['status' => 2]);
        }

        return redirect()->route('srv_admin.payment.index');
    }

    public function getPayment($token)
    {
        $option['secret_api_key'] = "xnd_development_7aF9gEqqHqtw48M6QrvwMWkCel1eZ9QvAq2mzFghzKbfms4a4jJ4AzBXHhfdCQLm";
        $XGateway = new XenditPHPClient($option);

        $invoice_id = '5e019d20f4d38b20d541ec1d';

        $response = $XGateway->getInvoice($token);
        print_r($response);
    }
}
