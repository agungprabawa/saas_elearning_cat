<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $this->authenticate($request, $guards);

        if (auth()->user()->active_status != -1){
            $ignoredRouteList = [
                'srv_admin.dashboard',
                'srv_admin.subscribtions.storage.usage',
                'switch.to',
                'switch.session',
                'switch.manage',
                'general.announcement.all',
                'general.announcement.read',
                'service.new',
                'service.create',
                'user.profile',
                'change.password',
                'assosiated',
                'add.service',
                'my.transactions',
                'my.services.transactions',
                'transactions.json',
                'transactions.services.json',
                'profile.update',
                'change.password.do'
            ];

            if
            (
                !in_array($request->route()->getName(),$ignoredRouteList) &&
                auth()->user()->company->service_status != 0
            )
            {
                return redirect()->route('srv_admin.dashboard');
            }
        }

        return $next($request);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }

    }
}
