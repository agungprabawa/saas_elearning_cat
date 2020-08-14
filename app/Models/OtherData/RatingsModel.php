<?php


namespace App\Models\OtherData;


use Illuminate\Database\Eloquent\Model;

class RatingsModel extends Model
{
    protected $primaryKey = 'id_ratings';
    protected $table = 'l_e_ratings';
    protected $fillable = ['id_company','id_post','type_post','rating_val','rating_content','created_at','created_by','updated_at','updated_by'];

    public function creator(){
        return $this->hasOne('App\User','id','created_by');
    }
}
