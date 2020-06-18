<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductHasSalesTransaction extends Model
{
    protected $table = 'product_has_sales_transaction';

    public $timestamp = false;

    protected $fillable = [

        'product_product_id',
        'sale_transaction_saletransaction_id'
    ];
}
