<?php

namespace App\Models\Companies;

use Illuminate\Database\Eloquent\Model;

class CompanyTypesModel extends Model
{
    protected $table = 'companies_type';
    protected $primaryKey = 'id_type';
    protected $fillable = ['id_type', 'label', 'descriptions', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by', 'is_deleted'];
}
