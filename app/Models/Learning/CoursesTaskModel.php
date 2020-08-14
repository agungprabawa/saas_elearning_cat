<?php

namespace App\Models\Learning;

use Illuminate\Database\Eloquent\Model;
use App\Models\Learning\CoursesTaskSubmit;

class CoursesTaskModel extends Model
{
    protected $table = 'courses_task';
    protected $primaryKey = 'id_task';
    protected $fillable = ['id_courses', 'id_company', 'title', 'content', 'start_at', 'end_at', 'max_submit','created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by', 'is_deleted'];

    public function courses()
    {
        return $this->hasOne(CoursesModel::class, 'id_courses','id_courses');
    }

    public function submited()
    {
        return $this->hasMany(CoursesTaskSubmit::class, 'id_task','id_task');
    }

    public function submitStatus()
    {
        $submitStatus = CoursesTaskSubmit::where('id_task','=',$this->id_task)
            ->where('id_company','=',$this->id_company)
            ->where('created_by','=',auth()->id())
            ->count();

        return $submitStatus;
    }
}
