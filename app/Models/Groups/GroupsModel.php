<?php

namespace App\Models\Groups;

use Illuminate\Database\Eloquent\Model;

class GroupsModel extends Model
{
    protected $table = 'groups';
    protected $primaryKey = 'id_group';
    protected $fillable = ['group_uuid','group_uuid', 'group_category', 'label', 'descriptions', 'cover_img', 'max_users', 'purchasable', 'prices', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by', 'is_deleted'];

    public function category(){
        return $this->hasOne('App\Models\Groups\GroupCategoriesModel','id_g_category','group_category');
    }
}
