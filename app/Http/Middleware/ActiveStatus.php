<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ActiveStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $status)
    {
        // $request->user()
        $user = Auth::user();
        // dd($status);
        $statusRole = explode(' ',$status);
        // dd($statusRole);
        if(!in_array($user->active_status, $statusRole)){
            if($user->active_status == 1){
                return redirect()->route('srv_admin.dashboard');
            }else if($user->active_status == 2){
                return redirect()->route('srv_admin.dashboard');
            }else if($user->active_status == 3){
                return redirect()->route('student.dashboard');
                // return redirect()->route('srv_admin.dashboard');
            }else{
                return redirect()->route('sudo.dashboard');
                return abort(403);
            }
        }
        return $next($request);
    }
}
