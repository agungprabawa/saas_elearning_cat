<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Companies\CompanyTypesModel;
use Illuminate\Http\Request;
use App\Models\Companies\CompaniesModel;
use App\Models\Companies\CompanySubscribtions;
use App\User;
use App\Models\User\UserSrvAssosiation;
use App\Models\SrvModel\AttributesModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Auth;
use Illuminate\Support\Facades\DB;

class CompanyRegistrations extends Controller
{

    public function __construct()
    {

    }

    public function index(){
        if(auth()->check()){
            return redirect()->route('service.new');
        }

        $companyType = CompanyTypesModel::all();
        $srvAtributes = AttributesModel::all();

        return view('auth.company.register')
            ->with(compact('companyType','srvAtributes'));
    }

    public function doRegistration(Request $request){


//        $validateData = Validator::make($request->all(),[
//            'company_name' => 'required',
//            'company_type' => 'required',
//            'name' => 'required',
//            'email' => 'required',
//            'password' => 'required|confirmed',
//            'attr-1' => 'required_without:attr-2',
//            'attr-2' => 'required_without:attr-1'
//        ]);

        $request->validate([
            'company_name' => 'required',
            'company_type' => 'required|exists:companies_type,id_type',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
            'attr-1' => 'required_without:attr-2',
            'attr-2' => 'required_without:attr-1',
            'attr-3' => 'required|numeric|min:50',
            'attr-4' => 'required|numeric|min:1'
        ],[
            'required_without' => ':attribute wajib dipilih bila tidak memilih :values.'
        ]);

        $final = DB::transaction(function() use ($request){
            $srvAttr = AttributesModel::all();

            $company = CompaniesModel::create([
                'uuid' => Str::orderedUuid(),
                'company_name' => $request->company_name,
                'company_type' => $request->company_type,
                'address' => $request->company_address,
                'created_by' => 1
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'active_session' => $company->id_company,
                'active_status' => 1
            ]);

            $comUp = CompaniesModel::find($company->id_company);
            $comUp->update([
               'created_by' => $user->id
            ]);

            for($i=1; $i <=3; $i++){
                UserSrvAssosiation::create([
                    'id_user'=>$user->id,
                    'id_company'=>$company->id_company,
                    'status'=> $i,
                ]);
            };

            Storage::disk('public')->makeDirectory($comUp->uuid);

            foreach($srvAttr as $attr){
                $size = ($request->{'attr-'.$attr->id_s_attributes}) ? $request->{'attr-'.$attr->id_s_attributes} : 0;
                CompanySubscribtions::create([
                    'id_company' => $company->id_company,
                    'id_srv_attribute' => $attr->id_s_attributes,
                    'size' => $size
                ]);
            }

            return $user;
        });

        Auth::login($final);
        return redirect()->route('srv_admin.dashboard');
    }

    public function subscribe(){
        $this->middleware('auth');

    }
}
