<?php

namespace App\Http\Controllers\SrvAdmin;

use App\Http\Controllers\Controller;
use App\Models\AssistedTest\ExamParticipantModel;
use Illuminate\Http\Request;
use App\User;
use App\Models\User\UserSrvAssosiation;
use App\Models\Learning\CoursesParticipantModel;
use Yajra\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function index(){

        // dd($users);
        // dd($users);
        $nav = [
            'menu' => 'users',
            'submenu' => 'umanage'
        ];

        return view('pages.srv_admin.users.list')
            ->with(compact('nav'));
    }

    public function usersAjax(){
        $users = User::select(DB::raw("min(status) as status"),'users.id','users.name','users.username','users.email','users.address')
            ->join('user_srv_dtl','users.id','=','user_srv_dtl.id_user')
            ->where('id_company','=',auth()->user()->active_session)
            ->where('id_user','!=',auth()->id())
            ->groupBy('user_srv_dtl.id_user');
            // ->distinct();

        if(auth()->user()->active_status == 1){
            $users->get();
        }else{ // For staff
            $onlyStudent = UserSrvAssosiation::where('id_company','=',auth()->user()->active_session)
                ->where('status','<',3)
                ->get()->pluck('id_user')->toArray();
            $users->whereNotIn('users.id',$onlyStudent)->get();
        }

        return datatables()->of($users)->toJson();
    }

    public function create(){
        // dd($users);
        // dd($users);
        $nav = [
            'menu' => 'users',
            'submenu' => 'ucreate'
        ];

        return view('pages.srv_admin.users.create')
            ->with(compact('nav'));
    }

    public function edit($uuid){
        $user = User::select('id','name','username','email','cover_img','user_srv_dtl.status','address')
            ->join('user_srv_dtl','users.id','=','user_srv_dtl.id_user')
            ->where('user_srv_dtl.id_company','=',auth()->user()->active_session)
            ->where('users.id','=',$uuid)
            ->orderBy('user_srv_dtl.status','ASC')
            ->first();

        // dd($user);
        // return var_dump($user);

        $nav = [
            'menu' => 'users',
            'submenu' => 'ucreate'
        ];

        return view('pages.srv_admin.users.edit')
            ->with(compact('nav','user'));
    }

    public function store(Request $request){

        $rules = [
            'name'=>'required',
            'username'=>'required|alpha_num|max:20|unique:users',
            'email'=>'required|email|unique:users',
        ];

        if(auth()->user()->active_status == 1){
            $rules['type'] = 'in:1,2,3';
        }else{
            $rules['type'] = 'in:3';
        }

        $validateData = Validator::make($request->all(),$rules);
        if($validateData->passes()){

            if(empty($request->password)){
                $password = Hash::make(randomPassword());
            }else{
                $password = Hash::make($request->password);
            }
            DB::transaction(function() use ($request, $password) {
                $user = User::create([
                    'name'=>$request->name,
                    'username'=>$request->username,
                    'email'=>$request->email,
                    'password'=> $password,
                    'cover_img' => $request->filepath ?? 'https://api.adorable.io/avatars/100/abott@adorable.png',
                    'address'=>$request->address,
                    'active_status' => 3,
                    'active_session' => auth()->user()->active_session
                ]);

                for($i = $request->type; $i <= 3; $i++){
                    UserSrvAssosiation::create([
                        'id_user'=> $user->id,
                        'id_company'=> auth()->user()->active_session,
                        'status'=> $i
                    ]);
                }
                return $user;
            });

            return response()->json(['success'=>'Saved','data'=>$request->all()]);
        }
        return response()->json(['error'=>$validateData->errors()->getMessages(),'data'=>$request->all()]);
    }

    public function update(Request $request, $uuid){

        $rules = [
            'name'=>'required',
            'username'=>['required','alpha_num','max:20',Rule::unique('users')->ignore($uuid)],
            'email'=> ['required','email',Rule::unique('users')->ignore($uuid)],
        ];

        if(auth()->user()->active_status == 1){
            $rules['type'] = 'in:1,2,3';
        }else{
            $rules['type'] = 'in:3';
        }


        $validateData = Validator::make($request->all(),$rules);

        if($validateData->passes()){
            DB::transaction(function() use ($request, $uuid) {
                if($request->password != null){
                    $user = User::where('id','=',$uuid)
                    ->update([
                        'name'=>$request->name,
                        'username'=>$request->username,
                        'email'=>$request->email,
                        'password'=> Hash::make($request->password),
                        'cover_img' => $request->filepath,
                        'address'=>$request->address
                    ]);
                }else{
                    $user = User::where('id','=',$uuid)
                    ->update([
                        'name'=>$request->name,
                        'username'=>$request->username,
                        'email'=>$request->email,
                        'cover_img' => $request->filepath,
                        'address'=>$request->address
                    ]);
                }

                // reset startus / role, harus di delete, dan di input lagi

                UserSrvAssosiation::where('id_company','=',auth()->user()->active_session)
                    ->where('id_user','=',$uuid)
                    ->delete();

                for($i = $request->type; $i <= 3; $i++){
                    UserSrvAssosiation::create([
                        'id_user'=>$uuid,
                        'id_company'=>auth()->user()->active_session,
                        'status'=>$i
                    ]);
                }
            });

            return response()->json(['success'=>'Saved','data'=>$request->all()]);
        }
        return response()->json(['error'=>$validateData->errors()->getMessages(),'data'=>$request->all()]);
    }

    public function delete(Request $request)
    {
        $my = auth()->user();
        DB::transaction(function() use ($request,$my){
            $userAsos = UserSrvAssosiation::where('id_company','=',$my->active_session)
                ->where('id_user','=',$request->id_user)
                ->delete();

            $participant1 = CoursesParticipantModel::where('id_company','=',$my->active_session)
                ->where('id_participant','=',$request->id_user)
                ->delete();

            $participant2 = ExamParticipantModel::where('id_company','=',$my->active_session)
                ->where('id_participant','=',$request->id_user)
                ->delete();
        });
        return response()->json(['success'=>'']);
    }
}
