<?php

namespace App;

use App\Models\AssistedTest\ExamParticipantModel;
use App\Models\Companies\CompanySubscribtions;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User\UserSrvAssosiation;
use App\Models\Companies\CompaniesModel;
use App\Models\Learning\CoursesParticipantModel;
use App\Models\Learning\CoursesTaskModel;
use App\Models\Learning\CoursesTaskSubmit;
use App\Models\TransactionsModel\TransactionsModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username','first_name', 'last_name','email', 'bio','phone_number','password','active_session','active_status','lang', 'updated_at','cover_img','address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function company(){
        return $this->hasOne('App\Models\Companies\CompaniesModel','id_company','active_session');
    }

    public function companies()
    {
        $companies = CompaniesModel::join('user_srv_dtl','companies.id_company','=','user_srv_dtl.id_company')
            ->where('user_srv_dtl.id_user','=',auth()->user()->id)
            ->where('user_srv_dtl.id_company','!=',auth()->user()->company->id_company)
            ->distinct()
            ->groupBy('companies.id_company')
            ->get();

        return $companies;
    }

    public function company_subs($id_attr){
        $subs = CompanySubscribtions::where('id_company','=', $this->active_session)
            ->where('id_srv_attribute','=',$id_attr)->first();

        if ($subs->size == 0){
            return false;
        }else{
            return true;
        }
    }

    public function availStatus_old(){
        // return $this->hasMany('App\Models\User\UserSrvAssosiation','id_user','id');

        $availStatus = UserSrvAssosiation::select('status')->where('id_user','=',auth()->user()->id)
            ->where('id_company','=',auth()->user()->company->id_company)
            ->where('status','!=',auth()->user()->active_status)
            ->orderBy('status','ASC')
            ->get();

        return $availStatus;
    }

    public function availStatus(){
        $id_user = auth()->user()->id;
        $id_company = auth()->user()->active_session;
        $current_status = auth()->user()->active_status;

        $strQuery =
            "SELECT
                MIN(status) as status
            FROM user_srv_dtl
            WHERE id_user = $id_user
                and id_company = $id_company
            UNION
            SELECT
               MAX(status) as status
            FROM user_srv_dtl
            WHERE id_user = $id_user
                and id_company = $id_company";

        return collect(DB::select($strQuery))->where('status','!=',$current_status);
    }

    public function allStatus(){
        return $this->hasMany('App\Models\User\UserSrvAssosiation','id_user','id');
    }

    public function myUnfinishedTask(){

        $assosiatedCourses = CoursesParticipantModel::select('id_courses')->where('id_participant','=',$this->id)
            ->where('id_company','=',$this->active_session)
            ->get()->pluck('id_courses')->toArray();

        $finished = CoursesTaskSubmit::where('created_by','=',$this->id)
            ->where('id_company','=',$this->active_session)
            ->groupBy('id_task')
            ->pluck('id_task');

//         dd($finished);

        $unfinished = CoursesTaskModel::select('courses_task.id_courses')
            ->join('courses','courses.id_courses','=','courses_task.id_courses')
            ->where('end_at','>',DB::raw('NOW()'))
            ->whereIn('courses_task.id_courses',$assosiatedCourses)
            ->whereNotIn('courses_task.id_task',$finished)
            ->where('courses_task.id_company','=',$this->active_session)
            ->where('courses_task.is_deleted','=',0)
            ->where('courses.is_deleted','=',0)
            ->groupBy('courses_task.id_courses')
            ->get();
        // dd($unfinished);

        return $unfinished;
    }

    public function myFinishedTask()
    {
       $finished = CoursesTaskSubmit::where('created_by','=',$this->id)
            ->where('id_company','=',$this->active_session)
            ->get();

        return $finished;
    }

    public function myTask()
    {
        # code...
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = $password;
    }

    public function ownerOf($uuid = '')
    {

        if($uuid == ''){
            $ownerof = CompaniesModel::where('created_by','=',auth()->id())
                ->get();
        }else{

            $ownerof = CompaniesModel::where('uuid',$uuid)
                ->where('created_by','=',auth()->id())->first();

            if(!$ownerof){
                return false;
            }
        }
        // dd($ownerof->toArray());

        return $ownerof;

    }

    public function assosiatedWith()
    {
        $ownerof = $this->ownerOf()->pluck('id_company')->toArray();

        $assosiation = UserSrvAssosiation::where('id_user','=',$this->id)
            ->whereNotIn('id_company',$ownerof)
            ->distinct('id_company')->get()->pluck('id_company')->toArray();


        $companies = CompaniesModel::whereIn('id_company',array_unique($assosiation))
            ->get();

        return $companies;
    }

    public function balance(){
        return TransactionsModel::where('id_company','=',$this->active_session)
            ->where('status','=',1)
            ->sum('total_price');
    }
}
