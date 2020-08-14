<?php

namespace App\Models\AssistedTest;

use Illuminate\Database\Eloquent\Model;

class ExamAnswerModel extends Model
{
    protected $table = 'exam_answers';
    public $timestamps = false;
    protected $primaryKey = 'id_answer';
    protected $fillable = ['id_answer', 'id_company', 'id_exam', 'id_question','id_participant', 'answer', 'time_used','sys_score'];

    public function question(){
        return $this->hasOne(QuestionModel::class, 'id_question','id_question');
    }

}
