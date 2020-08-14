<?php

namespace App\Models;

use App\Models\AssistedTest\ExamModel;
use App\Models\Learning\CoursesModel;
use Illuminate\Database\Eloquent\Model;

class AnnouncementNotifyable extends Model
{
    protected $table = 'announcement_notifiable';
    public $timestamps = false;
    protected $primaryKey = 'id_noifiable';
    protected $fillable = ['id_announcement', 'id_company', 'notify_to', 'notify_type'];

    // notify_type seharusnya notify_id, merujuk ke id post elearning/assistedtest

    public function wasNotifyToPost()
    {
        if($this->notify_to=='elearning'){
            return $this->hasOne('App\Models\Learning\CoursesModel','id_courses','notify_type');
        }else if($this->notify_to == 'assistedtest'){
            return $this->hasOne('App\Models\AssistedTest\ExamModel','id_exam','notify_type');
        }else if($this->notify_to == 'role'){
            if($this->notify_type == 1){
                return 'Administrator';
            }else if($this->notify_type == 2){
                return 'Staf';
            }else{
                return 'Student';
            }
        }else{
            return 'all';
        }
        
    }

    public function wasNotify()
    {
        if($this->notify_to=='elearning'){

            if($this->notify_type == 0){
                return array(0,'Semua E-Learning');
            }
            $post = CoursesModel::find($this->notify_type);
            return array($post->id_courses,$post->title);
        }else if($this->notify_to == 'assistedtest'){
            if($this->notify_type == 0){
                return 'Semua Assisted Test';
            }
            $post = ExamModel::find($this->notify_type);
            return array($post->id_courses,$post->title);
        }else if($this->notify_to == 'role'){
            if($this->notify_type == 1){
                return array(1,'Administrator');
            }else if($this->notify_type == 2){
                return array(2,'Staf');
            }else{
                return array(3,'Student');
            }
        }else{
            return array(0,'Semua User');
        }
    }
}
