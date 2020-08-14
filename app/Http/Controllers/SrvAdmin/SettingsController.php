<?php

namespace App\Http\Controllers\SrvAdmin;

use App\Http\Controllers\Controller;
use App\Models\Companies\CompaniesModel;
use App\Models\Companies\CompanyTypesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function index()
    {
        $company = CompaniesModel::find(auth()->user()->active_session);
        $company_type = CompanyTypesModel::all();

        $nav = [
            'menu' => 'subscribtion',
            'submenu' => ''
        ];
        return view('pages.srv_admin.settings.settings')
            ->with(compact('nav', 'company', 'company_type'));
    }

    public function update(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'company_name' => 'required|string|max:100',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validateData->passes()) {

            $dataForm = [
                'company_name'=>$request->company_name,
                'company_type'=>$request->company_type,
                'descriptions'=>$request->descriptions,
                'emails'=>$request->emails,
                'phones'=>$request->phones,
                'country'=>$request->country,
                'address'=>$request->address,
                'allow_external_register' => ($request->allow_external_register) ? 1 : 0,
            ];

            if($request->logo){
                $ext = $request->logo->getClientOriginalExtension();
                $request->logo->move(public_path('storage/' . auth()->user()->company->uuid . '/file/1/'), 'logo.' . $ext);
                $logourl = asset('storage/' . auth()->user()->company->uuid . '/file/1/logo.' . $ext);

                $dataForm['logo_url'] = $logourl;
            }

            CompaniesModel::where('uuid', '=', auth()->user()->company->uuid)
                ->update($dataForm);
        }
        return response()->json(['error' => $validateData->errors()->getMessages()]);
    }
}
