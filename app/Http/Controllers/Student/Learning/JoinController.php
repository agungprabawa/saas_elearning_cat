<?php

namespace App\Http\Controllers\Student\Learning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Learning\CoursesModel;
use App\Models\Companies\CompaniesModel;
use App\Models\Learning\CoursesParticipantModel;
use App\Models\User\UserSrvAssosiation;
use App\Models\Companies\CompaniesTransaction;
use App\User;
use XenditClient\XenditPHPClient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class JoinController extends Controller
{
    public function joinCoursesIndex($uuid)
    {
        $courses = CoursesModel::where('uuid', '=', $uuid)
            ->first();

        session()->put('last-url',url()->current());

        $company = CompaniesModel::find($courses->id_company);

        $isFree = true;

        if (auth()->check()) {
            $checkJoin = CoursesParticipantModel::where('id_participant', '=', auth()->user()->id)
                ->where('id_courses', '=', $courses->id_courses)
                ->first();

            if ($checkJoin) {
                User::where('id', '=', auth()->user()->id)
                    ->update([
                        'active_status' => 3,
                        'active_session' => $courses->id_company
                    ]);

                return redirect()->route('student.learning.learning', $courses->uuid);
            } else {

                if($courses->is_share_link == 0){
                    return abort(404);
                }

                if ($courses->is_free == 0) {
                    $isFree = false;
                    // check apakah sudah ada transaksi oleh user untuk kursus ini.
                    $transaction = CompaniesTransaction::where('id_product', '=', $courses->id_courses)
                        ->where('created_by', '=', auth()->user()->id)
                        ->where('type_product', '=', 1)
                        ->where('status','=',0)
                        ->orderBy('created_at','DESC')
                        ->first();

                    if ($transaction) {
                        $status = transactionStatus($transaction->transaction_token);

                        if ($status == 'PENDING') {

                            return redirect($transaction->transaction_url);
                        } else if ($status == 'SETTLED' || $status == 'PAID') {

                            DB::transaction(function () use ($courses, $transaction) {

                                $my = auth()->user();
                                $fixDoubleInsert = CoursesParticipantModel::where('id_participant','=',$my->id)
                                    ->where('id_company','=',$my->active_session)
                                    ->where('id_courses','=',$courses->id_courses)
                                    ->first();

                                if (!$fixDoubleInsert){
                                    CompaniesTransaction::find($transaction->id_c_transaction)
                                        ->update([
                                            'status' => 1
                                        ]);

                                    CoursesParticipantModel::insertOrIgnore([
                                        'id_participant' => auth()->user()->id,
                                        'id_courses' => $courses->id_courses,
                                        'created_by' => auth()->user()->id,
                                        'id_company' => $courses->id_company
                                    ]);
                                }

                            });

                            return redirect()->route('student.learning.learning', $courses->uuid);
                        } else {
                            // Jika expired
                            DB::transaction(function () use ($transaction, $courses) {

                                CompaniesTransaction::find($transaction->id_c_transaction)
                                    ->update([
                                        'status' => -1
                                    ]);
                            });
                        }
                    }
                }
            }
        }else{
            if($courses->is_share_link == 0){
                return abort(404);
            }
        }

        return view('pages.student.join')
            ->with(compact('courses', 'company', 'isFree'));
    }

    public function joinCourses(Request $request, $uuid)
    {
        $courses = CoursesModel::where('uuid', '=', $uuid)->first();

        if (auth()->check()) {

            // check jika private
            if ($courses->company->allow_external_register == 0) {
                // check jika tergabung di lembaga
                $usrCheck = UserSrvAssosiation::where('id_user', '=', auth()->user()->id)
                    ->where('id_company', '=', $courses->id_company)
                    ->first();

                if (!$usrCheck) {
                    return response()->json(['error' => 'is_private', 'uuid' => $courses->uuid, 'data' => $request->all()]);
                }
            }

            // return response()->json(['success'=>'Joined','uuid'=>$courses->uuid,'data'=>$request->all()]);

            // check jika berbayar
            if ($courses->is_free == 0) {

                $transaction = CompaniesTransaction::where('id_product', '=', $courses->id_courses)
                    ->where('created_by', '=', auth()->user()->id)
                    ->where('type_product', '=', 1)
                    ->first();

                if ($transaction) {
                    $status = transactionStatus($transaction->transaction_token);

                    if ($status == 'PENDING') {
                        return response()->json(['success' => 'Invoice Created', 'invoice_url' => $transaction->transaction_url]);
                        // return redirect($transaction->transaction_url);
                    } else if ($status == 'EXPIRED') {
                        // Jika expired
                        $responses = DB::transaction(function () use ($transaction, $courses) {
                            $uuid = Str::orderedUuid();
                            CompaniesTransaction::find($transaction->id_c_transaction)
                                ->update([
                                    'status' => -1
                                ]);

                            $responses = createTransaction($uuid, $courses->courses_price, auth()->user()->email, $courses->title, route('student.learning.join',$courses->uuid));

                            CompaniesTransaction::create([
                                'id_product' => $courses->id_courses,
                                'type_product' => 1,
                                'id_company' => $courses->id_company,
                                'price' => $courses->courses_price,
                                'external_id' => $uuid,
                                'transaction_url' => $responses['invoice_url'],
                                'transaction_token' => $responses['id'],
                                'created_by' => auth()->user()->id,
                                'status' => 0
                            ]);

                            return $responses['invoice_url'];
                        });

                        return response()->json(['success' => 'Invoice Created', 'invoice_url' => $responses]);
                    }
                } else {
                    $uuid = Str::orderedUuid();
                    $responses = createTransaction($uuid, $courses->courses_price, auth()->user()->email, $courses->title, route('student.learning.join',$courses->uuid));

                    CompaniesTransaction::create([
                        'id_product' => $courses->id_courses,
                        'type_product' => 1,
                        'id_company' => $courses->id_company,
                        'price' => $courses->courses_price,
                        'external_id' => $uuid,
                        'transaction_url' => $responses['invoice_url'],
                        'transaction_token' => $responses['id'],
                        'created_by' => auth()->user()->id,
                        'status' => 0,
                    ]);

                    return response()->json(['success' => 'Invoice Created', 'invoice_url' => $responses['invoice_url']]);
                }
            }else{
                // Jika gratis
                User::where('id', '=', auth()->user()->id)
                    ->update([
                        'active_session' => $courses->id_company,
                        'active_status' => 3,
                    ]);

                $participan = CoursesParticipantModel::where('id_participant', '=', auth()->user()->id)
                    ->where('id_courses', '=', $courses->id_courses)
                    ->first();

                if ($participan) {
                    return response()->json(['success' => 'Joined', 'uuid' => $courses->uuid, 'data' => $request->all()]);
                } else {

                    CoursesParticipantModel::insertOrIgnore([
                        'id_participant' => auth()->user()->id,
                        'id_courses' => $courses->id_courses,
                        'created_by' => auth()->user()->id,
                        'id_company' => $courses->id_company
                    ]);
                    return response()->json(['success' => 'Joined', 'uuid' => $courses->uuid, 'data' => $request->all()]);
                }
            }

        } else {
            header('HTTP/1.0 400 Bad error', true, 400);
            exit();
        }
    }

    public function checkTransaction($uuid)
    {
        $transaction = CompaniesTransaction::where('external_id', '=', $uuid)->first();
    }
}
