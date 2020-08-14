<?php

namespace App\Models\AssistedTest;

use Illuminate\Database\Eloquent\Model;

class QuestionOptionsModel extends Model
{
    protected $table = 'questions_option';
    protected $primaryKey = 'id_opsion';
    protected $fillable = ['id_opsion', 'id_company', 'id_question', 'optiontext', 'randkeys' ,'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by', 'is_deleted'];
}
