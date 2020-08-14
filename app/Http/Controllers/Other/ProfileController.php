<?php

namespace App\Http\Controllers\Other;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\SrvModel\AttributesModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        
        $profile = auth()->user();

        $nav = [
            'menu' => '',
            'submenu' => '',
            'widgetmenu' => 'information'
        ];

        return view('pages.profile.pages.informations')
            ->with(compact('nav','profile'));
    }

    public function changePassword()
    {
        $profile = auth()->user();

        $nav = [
            'menu' => '',
            'submenu' => '',
            'widgetmenu' => 'change-password'
        ];

        return view('pages.profile.pages.change_password')
            ->with(compact('nav','profile'));
    }

    public function changePasswordDo(Request $request)
    {
        $messages = [
            'required' => 'Password harus diisi',
            'string' => 'Password harus berupa teks',
            'min' => 'Panjang password minimal 8 karakter',
            'same' => 'Konfirmasi password harus sama dengan password baru',
        ];
        $validateData = Validator::make($request->all(),[
            'new_password' => 'required|string|min:8',
            're_password' => 'required|same:new_password'
        ],$messages);

        if($validateData->passes()){
            $user = auth()->user();
            if(Hash::check($request->password,$user->password)){
                $user->password = Hash::make($request->new_password);
                $user->save();

                return response()->json(['success'=>'1']);
            }
            return response()->json(['error'=>'1']);
        }
        return response()->json(['error'=>$validateData->errors()->getMessages()]);
    }

    public function updateProfile(Request $request)
    {

        $validateData = Validator::make($request->all(),[
            'name'=>'required',
            'username' => ['required','alpha_num',
                Rule::unique('users','username')->ignore(auth()->id())    
            ],
            'email' => ['required',
                Rule::unique('users','username')->ignore(auth()->id())
            ],
            'phone_number' => 'numeric',
            'profile_avatar' => 'image|max:900',
        ]);

        if(!$validateData->passes()){
            return response()->json(['error'=>$validateData->errors()->getMessages()]);
        }

        $user = User::find(auth()->id());
        $dataForm = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'bio' => $request->bio,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'update_at' => Carbon::now(),
        ];

        if($request->profile_avatar){
            $ext = $request->profile_avatar->getClientOriginalExtension();
            $request->profile_avatar->move(public_path('storage/profile/'.$user->id), 'profilepicture.' . $ext);
            $logourl = asset('storage/profile/'.$user->id.'/profilepicture.' . $ext);
            $dataForm['cover_img'] = $logourl;
            // return 'dwad';
        }
        $user->update($dataForm);

        

        return response()->json(['success'=>$request->all()]);
    }

    public function assosiatedService()
    {
        $ownerOf = auth()->user()->ownerOf();
        $otherCompany = auth()->user()->assosiatedWith();
        $profile = auth()->user();

        $nav = [
            'menu' => '',
            'submenu' => '',
            'widgetmenu' => 'services'
        ];
        
        return view('pages.profile.pages.services')
            ->with(compact('nav','profile','ownerOf','otherCompany'));
    }

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

    public function myTransactions()
    {
        $profile = auth()->user();

        $nav = [
            'menu' => '',
            'submenu' => '',
            'widgetmenu' => 'my_transactions'
        ];

        return view('pages.profile.pages.my_transactions')
            ->with(compact('nav','profile'));
    }

    public function myServicesTransactions(){
        $profile = auth()->user();

        $nav = [
            'menu' => '',
            'submenu' => '',
            'widgetmenu' => 'services-transactions'
        ];

        return view('pages.profile.pages.my_services_transactions')
            ->with(compact('nav','profile'));
    }
}
