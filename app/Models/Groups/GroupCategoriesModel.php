<?php

namespace App\Models\Groups;

use Illuminate\Database\Eloquent\Model;

class GroupCategoriesModel extends Model
{
    protected $table = 'group_categories';
    protected $primaryKey = 'id_g_category';
    protected $fillable = ['label', 'descriptions', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by', 'is_deleted', 'company_id'];

    public function groups(){
        return $this->hasMany('App\Models\Groups\GroupsModel','group_category','id_g_category');
    }
}
