<?php

namespace App\Models\TransactionsModel;

use Illuminate\Database\Eloquent\Model;

class TransactionsModel extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_s_transaction';
    protected $table = 'srv_transactions';
    protected $fillable = ['id_company','id_user','transaction_url','transaction_token','external_id','until','total_price','status','type','created_at'];

}
