<?php

namespace App\Models\Learning;

use App\Models\LogModels\CoursesLogModel;
use App\Models\OtherData\RatingsModel;
use Illuminate\Database\Eloquent\Model;

class CoursesModel extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'id_courses';
    protected $fillable = ['id_courses', 'id_company', 'uuid', 'title', 'category', 'descriptions', 'cover_img_url', 'is_manual_add', 'is_share_link', 'is_unlimited_users', 'max_users', 'is_start_immediately', 'start_date', 'start_time', 'is_no_end_time', 'end_date', 'end_time', 'is_free', 'is_private','courses_price', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at','is_deleted'];

    public function participants(){
        return $this->hasMany('App\Models\Learning\CoursesParticipantModel','id_courses','id_courses');
    }

    public function company(){
        return $this->hasOne('App\Models\Companies\CompaniesModel','id_company','id_company');
    }

    public function categorys(){
        return $this->hasOne('App\Models\OtherData\CategoriesModel','id_category','category');
    }

    public function teachMaterials(){
        return $this->hasMany('App\Models\Learning\TeachMaterialsModel','id_courses','id_courses');
    }

    public function coursesTask()
    {
        return $this->hasMany(CoursesTaskModel::class,'id_courses','id_courses');
    }

    public function creator(){
        return $this->hasOne('App\User','id','created_by');
    }

    public function comments(){
        return $this->hasMany('App\Models\CommentsModel','id_post','id_exam');
    }

    public function category()
    {
        return $this->hasOne(CoursesCategoriesModel::class,'id_category','category');
    }

    public function lastAccess(){
        $lastAccest = CoursesLogModel::where('id_courses','=',$this->id_courses)
            ->where('id_participant','=',auth()->id())
            ->orderBy('start_access', 'DESC')
            ->first();
        // dd($lastAccest->toArray());
        return $lastAccest->start_access ?? 'kosong';
    }

    public function ratingsAvg(){
        return RatingsModel::where('id_post','=',$this->id_courses)
            ->where('type_post','=',1)
            ->avg('rating_val');
    }
}
