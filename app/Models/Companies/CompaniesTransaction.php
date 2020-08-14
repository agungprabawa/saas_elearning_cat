<?php

namespace App\Models\Companies;

use Illuminate\Database\Eloquent\Model;

class CompaniesTransaction extends Model
{
    public $timestamps = false;
    protected $table = 'companies_transactions';
    protected $primaryKey = 'id_c_transaction';
    protected $fillable = ['id_c_transaction', 'id_product', 'id_company','type_product', 'price', 'external_id', 'transaction_url','transaction_token' ,'created_at', 'created_by','status'];
}
