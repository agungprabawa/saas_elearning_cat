<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Companies\CompaniesModel;
use App\Models\TransactionsModel\TransactionsModel;
use Carbon\Carbon;

class SubscribeCheck
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
        $subscribtion = auth()->user()->company->subscribe_until;
        // if($subscribtion == null){
        //     $routeName = $request->route()->getRouteName();
        //     if($routeName != 'srv_admin.subscribtions.index' || $routeName != 'srv_admin.subscribtions.change.subs.check' || $routeName != '')
        // }

        if($subscribtion == null || Carbon::parse($subscribtion) < Carbon::now()){
            return redirect()->route('srv_admin.payment.index');
        }

        return $next($request);
    }
}
