<?php

namespace App\Models\Groups;

use Illuminate\Database\Eloquent\Model;

class GroupUsersModel extends Model
{
    protected $table = 'group_users';
    public $timestamps = false;
    protected $primaryKey = ['id_group','id_user'];
    protected $fillable = ['id_group','id_user','created_at','created_by'];
}
