<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Companies\CompaniesModel;
use App\Models\User\UserSrvAssosiation;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function regIndex($uuid)
    {
        $company = CompaniesModel::where('uuid','=',$uuid)->first();
        $registerFirst = true;


        if(auth()->check()){
            $userAsos = UserSrvAssosiation::where('id_user','=',auth()->user()->id)
                ->where('id_company','=',$company->id_company)
                ->first();

            if($userAsos){
                return redirect()->route('switch.session',$company->uuid);
            }
            $registerFirst = false;
        }

        if(!$company){
            return abort(404);
        }

        return view('pages.student.register')
            ->with(compact('company','registerFirst'));
    }

    public function loginIndex($uuid)
    {
        $company = CompaniesModel::where('uuid','=',$uuid)->first();
        $registerFirst = true;

        if(auth()->check()){
            $userAsos = UserSrvAssosiation::where('id_user','=',auth()->user()->id)
                ->where('id_company','=',$company->id_company)
                ->first();

            if($userAsos){
                return redirect()->route('switch.session',$company->uuid);
            }
            $registerFirst = false;
        }

        if(!$company){
            return abort(404);
        }

        return view('pages.student.login')
            ->with(compact('company','registerFirst'));
    }

    public function register(Request $request, $uuid)
    {
        $company = CompaniesModel::where('uuid','=',$uuid)->first();

        if($company->allow_external_register == 0){
            header('HTTP/1.0 400 Bad error',true,400);
            exit();
        }

        if($company){
            $validateData = Validator::make($request->all(),[
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'username' => ['required', 'string', 'max:20', 'unique:users']
            ]);

            if($validateData->passes()){
                $user = DB::transaction(function() use ($request,$company){
                    $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'username' => $request->username,
                        'password' => Hash::make($request->password),
                        'active_status' => 3,
                        'active_session' => $company->id_company
                    ]);

                    $userAsos = UserSrvAssosiation::create([
                        'id_user' => $user->id,
                        'id_company' => $company->id_company,
                        'status' => 3,
                    ]);

                    return $user;

                });

                Auth::login($user);

                $next = route('switch.to',3);

                if(\session()->has('last-url')){
                    $next = session()->get('last-url');
                }

                return response()->json(['success'=>'Saved','uuid'=>$uuid,'data'=>$request->all(),'company_uuid'=>$company->uuid, 'next'=>$next]);
            }
            return response()->json(['error'=>$validateData->errors()->getMessages(),'data'=>$request->all()]);
            // return redirect()->route('switch.session',$uuid);
        }
        return response()->json(['error'=>null,'data'=>$request->all()]);
    }

    public function login(Request $request, $uuid)
    {

        // $validateData = Validator::make($request->all(),[
        //     'email' => 'required|string',
        //     'password' => 'required|string',
        // ]);
        $company = CompaniesModel::where('uuid','=',$uuid)->first();

        if($company){
            if(Auth::attempt(array('email'=>$request->email,'password'=>$request->password),true)){
                // Auth::login($user);
                // return redirect()->route('switch.session',$uuid);
                $next = route('switch.to',3);

                if(\session()->has('last-url')){
                    $next = session()->get('last-url');
                }

                return response()->json(['success'=>'Saved','uuid'=>$uuid,'data'=>$request->all(),'company_uuid'=>$company->uuid, 'next'=>$next]);
            }else{
                return response()->json(['error'=>'invalid','data'=>$request->all()]);
                // return redirect()->back();
            }
        }else{
            header('HTTP/1.0 400 Bad error',true,400);
            exit();
        }

    }
}
