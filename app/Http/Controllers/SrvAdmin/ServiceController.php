<?php

namespace App\Http\Controllers\SrvAdmin;

use App\Http\Controllers\Controller;
use App\Models\Companies\CompaniesModel;
use App\Models\Companies\CompanySubscribtions;
use App\Models\User\UserSrvAssosiation;
use Illuminate\Http\Request;
use App\Models\SrvModel\AttributesModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    public function addService()
    {

        $attibutes = AttributesModel::get();

        $nav = [
            'menu' => '',
            'submenu' => '',
            'widgetmenu' => 'services'
        ];

        return view('pages.profile.pages.add_service')
            ->with(compact('nav','attibutes'));
    }

    public function storeCompany(Request $request){

        $validateData = Validator::make($request->all(),[
            'company_name'=>'required|string|max:100',
            'company_type'=> ['required',
                    Rule::in([0,1,2,3,4,5])       
            ],
            'logo' => 'image|mimes:jpeg,png,jpg|max:2048',
            'elearning' => 'required_without:assistedtest',
            'assistedtest' => 'required_without:elearning',
            'user_capacity' => 'required|numeric|min:50',
            'storage_capacity' => 'required|numeric:min:1',
        ],[
            'required_without' => ':attribute wajib dipilih bila tidak memilih :values.',
        ]);

        if($validateData->passes()){
            $company = DB::transaction(function() use ($request){
                $uuid = Str::orderedUuid();
                $company = CompaniesModel::create([
                    'uuid' => $uuid,
                    'company_name' => $request->company_name,
                    'company_type' => $request->company_type,
                ]);

                $subscribtions = CompanySubscribtions::insert([
                    [
                        'id_company' => $company->id_company, 
                        'id_srv_attribute' => 1,
                        'size' => $request->elearning ?? 0,
                    ],
                    [
                        'id_company' => $company->id_company, 
                        'id_srv_attribute' => 2,
                        'size' => $request->assistedtest ?? 0,
                    ],
                    [
                        'id_company' => $company->id_company, 
                        'id_srv_attribute' => 3,
                        'size' => $request->user_capacity ?? 50,
                    ],
                    [
                        'id_company' => $company->id_company, 
                        'id_srv_attribute' => 4,
                        'size' => $request->storage_capacity ?? 1,
                    ],
                ]);

                $user = UserSrvAssosiation::insert([
                    [
                        'id_user' => auth()->id(),
                        'id_company' => $company->id_company,
                        'status' => 1,
                    ],
                    [
                        'id_user' => auth()->id(),
                        'id_company' => $company->id_company,
                        'status' => 2,
                    ],
                    [
                        'id_user' => auth()->id(),
                        'id_company' => $company->id_company,
                        'status' => 3,
                    ]

                ]);
                $path = public_path().'/storage/'.$uuid;
                File::makeDirectory($path);
                
                return $company;
            });

            return response()->json(['success'=>$company]);
        }

        return response()->json(['error'=>$validateData->errors()->getMessages()]);
    }
}
