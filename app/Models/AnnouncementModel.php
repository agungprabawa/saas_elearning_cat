<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnnouncementModel extends Model
{
    protected $table = 'announcement';
    protected $primaryKey = 'id_ann';
    protected $fillable = ['id_ann', 'uuid' ,'id_company', 'title', 'content', 'url', 'cover_img', 'created_at', 'created_by', 'updated_at', 'updated_by','deleted_at','deleted_by','is_deleted'];

    public function creator()
    {
        return $this->hasOne('App\User','id','created_by');
    }

    public function fromNotify(){
        return $this->hasMany('App\Models\NotificationsModel','notif_owner','id_ann');
    }

    public function hasNotified()
    {
        $notified = NotificationsModel::where('notif_type','=','announcement')
            ->where('notif_owner','=',$this->id_ann)
            ->where('notifiable_id','!=',auth()->id())
            ->get()->pluck('notifiable_id');

        return $notified;

    }
}
