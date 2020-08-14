<?php

namespace App\Models\Learning;

use Illuminate\Database\Eloquent\Model;

class CoursesTaskSubmit extends Model
{
    protected $table = 'courses_task_submit';
    protected $primaryKey = 'id_submit';
    public $timestamps = false;
    protected $fillable = ['id_submit', 'id_task', 'id_company', 'content', 'file_url', 'created_at', 'created_by'];
}
