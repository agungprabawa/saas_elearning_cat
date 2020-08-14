<?php

namespace App\Models\Companies;

use App\Models\AssistedTest\ExamParticipantModel;
use App\Models\LogModels\CoursesLogModel;
use Illuminate\Database\Eloquent\Model;
use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CompaniesModel extends Model
{
    protected $table = "companies";
    protected $primaryKey = 'id_company';
    protected $fillable = ['id_company','uuid','company_name','company_type','descriptions','logo_url','emails','phones','country','address','created_at','created_by','updated_at','updated_by','deleted_at','deleted_by','service_status','subscribe_until','allow_external_register'];

    public function users()
    {
        return $this->hasMany('App\Models\User\UserSrvAssosiation','id_company','id_company');
    }

    public function subs(){
        return $this->hasMany(CompanySubscribtions::class,'id_company','id_company');
    }

    public function usersCount(){
        return $this->users()->groupBy('id_user')->get()->count();
    }

    public function type()
    {
        return $this->hasOne(CompanyTypesModel::class,'id_type','company_type');
    }

    public function courses()
    {
        return $this->hasMany('App\Models\Learning\CoursesModel','id_company','id_company');
    }

    public function exams()
    {
        return $this->hasMany('App\Models\AssistedTest\ExamModel','id_company','id_company');
    }

    public function announcements()
    {
        return $this->hasMany('App\Models\AnnouncementModel','id_company','id_company');
    }

    public function transactionsInternal()
    {
        return $this->hasMany(CompaniesTransaction::class, 'id_company','id_company');
    }

    public function subscribtions()
    {
        $idCompany = $this->id_company;
        $getSubscribtionsQuery = DB::raw("SELECT srv_attributes.label as label, price, size, id_company FROM companies_subscribtions
            INNER JOIN srv_attributes ON companies_subscribtions.id_srv_attribute = srv_attributes.id_s_attributes
            WHERE id_company = $idCompany");
            $getSubscribtions = DB::select($getSubscribtionsQuery);

        return $getSubscribtions;
    }

    public function avgElearningAccess($sub = 30)
    {
        $begin = new DateTime(Carbon::now()->subDays($sub)->format('Y-m-d'));

        $end = new DateTime(Carbon::now()->format('Y-m-d'));
        $end = $end->modify('+1 day');

        // dd($end);

        $log = CoursesLogModel::whereBetween('start_access',[$begin, $end])
            ->select('id_courses', DB::raw("SUM(total_access_time) as time"))
            ->where('id_company','=',$this->id_company)
            ->groupBy('id_courses')
            ->get();
        // dd($avg->toArray());

        // dd($avg->count());

        if ($log->count() < 1 || $log->sum('time') < 1){
            return 0;
        }
        $avg = $log->sum('time') / $log->count();

        // dd($avg);

        return ($avg/60);
    }

    public function avgExamsResult()
    {
        $exams = ExamParticipantModel::where('id_company','=',$this->id_company)
            ->avg('final_result');

        return $exams;
    }
}
