<?php

namespace App\Models\AssistedTest;

use Illuminate\Database\Eloquent\Model;

class ExamsCoursesRelModel extends Model
{
    public $timestamps = false;
    protected $table = 'exams_courses_relations';
    protected $primaryKey = 'id_relation';
    protected $fillable = ['id_exams','id_courses','id_company','created_by'];
}
