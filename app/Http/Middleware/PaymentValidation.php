<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Companies\CompaniesModel;
use App\Models\Companies\CompanySubscribtions;
use App\Models\TransactionsModel\TransactionsModel;
use App\Models\TransactionsModel\TransactionItemsModel;
use XenditClient\XenditPHPClient;

class PaymentValidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $lastTransaction = TransactionsModel::where('status', '=', 0)
            ->where('id_company', '=', auth()->user()->active_session)
            ->orderBy('created_at', 'DESC')
            ->first();


        if ($lastTransaction) {
            // Token == eksternal_id
            $option['secret_api_key'] = "xnd_development_7aF9gEqqHqtw48M6QrvwMWkCel1eZ9QvAq2mzFghzKbfms4a4jJ4AzBXHhfdCQLm";
            $XGateway = new XenditPHPClient($option);


            $response = $XGateway->getInvoice($lastTransaction->transaction_token);
            $status = $response['status'];
            // Type 1 transaksi biasa, type 2 transaksi upgrade

            if ($lastTransaction->type == 1) {
                if ($status == "PAID" || $status == "SETTLED") {
                    DB::transaction(function () use ($lastTransaction) {
                        $until = Carbon::parse($lastTransaction->until)->addMonths(12);
                        TransactionsModel::where('transaction_token', '=', $lastTransaction->transaction_token)
                            ->update([
                                'status' => '1',
                                'until' => $until,
                                'updated_at' => Carbon::now()
                            ]);

                        CompaniesModel::where('id_company', '=', auth()->user()->active_session)
                            ->update([
                                'subscribe_until' => $until
                            ]);
                    });
                }
            } else {
                if ($status == 'SETTLED' || $status == 'PAID') {
                    DB::transaction(function () use ($lastTransaction){
                        TransactionsModel::where('transaction_token', '=', $lastTransaction->transaction_token)
                            ->update([
                                'status' => '1',
                                'updated_at' => Carbon::now()
                            ]);

                        $idTransaction = TransactionsModel::where('transaction_token', '=', $lastTransaction->transaction_token)->first();

                        $transSubs = TransactionItemsModel::where('id_s_transaction', '=', $idTransaction->id_s_transaction)
                            ->get();

                        foreach ($transSubs as $item) {
                            CompanySubscribtions::where('companies_subscribtions.id_company', '=', auth()->user()->active_session)
                                ->where('companies_subscribtions.id_srv_attribute', '=', $item->id_s_attribute)
                                ->update([
                                    'size' => $item->size
                                ]);
                        }
                    });
                }
            }
        }
        return $next($request);
    }
}
