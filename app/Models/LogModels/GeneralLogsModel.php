<?php

namespace App\Models\LogModels;

use Illuminate\Database\Eloquent\Model;

class GeneralLogsModel extends Model
{
    protected $table = 'general_activity_log';
    protected $primaryKey = 'id_log';
    public $timestamps = false;
    protected $fillable = ['id_company','page_name','page_type','route_name','route_parameters','page_url','access_by','access_at'];
}
