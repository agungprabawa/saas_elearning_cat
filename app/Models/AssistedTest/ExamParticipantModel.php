<?php

namespace App\Models\AssistedTest;

use Illuminate\Database\Eloquent\Model;

class ExamParticipantModel extends Model
{
    protected $table = 'exam_participant';
    protected $primaryKey = 'id_exam_participant';
    public $timestamps = false;
    public $fillable = ['id_exam', 'id_company' ,'id_participant', 'status', 'exam_start', 'exam_end', 'final_result','created_at', 'created_by'];

    public function exam()
    {
        return $this->hasOne(ExamModel::class, 'id_exam','id_exam');
    }

    public function details()
    {
        return $this->hasOne('App\User', 'id','id_participant');
    }

    public function avgOnGroup()
    {
        // $avg = ExamParticipantModel::count();
        $avg = $this->where('id_exam','=',$this->id_exam)->avg('final_result');
        return $avg ?? '-';
    }
}
