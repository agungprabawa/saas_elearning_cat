<?php

namespace App\Http\Controllers\SrvAdmin\OtherDataController;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\OtherData\CategoriesModel;

class CategoryController extends Controller
{
    public function list(){
        $nav = [
            'menu' => 'other-data',
            'submenu' => 'category'
        ];

        return view('pages.srv_admin.other_data.category.list')
            ->with(compact('nav'));
    }

    public function listJson(){
        $my = auth()->user();

        $queryString =
            'SELECT
                *
            FROM l_e_categories
            WHERE id_company = :id_company AND is_deleted = 0';
        $queryBindings = [
            'id_company' => $my->active_session
        ];

        $categoryQuery = DB::select($queryString,$queryBindings);

        return datatables()->of($categoryQuery)->toJson();
    }

    public function store(Request $request){
        $valdateData = Validator::make($request->all(),[
            'category_name' => 'required'
        ]);

        if ($valdateData->passes()){
            $my = auth()->user();
            $category = CategoriesModel::create([
                'category' => $request->category_name,
                'descriptions' => $request->descriptions,
                'id_company' => $my->active_session,
                'created_by' => $my->id
            ]);

            return response()->json(['success'=>$request->all()]);
        }

        return response()->json(['error'=>$valdateData->errors()->getMessages()]);
    }

    public function getJson($id_category){

    }

    public function update(Request $request,$id_category){
        $valdateData = Validator::make($request->all(),[
            'category_name' => 'required'
        ]);

        if ($valdateData->passes()){
            $my = auth()->user();
            $category = CategoriesModel::where('id_category','=',$id_category)
                ->where('id_company','=',$my->active_session)
                ->first();

            $category->update([
                'category' => $request->category_name,
                'descriptions' => $request->descriptions,
                'updated_by' => $my->id,
                'updated_at' => Carbon::now(),
            ]);

            return response()->json(['success'=>$request->all()]);
        }

        return response()->json(['error'=>$valdateData->errors()->getMessages()]);
    }

    public function delete(Request $request,$id_category){
        $my = auth()->user();
        $category = CategoriesModel::where('id_category','=',$id_category)
            ->where('id_company','=',$my->active_session)
            ->first();

        $category->update([
            'deleted_at' => Carbon::now(),
            'deleted_by' => $my->id,
            'is_deleted' => 1,
        ]);

        return response()->json(['success'=>$request->all()]);
    }
}
