<?php

namespace App\Models\LogModels;

use Illuminate\Database\Eloquent\Model;

class CoursesLogModel extends Model
{
    public $timestamps = false;
    protected $table = 'courses_log';
    protected $primaryKey = 'id_c_log';
    protected $fillable = ['id_c_log', 'uuid','id_company','id_courses', 'id_materials', 'id_participant', 'start_access', 'total_access_time'];
}
