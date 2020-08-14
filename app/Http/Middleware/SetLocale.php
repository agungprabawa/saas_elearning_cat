<?php

namespace App\Http\Middleware;

use Closure;
use App;

class SetLocale
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
        if(auth()->check()){
            App::setlocale(explode('_',auth()->user()->lang)[0]);
        }else{
            App::setlocale('id');
        }
        return $next($request);
    }
}
