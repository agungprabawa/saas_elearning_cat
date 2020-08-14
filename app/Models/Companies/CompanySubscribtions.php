<?php

namespace App\Models\Companies;

use Illuminate\Database\Eloquent\Model;

class CompanySubscribtions extends Model
{
    protected $table = "companies_subscribtions";
    public $timestamps = false;
    protected $primaryKey = 'id_company';
    protected $fillable = ['id_company','id_srv_attribute','size','updated_at','updated_by'];
}
