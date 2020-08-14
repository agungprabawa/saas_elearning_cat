<?php

namespace App\Models\OtherData;

use Illuminate\Database\Eloquent\Model;

/**
 * Post
 *
 * @mixin Eloquent
 */
class CategoriesModel extends Model
{
    protected $table = 'l_e_categories';
    protected $primaryKey = 'id_category';
    protected $fillable = ['id_category', 'id_company', 'category', 'descriptions', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by', 'is_deleted'];
}
