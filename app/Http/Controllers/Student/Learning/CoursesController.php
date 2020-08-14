<?php

namespace App\Http\Controllers\Student\Learning;

use App\Http\Controllers\Controller;
use App\Models\OtherData\CategoriesModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Learning\CoursesModel;
use App\Models\Companies\CompaniesModel;
use App\Models\Learning\CoursesParticipantModel;
use App\Models\Learning\TeachMaterialsModel;
use App\Models\LogModels\CoursesLogModel;
use Illuminate\Support\Str;


class CoursesController extends Controller
{
    public function __construct(Request $request)
    {
        $courses_uuid = $request->route()->parameters()['uuid'] ?? null;
        if($courses_uuid !== null){
            $courses = CoursesModel::select('is_deleted','start_date')->where('uuid','=',$courses_uuid)->first();
            if($courses->is_deleted == 1) {
                return abort(404);
            }
//            dd(Carbon::parse($courses->start_date)->gt(Carbon::now()));
            if(Carbon::parse($courses->start_date)->gt(Carbon::now())){
                redirect()->route('student.learning.all.learning')->send();
            }
        }
    }

    public function index()
    {
        return null;
    }

    public function leangings(Request $request)
    {

        if($request->title && empty($request->category)) {
            $courses = CoursesModel::join('courses_participant', 'courses.id_courses', '=', 'courses_participant.id_courses')
                ->where('id_participant', '=', auth()->user()->id)
                ->where('title', 'like', '%' . $request->title . '%')
                ->where('is_deleted', '=', 0)
                ->groupBy('courses.id_courses')
                ->paginate(6);
            $courses->appends(['title' => $request->title]);
        }else if($request->category && empty($request->title)){
            $category = CategoriesModel::where('category','=',$request->category)->first();

            $courses = CoursesModel::join('courses_participant', 'courses.id_courses', '=', 'courses_participant.id_courses')
                ->where('id_participant', '=', auth()->user()->id)
                ->where('category','=',$category->id_category ?? 0)
                ->where('is_deleted', '=', 0)
                ->groupBy('courses.id_courses')
                ->paginate(6);
            $courses->appends(['category' => $request->category]);
        }else{
            $courses = CoursesModel::join('courses_participant','courses.id_courses','=','courses_participant.id_courses')
                ->where('id_participant','=',auth()->user()->id)
                ->where('is_deleted','=',0)
                ->groupBy('courses.id_courses')
                ->paginate(6);
        }


        // dd($courses);
        $nav = [
            'menu' => 'learning',
            'submenu' => 'manage',
            'widgetmenu' => 'informations',
        ];

        return view('pages.student.learning.learning')
            ->with(compact('nav','courses'));
    }

    public function learning($uuid)
    {
        $courses = CoursesModel::where('uuid','=',$uuid)->first();

        $nav = [
            'menu' => '',
            'submenu' => '',
            'widgetmenu' => '',
        ];

        if($courses){
            $uuid = Str::orderedUuid();
            $log = CoursesLogModel::create([
                'uuid' => $uuid,
                'id_company' => auth()->user()->active_session,
                'id_participant' => auth()->user()->id,
                'id_courses' => $courses->id_courses,
                'id_materials' => 0,
            ]);
        }

        return view('pages.student.learning.learning-overview')
            ->with(compact('nav','courses','log'));
    }

    public function learningTeach($uuid, $location)
    {
        $courses = CoursesModel::where('uuid','=',$uuid)->first();
        $courses_teach = $courses->teachMaterials()->where('location','=',$location)->first();

        if($courses && $courses_teach){
            $uuid = Str::orderedUuid();
            $log = CoursesLogModel::create([
                'uuid' => $uuid,
                'id_company' => auth()->user()->active_session,
                'id_participant' => auth()->user()->id,
                'id_courses' => $courses->id_courses,
                'id_materials' => $courses_teach->id_tech_material,
            ]);
        }

        $nav = [
            'menu' => '',
            'submenu' => '',
            'widgetmenu' => '',
        ];

        return view('pages.student.learning.teach-materials')
            ->with(compact('nav','courses','courses_teach','log'));
    }

    public function logUpdate(Request $request)
    {
        $log = CoursesLogModel::where('uuid','=',$request->uuid)->first();

        if($log){
            CoursesLogModel::where('uuid','=',$request->uuid)->update([
                'total_access_time' => $request->total_access_time,
            ]);
        }

        return response()->json($request->all());
    }
}
