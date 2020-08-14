<?php

namespace App\Models\AssistedTest;

use Illuminate\Database\Eloquent\Model;

class QuestionModel extends Model
{
    protected $table = 'questions';
    protected $primaryKey = 'id_question';
    protected $fillable = ['id_question', 'id_company', 'id_exam' ,'question', 'type', 'score', 'answer', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by', 'is_deleted'];

    public function options()
    {
        return $this->hasMany(QuestionOptionsModel::class,'id_question','id_question');
    }
}
