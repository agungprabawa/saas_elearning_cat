<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserSrvAssosiation extends Model
{
    public $timestamps = false;
    protected $table = "user_srv_dtl";
    protected $fillable = [
        'id_user', 'id_company', 'status'
    ];

}
