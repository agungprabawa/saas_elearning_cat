<?php

namespace App\Models\TransactionsModel;

use Illuminate\Database\Eloquent\Model;

class TransactionItemsModel extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_s_transaction';
    protected $table = 'srv_transaction_items';
    protected $fillable = ['id_s_transaction','id_s_attribute','size','total_price'];
}
