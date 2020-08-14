<?php

namespace App\Models\Learning;

use Illuminate\Database\Eloquent\Model;

class CoursesParticipantModel extends Model
{
    protected $table = 'courses_participant';
    public $timestamps = false;
    public $fillable = ['id_courses', 'id_company' ,'id_participant', 'status', 'created_at', 'created_by'];


    public function coursesLog()
    {
        return $this->hasMany('App\Models\LogModels\CoursesLogModel','id_courses','id_courses');
    }

    public function participants(){
        
    }
}
