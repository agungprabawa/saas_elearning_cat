<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\User\UserSrvAssosiation;
use App\Models\Companies\CompaniesModel;
use Illuminate\Support\Facades\Auth;

class SwitchStatusController extends Controller
{
    public function __construct(Request $request)
    {

    }

    public function switchStatus($type)
    {
        $status = UserSrvAssosiation::where('id_user','=',auth()->user()->id)
            ->where('id_company','=',auth()->user()->company->id_company)
            ->get()->pluck('status')->toArray();

        // return auth()->user()->id;
        // return var_dump(auth()->user()->companies());
        if(in_array($type,$status)){
            User::where('id','=',auth()->user()->id)
                ->update([
                    'active_status' => $type
                ]);
            return redirect('/login');
        }

        // return in_array(,$status) ? 1 : 0;
        return redirect()->back();
    }

    public function switchSession($uuid)
    {
        $company = CompaniesModel::where('uuid','=',$uuid)->first();
        $userAsossasion = UserSrvAssosiation::where('id_company','=',$company->id_company)
            ->where('id_user','=',Auth::user()->id)
            ->first();

        if($userAsossasion){

            $findStatus = $userAsossasion->where('status','=',Auth::user()->active_status)
                ->where('id_user','=',Auth::user()->id)
                ->where('id_company','=',$company->id_company)
                ->get('status')->toArray();

            if ($findStatus == ''){
                User::where('id','=',Auth::user()->id)
                    ->update([
                        'active_session' => $company->id_company,
                        'active_status' => 3
                    ]);
            }else{
                User::where('id','=',Auth::user()->id)
                    ->update([
                        'active_session' => $company->id_company,
                        'active_status' => Auth::user()->active_status
                    ]);
            }

            return redirect('/login');
        }else{
            return "not found";
        }
    }

    public function switchAndManage($uuid)
    {
       $owner = auth()->user()->ownerOf($uuid);

       if($owner === false){
            return abort(404);
       }else{
            $user = User::find(auth()->id());
            $user->update([
                'active_session' => $owner->id_company,
                'active_status' => 1
            ]);

            return redirect()->route('srv_admin.subscribtions.index');
       }
    }
}
