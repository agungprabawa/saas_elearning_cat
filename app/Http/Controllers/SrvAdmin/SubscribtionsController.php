<?php

namespace App\Http\Controllers\SrvAdmin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\User\UserSrvAssosiation;
use App\User;
use Illuminate\Http\Request;
use App\Models\Companies\CompaniesModel;
use App\Models\Companies\CompanySubscribtions;
use App\Models\TransactionsModel\TransactionsModel;
use App\Models\TransactionsModel\TransactionItemsModel;
use App\Models\SrvModel\AttributesModel;
use Carbon\Carbon;
use XenditClient\XenditPHPClient;
use Illuminate\Support\Facades\DB;

class SubscribtionsController extends Controller
{
    // SHOULD PAY KET. 1 - TRANSACTION NEEDED, 2 - FIRST TRANSACTION

    public function index()
    {
        $isActiveUpgradePayment = false;
        $curentSubs = CompanySubscribtions::join('srv_attributes', 'srv_attributes.id_s_attributes', '=', 'id_srv_attribute')
            ->where('companies_subscribtions.id_company', '=', auth()->user()->active_session)
            ->get();

        $until_ = CompaniesModel::select('subscribe_until')->where('id_company', '=', auth()->user()->active_session)->first();


        if ($until_) {
            if (Carbon::parse($until_->subscribe_until)->subMonth(2) > Carbon::now()) {
                $until = Carbon::parse($until_->subscribe_until)->format('d F Y');
            } else {
                $until = 'Transaction Needed ';
            }
        } else {
            $until = 'First Transaction';
        }

        $checkIsActiveUpgradePayment = TransactionsModel::where('status', '=', 0)
            ->where('type', '=', 2)
            ->where('id_company', '=', auth()->user()->active_session)
            ->first();

        if ($checkIsActiveUpgradePayment) {
            $isActiveUpgradePayment = true;
        }

        $currentUsers = UserSrvAssosiation::select('id_user')
            ->where('id_company', '=', auth()->user()->active_session)
            ->distinct('id_user')
            ->count('id_user');


        $nav = [
            'menu' => 'subscribtion',
            'submenu' => ''
        ];

        return view('pages.srv_admin.subscribtions.subscribtions')
            ->with(compact('curentSubs', 'until', 'currentUsers', 'isActiveUpgradePayment', 'nav'));
    }

    public function changeSubscription()
    {

        $curentSubs = CompanySubscribtions::join('srv_attributes', 'srv_attributes.id_s_attributes', '=', 'id_srv_attribute')
            ->where('companies_subscribtions.id_company', '=', auth()->user()->active_session)
            ->get();

        // $until_ = TransactionsModel::select('until')->where('id_company', '=', auth()->user()->active_session)
        //     ->orderBy('until', 'DESC')
        //     ->first();


        // // return Carbon::parse($until_->until)->diffInDays(Carbon::now());

        // $until = Carbon::parse($until_->until)->format('d F Y');

        $currentUsers = UserSrvAssosiation::select('id_user')
            ->where('id_company', '=', auth()->user()->active_session)
            ->distinct('id_user')
            ->count('id_user');

        $nav = [
            'menu' => 'subscribtion',
            'submenu' => ''
        ];
        return view('pages.srv_admin.subscribtions.change-subscribtions')
            ->with(compact('curentSubs', 'currentUsers', 'nav'));
    }

    public function saveChanges(Request $request)
    {
        $attr3Min=50;
        $attr4Min=1;

        $company = CompaniesModel::find(auth()->user()->active_session);
        if ($company->usersCount()){
            $attr3Min = $company->usersCount();
        }

        if ($this->storageGB() > 1){
            $attr4Min=$this->storageGB();
        }

        $this->validate($request, [
            'attr-3' => "required|numeric|min:$attr3Min",
            'attr-4' => "required|numeric|min:$attr4Min"
        ]);

        $type = "";
        // return $request->{'attr-1'};

        $transactionUrl = DB::transaction(function () use ($request,&$type) {
            $option['secret_api_key'] = "xnd_development_7aF9gEqqHqtw48M6QrvwMWkCel1eZ9QvAq2mzFghzKbfms4a4jJ4AzBXHhfdCQLm";
            $XGateway = new XenditPHPClient($option);
            $uuid = Str::orderedUuid();

            $attr = AttributesModel::all();

            // $until_ = TransactionsModel::select('until')->where('id_company', '=', auth()->user()->active_session)
            //     ->where('status','=',1)
            //     ->where('type','=',1)
            //     ->orderBy('until', 'DESC')
            //     ->first();
            $until_ = CompaniesModel::select('subscribe_until')->where('id_company', '=', auth()->user()->active_session)->first();

            $curentSubs = CompanySubscribtions::select('srv_attributes.id_s_attributes', 'size', 'price')
                ->join('srv_attributes', 'srv_attributes.id_s_attributes', '=', 'id_srv_attribute')
                ->where('companies_subscribtions.id_company', '=', auth()->user()->active_session)
                ->get();


            // Check transaksi pertama atau bukan
            if ($until_->subscribe_until) {
                $intDiff = Carbon::parse($until_->subscribe_until)->diffInDays(Carbon::now());

                $totalAmount = 0;
                $ammnt = array();
                $isUpgrade = false;
                // $whatChanges = '';
                foreach ($attr as $item) {
                    //check jika value kosong
                    if ($request->{'attr-' . $item->id_s_attributes}) {
                        // check jika size yg diminta lebih besar dari size awal
                        if ($request->{'attr-' . $item->id_s_attributes} > $curentSubs[$item->id_s_attributes - 1]->size) {

                            // Mendapatkan jumalah item yang ditambahkan
                            $itemSizeDiff = $request->{'attr-' . $item->id_s_attributes} - $curentSubs[$item->id_s_attributes - 1]->size;
                            // Mendapatkan harga item per 1 hari
//                            $tmp_per_1_day_price = $item->price / 365;
                            // Mendapatkan harga final, harga per 1 hari x Sisa hari
                            // $finPrice = $tmp_per_1_day_price * $intDiff;
//                            $finPrice = $item->price * $itemSizeDiff;
                            // simpan harga per item ke array
                            array_push($ammnt, $item->price * $itemSizeDiff);

                            $totalAmount += ($item->price * $itemSizeDiff);

                            // $whatChanges .= $item->id_s_attributes;
                            $isUpgrade = true;
                        } else {
                            array_push($ammnt, 0);
                        }
                    } else {
                        array_push($ammnt, 0);
                    }
                }

                if ($totalAmount <= 10000) {
                    $totalAmount = 10000;
                }

                if ($isUpgrade) {

                    $lastUnfinishedUpgrade = TransactionsModel::where('id_company', '=', auth()->user()->active_session)
                        ->where('type', '=', 2)
                        ->where('status', '=', 0)
                        ->orderBy('created_at', 'DESC')
                        ->first();

                    if ($lastUnfinishedUpgrade) {
                        TransactionsModel::where('id_s_transaction', '=', $lastUnfinishedUpgrade->id_s_transaction)
                            ->update(['status' => 2]);

                        $XGateway->expireInvoice($lastUnfinishedUpgrade->transaction_token);
                    }

                    $external_id = $uuid;
                    $amount = $totalAmount;
                    $payer_email = auth()->user()->email;
                    $description = 'Pembayaran layanan E-learning dan Computer Assisted Test';
                    $success_redirect_url = route('srv_admin.payment.upgrade.validate', [$external_id]);

                    $response = $XGateway->createInvoice($external_id, $amount, $payer_email, $description, $success_redirect_url);

                    $transaction =  TransactionsModel::create([
                        'id_company' => auth()->user()->active_session,
                        'id_user' => auth()->user()->id,
                        'transaction_url' => $response['invoice_url'],
                        'transaction_token' => $response['id'],
                        'external_id' => $external_id,
                        'total_price' => $amount,
                        'type' => 2
                    ]);

                    for ($i = 1; $i <= 4; $i++) {
                        $size = 0;

                        if ($request->{'attr-' . $i}) {
                            $size = $request->{'attr-' . $i};
                        }
                        TransactionItemsModel::create([
                            'id_s_transaction' => $transaction->id_s_transaction,
                            'id_s_attribute' => $i,
                            'size' => $size,
                            'total_price' => $ammnt[$i - 1]
                        ]);
                    }
                    $type = "upgrade";
                    return $response['invoice_url'];
                    // return redirect()->route('srv_admin.payment.index');
                } else {
                    for ($i = 1; $i <= 4; $i++) {
                        $size = 0;
                        if ($request->{'attr-' . $i}) {
                            $size = $request->{'attr-' . $i};
                        }

                        CompanySubscribtions::where('companies_subscribtions.id_company', '=', auth()->user()->active_session)
                            ->where('companies_subscribtions.id_srv_attribute', '=', $i)
                            ->update([
                                'size' => $size
                            ]);
                    }
                    $type = "downgrade";
                    return route('srv_admin.subscribtions.index');
                }
            } else {
                // FIRST TRANSACTION
                for ($i = 1; $i <= 4; $i++) {
                    $size = 0;
                    if ($request->{'attr-' . $i}) {
                        $size = $request->{'attr-' . $i};
                    }

                    CompanySubscribtions::where('companies_subscribtions.id_company', '=', auth()->user()->active_session)
                        ->where('companies_subscribtions.id_srv_attribute', '=', $i)
                        ->update([
                            'size' => $size
                        ]);
                }
                $type = "first";
                return route('srv_admin.payment.index');
            }
        });

        return response()->json([
            'success'=>$type, 'url'=>$transactionUrl,
        ]);
        // return redirect($transactionUrl);
    }

    public function oldsaveChanges(Request $request)
    {
        $this->validate($request, [
            'attr-3' => 'required|numeric|min:50',
            'attr-4' => 'required|numeric|min:1'
        ]);

        for ($i = 1; $i <= 4; $i++) {
            $size = 0;
            if ($request->{'attr-' . $i}) {
                if ($request->{'attr-' . $i} == 'on') {
                    $size = 1;
                } else {
                    $size = $request->{'attr-' . $i};
                }
            }

            CompanySubscribtions::where('companies_subscribtions.id_company', '=', auth()->user()->active_session)
                ->where('companies_subscribtions.id_srv_attribute', '=', $i)
                ->update([
                    'size' => $size
                ]);
        }

        return redirect()->route('srv_admin.subscribtions.index')
            ->with('status', '1');
    }

    public function storageUsage()
    {
        $currentSubsSize = CompanySubscribtions::select('size')->where('id_company', '=', auth()->user()->active_session)
            ->where('id_srv_attribute', '=', 4)
            ->first();

        $path = storage_path('app/public/' . auth()->user()->company->uuid);
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

    public function storageGB(){
        $currentSubsSize = CompanySubscribtions::select('size')->where('id_company', '=', auth()->user()->active_session)
            ->where('id_srv_attribute', '=', 4)
            ->first();

        $path = storage_path('app/public/' . auth()->user()->company->uuid);
        $sizeByte = folderSize($path);
        $gbSize = number_format($sizeByte / 1073741824, 5);

        return $gbSize;
    }
}
