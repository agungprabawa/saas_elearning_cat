<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentsModel extends Model
{
    protected $primaryKey = 'id_comment';
    protected $table = 'comments';
    protected $fillable = ['id_comment', 'id_company', 'id_post', 'type_post', 'content', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by', 'is_deleted'];

    public function post(){
        
        if($this->type_post == 1){
            $related = 'App\Models\Learning\CoursesModel';
            $key = 'id_courses';
        }else{
            $related = 'App\Models\AssistedTest\ExamModel';
            $key = 'id_exam';
        }
        return $this->hasOne($related,$key,'id_post');
    }

    public function creator(){
        return $this->hasOne('App\User','id','created_by');
    }

    
    
}
