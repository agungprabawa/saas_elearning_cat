<?php

namespace App\Models\SrvModel;

use Illuminate\Database\Eloquent\Model;

class AttributesModel extends Model
{
    protected $table = 'srv_attributes';
    protected $primaryKey = 'id_s_attributes';
    protected $fillable = ['label','desciptions','price','default_val','updated_at','updated_by'];
}
