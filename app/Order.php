<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    public $timestamp = false;

    protected $fillable = [

        'payment_id',
        'product_id',
        'customer_id',
        'order_date_time',
        'order_status'
    ];

    public function myProduct () 
    {
        return $this->hasOne('App\Product', 'product_id', 'order.product_id');
    }

    public function myCustomer () 
    {
        return $this->hasMany('App\Customer', 'customer_id', 'order.customer_id');
    }
}
