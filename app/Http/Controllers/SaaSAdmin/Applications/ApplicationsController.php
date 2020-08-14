<?php

namespace App\Http\Controllers\SaaSAdmin\Applications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SrvModel\AttributesModel;
use Illuminate\Support\Facades\Validator;

class ApplicationsController extends Controller
{
    public function appList()
    {
        $apps = AttributesModel::orderBy('id_s_attributes','ASC')->get();

        $nav = [
            'menu' => 'applications',
            'submenu' => ''
        ];

        return view('pages.saas_admin.applications.list')
            ->with(compact('nav','apps'));
    }

    public function appDetails($id)
    {
        $app = AttributesModel::find($id);

        $nav = [
            'menu' => 'applications',
            'submenu' => ''
        ];

        return view('pages.saas_admin.applications.apps_single')
            ->with(compact('nav','app'));

    }

    public function appDetailsUpdate(Request $request, $id)
    {
        $validateData = Validator::make($request->all(),[
            'label'=>'required|string|max:100',
            'content'=>'required|string',
            'price'=>'required|numeric|min:0'
        ]);

        if($validateData->passes()){
            $apps = AttributesModel::find($id);
            $apps->update([
                'label'=>$request->label,
                'desciptions'=> $request->content,
                'price'=>$request->price,
            ]);

            return response()->json(['success'=>$apps]);
        }

        return response()->json(['error'=>$validateData->errors()->getMessages()]);
    }
}
