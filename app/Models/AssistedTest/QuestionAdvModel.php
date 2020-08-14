<?php

namespace App\Models\AssistedTest;

use Illuminate\Database\Eloquent\Model;

class QuestionAdvModel extends Model
{
    protected $table = 'exam_questions_adv';
    protected $primaryKey = 'id_exam_question';
    protected $fillable = ['id_exam_question', 'id_company', 'id_exam', 'imported_from', 'picked', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by', 'is_deleted'];


    public function details(){
        return $this->hasOne(ExamModel::class,'id_exam','imported_from');
    }
}
