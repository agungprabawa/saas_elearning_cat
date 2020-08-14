<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\LogModels\GeneralLogsModel;

class GeneralLogs
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $pagename, $type)
    {

        $my = auth()->user();
        GeneralLogsModel::create([
            'page_name' => $pagename,
            'page_type' => $type,
            'access_by' => $my->id,
            'route_name' => $request->route()->getName(),
            'route_parameters' => json_encode($request->route()->parameters()),
            'page_url' => $request->path(),
            'id_company' => $my->active_session
        ]);

        return $next($request);
    }
}
