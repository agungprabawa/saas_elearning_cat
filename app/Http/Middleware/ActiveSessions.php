<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ActiveSessions
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
        if($user->active_status != $status){
            return redirect('/login');
            
        }
        return $next($request);
    }
}
