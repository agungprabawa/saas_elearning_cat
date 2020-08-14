<?php

namespace App\Http\Controllers\Student\AssistedTest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssistedTest\ExamModel;
use App\Models\AssistedTest\ExamParticipantModel;
use App\Models\Companies\CompaniesModel;
use App\Models\User\UserSrvAssosiation;
use App\Models\Companies\CompaniesTransaction;
use App\User;
use XenditClient\XenditPHPClient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JoinController extends Controller
{
    public function joinExamIndex($uuid)
    {
        $exam = ExamModel::where('uuid', '=', $uuid)
            ->first();

        $company = CompaniesModel::find($exam->id_company);
        session()->put('last-url',url()->current());

        $isFree = true;

        // check is auth
        if (auth()->check()) {
            $checkJoin = ExamParticipantModel::where('id_participant', '=', auth()->user()->id)
                ->where('id_exam', '=', $exam->id_exam)
                ->first();

            // if already join, then redirect to exam
            if ($checkJoin) {
                User::where('id', '=', auth()->user()->id)
                    ->update([
                        'active_status' => 3,
                        'active_session' => $exam->id_company
                    ]);

                return redirect()->route('student.assistedtest.all.exams');

            // if not, then
            } else {

                // if not sharable, then abort 404
                if ($exam->is_share_link == 0) {
                    return abort(404);
                }

                // then if paid, check transaction for this user
                if ($exam->is_free == 0) {
                    $isFree = false;
                    // check apakah sudah ada transaksi oleh user untuk kursus ini.
                    $transaction = CompaniesTransaction::where('id_product', '=', $exam->id_exam)
                        ->where('created_by', '=', auth()->user()->id)
                        ->where('type_product', '=', 2)
                        ->where('status', '=', 0)
                        ->orderBy('created_at', 'DESC')
                        ->first();

                    // if transaction is exist, then
                    if ($transaction) {

                        // check status
                        $status = transactionStatus($transaction->transaction_token);

                        // if pending, then redirect to transaction url
                        if ($status == 'PENDING') {

                            return redirect($transaction->transaction_url);

                        // if is paid or transaction done, then save transaction, and add user to exam partition
                        } else if ($status == 'SETTLED' || $status == 'PAID') {

                            DB::transaction(function () use ($exam, $transaction) {

                                $my = auth()->user();
                                $fixDoubleInsert = ExamParticipantModel::where('id_participant','=',$my->id)
                                    ->where('id_company','=',$my->active_session)
                                    ->where('id_exam','=',$exam->id_exam)
                                    ->first();

                                if(!$fixDoubleInsert){
                                    // update transaction status
                                    CompaniesTransaction::find($transaction->id_c_transaction)
                                        ->update([
                                            'status' => 1
                                        ]);

                                    ExamParticipantModel::insertOrIgnore([
                                        'id_participant' => auth()->user()->id,
                                        'id_exam' => $exam->id_exam,
                                        'created_by' => auth()->user()->id,
                                        'id_company' => $exam->id_company
                                    ]);
                                }

                            });

                            return redirect()->route('student.assistedtest.all.exams', $exam->uuid);
                        } else {
                            // if expired, then change status -1
                            DB::transaction(function () use ($transaction, $exam) {

                                CompaniesTransaction::find($transaction->id_c_transaction)
                                    ->update([
                                        'status' => -1
                                    ]);
                            });
                        }
                    }
                }
            }
        } else {
            if ($exam->is_share_link == 0) {
                return abort(404);
            }
        }

        return view('pages.student.assisted_test.join')
            ->with(compact('exam', 'company', 'isFree'));
    }

    public function joinExam(Request $request, $uuid)
    {
        $exam = ExamModel::where('uuid', '=', $uuid)->first();

        if (auth()->check()) {
            if ($exam->is_free == 0) {

                $transaction = CompaniesTransaction::where('id_product', '=', $exam->id_exam)
                    ->where('created_by', '=', auth()->user()->id)
                    ->where('type_product', '=', 2)
                    ->first();

                // If already transaction created, then
                if ($transaction) {
                    $status = transactionStatus($transaction->transaction_token);

                    // if pending, then redirect, if expired then update status, and create new transaction again
                    if ($status == 'PENDING') {
                        return response()->json(['success' => 'Invoice Created', 'invoice_url' => $transaction->transaction_url]);
                        // return redirect($transaction->transaction_url);
                    } else if ($status == 'EXPIRED') {
                        // Jika expired
                        $responses = DB::transaction(function () use ($transaction, $exam) {
                            $uuid = Str::orderedUuid();
                            CompaniesTransaction::find($transaction->id_c_transaction)
                                ->update([
                                    'status' => -1
                                ]);

                            $responses = createTransaction($uuid, $exam->exam_price, auth()->user()->email, $exam->title, route('student.assistedtest.join', $exam->uuid));

                            CompaniesTransaction::create([
                                'id_product' => $exam->id_exam,
                                'id_company' => $exam->id_company,
                                'type_product' => 2,
                                'price' => $exam->exam_price,
                                'external_id' => $uuid,
                                'transaction_url' => $responses['invoice_url'],
                                'transaction_token' => $responses['id'],
                                'created_by' => auth()->user()->id,
                                'status' => 0,
                            ]);

                            return $responses['invoice_url'];
                        });

                        return response()->json(['success' => 'Invoice Created', 'invoice_url' => $responses]);
                    }

                // If not exist, then create transaction
                } else {
                    $uuid = Str::orderedUuid();
                    $responses = createTransaction($uuid, $exam->exam_price, auth()->user()->email, $exam->title, route('student.assistedtest.join', $exam->uuid));

                    CompaniesTransaction::create([
                        'id_product' => $exam->id_exam,
                        'id_company' => $exam->id_company,
                        'type_product' => 2,
                        'price' => $exam->exam_price,
                        'external_id' => $uuid,
                        'transaction_url' => $responses['invoice_url'],
                        'transaction_token' => $responses['id'],
                        'created_by' => auth()->user()->id,
                        'status' => 0,
                    ]);

                    return response()->json(['success' => 'Invoice Created', 'invoice_url' => $responses['invoice_url']]);
                }
            } else {
                // if free
                User::where('id', '=', auth()->user()->id)
                    ->update([
                        'active_session' => $exam->id_company,
                        'active_status' => 3,
                    ]);

                $participan = ExamParticipantModel::where('id_participant', '=', auth()->user()->id)
                    ->where('id_exam', '=', $exam->id_exam)
                    ->first();

                if ($participan) {
                    return response()->json(['success' => 'Joined', 'uuid' => $exam->uuid, 'data' => $request->all()]);
                } else {

                    ExamParticipantModel::create([
                        'id_participant' => auth()->user()->id,
                        'id_exam' => $exam->id_exam,
                        'created_by' => auth()->user()->id,
                        'id_company' => $exam->id_company
                    ]);
                    return response()->json(['success' => 'Joined', 'uuid' => $exam->uuid, 'data' => $request->all()]);
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
