<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale_Transaction extends Model
{
    protected $table='sale_transaction';
    protected $fillname=[
        'sale_transaction_id',
        'sale_transaction_date_time',
        'sale_transaction_total_price',
        'sale_transaction_decription',
        'staff_id',
        'category_id'];
}
