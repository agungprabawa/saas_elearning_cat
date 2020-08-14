<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SudoAuthController extends Controller
{
    public function loginIndex()
    {
        // auth()->logout();
        return view('auth.administratorlayanan');
    }

    public function doLogin(Request $request)
    {
        $validateDate = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validateDate->passes()){
            $user = User::where('email','=',$request->email)
                ->where('active_session','=',-1)
                ->where('active_status', '=', -1)
                ->first();
            if(!$user){
                return redirect()->back()->withInput()->withErrors(['email'=>'Informasi akun tidak tersedia pada layanan']);
            }else{
                Auth::login($user,true);
                // return auth()->user()->username;
                return redirect()->route('sudo.dashboard');
            }
        }
    }
}
