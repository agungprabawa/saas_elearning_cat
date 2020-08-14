<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Learning\CoursesParticipantModel;
use App\Models\Learning\CoursesModel;

class learningCheck
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
        $cUuid = $request->route()->parameter('uuid');
        $courses = CoursesModel::select('id_courses')->where('uuid','=',$cUuid)->first();

        $isParticipant = CoursesParticipantModel::where('id_participant','=',auth()->user()->id)
            ->where('id_courses','=',$courses->id_courses)->first();
        
        if($isParticipant){
            return $next($request);
        }

        return redirect()->route('student.learning.join',$cUuid);
    }
}
