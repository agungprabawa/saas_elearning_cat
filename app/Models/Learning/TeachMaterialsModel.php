<?php

namespace App\Models\Learning;

use Illuminate\Database\Eloquent\Model;

class TeachMaterialsModel extends Model
{
    protected $table = 'courses_teach_materials';
    protected $primaryKey = 'id_tech_material';
    protected $fillable = ['id_tech_material', 'id_courses', 'id_company', 'title', 'description', 'main_file_path', 'allow_download','created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at', 'is_deleted','location'];
}
