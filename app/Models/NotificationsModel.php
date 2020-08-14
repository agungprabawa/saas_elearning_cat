<?php

namespace App\Models;

use App\Models\Learning\CoursesModel;
use App\Models\Learning\CoursesTaskModel;
use Illuminate\Database\Eloquent\Model;

class NotificationsModel extends Model
{
    protected $table = 'notifications';
    // protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id','id_company','type', 'notif_type', 'notif_owner', 'owner_type','notifiable_type', 'notifiable_id', 'data', 'read_at', 'created_at', 'created_by','updated_at'];

    public function owner(){
        return $this->hasOne('App\User','id','notifiable_id');
    }

    public function triggerBy(){
        return $this->hasOne('App\User','id','created_by');
    }

    public function post()
    {
        // dd($this->owner_type);

        if($this->owner_type == 1){
            return $this->hasOne('App\Models\Learning\CoursesModel','id_courses','notif_owner');
        }else if ($this->owner_type == 2) {
            return $this->hasOne('App\Models\AssistedTest\ExamModel','id_exam','notif_owner');
        }else if ($this->owner_type == 3){
            return $this->hasOne('App\Models\AnnouncementModel','id_ann','notif_owner');
        }else if ($this->owner_type == 4){
            return $this->hasOne('App\Models\Learning\CoursesTaskModel','id_task','notif_owner');
        }
    }

    public function taskFrom()
    {
        if($this->owner_type == 4){
          return CoursesTaskModel::find($this->notif_owner);
        }
    }
}
