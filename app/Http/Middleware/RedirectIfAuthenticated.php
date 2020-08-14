<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $my = auth()->user();
        if (Auth::guard($guard)->check()) {
            if($my->active_status == 1){
                return redirect()->route('srv_admin.dashboard');
            }elseif($my->active_status == 2){
                // return redirect('/learning');
                return redirect()->route('srv_admin.dashboard');
            }else if($my->active_status == 3){
                return redirect()->route('student.dashboard');
            }else{
                // return 'you are sudo';
                return redirect()->route('sudo.dashboard');
            }
        }

        return $next($request);
    }
}
