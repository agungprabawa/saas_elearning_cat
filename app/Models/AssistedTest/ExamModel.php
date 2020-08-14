<?php

namespace App\Models\AssistedTest;

use Illuminate\Database\Eloquent\Model;
use App\Models\AssistedTest\QuestionModel;
use Illuminate\Support\Facades\DB;

class ExamModel extends Model
{
    protected $table = 'exams';
    protected $primaryKey = 'id_exam';
    protected $fillable = ['id_exam', 'id_company', 'uuid', 'title', 'category', 'descriptions', 'cover_img_url', 'random_q', 'random_c', 'max_choices','max_time', 'max_questions','is_share_link', 'is_unlimited_users', 'max_users', 'start_date', 'is_no_end_time', 'end_date', 'is_free', 'is_private', 'exam_price', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at','is_deleted'];

    public function participants(){
        return $this->hasMany(ExamParticipantModel::class,'id_exam','id_exam');
    }

    public function categorys(){
        return $this->hasOne('App\Models\OtherData\CategoriesModel','id_category','category');
    }

    public function withCourses(){
        $queryString = 
            "SELECT c.title, c.uuid FROM exams_courses_relations ecr
            INNER JOIN courses c ON c.id_courses = ecr.id_courses
            WHERE ecr.id_exam = ?";

        $queryBindings = [
            $this->id_exam
        ];

        $queryResult = DB::select($queryString, $queryBindings);

        return $queryResult;

    }

    public function questions(){
        return $this->hasMany(QuestionModel::class,'id_exam','id_exam');
    }

    public function questionsCount(){
        $counted = QuestionModel::where('id_exam','=',$this->id_exam)
            ->where('is_deleted','=',0)
            ->get();
        return $counted->count();
    }

    public function creator(){
        return $this->hasOne('App\User','id','created_by');
    }

    public function comments(){
        return $this->hasMany('App\Models\CommentsModel','id_post','id_exam');
    }

}
