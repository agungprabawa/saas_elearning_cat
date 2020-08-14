<?php

namespace App\Models\AssistedTest;

use Illuminate\Database\Eloquent\Model;

class ExamQuestionModel extends Model
{
    protected $table = 'exam_questions';
    protected $primaryKey = 'id_exam_question';
    protected $fillable = ['id_exam_question', 'id_company', 'id_question', 'id_exam', 'created_at', 'created_by','updated_at','updated_by'];

    // public function questions()
    // {
    //     $this->hasMany(QuestionModel::class,'id_question','id_question');
    // }

    public function question()
    {
        return $this->hasOne(QuestionModel::class,'id_question','id_question');
    }
}
