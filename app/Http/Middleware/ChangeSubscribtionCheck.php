<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\TransactionsModel\TransactionsModel;

class ChangeSubscribtionCheck
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
        $lastTransaction = TransactionsModel::where('status','=',0)
            ->where('type','=',2)
            ->where('id_company','=',auth()->user()->active_session)
            ->first();
            
        if($lastTransaction){
            return redirect()->route('srv_admin.payment.index');
        }else{
            return $next($request);
        }
    }
}
