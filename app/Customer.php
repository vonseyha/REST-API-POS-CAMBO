<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    public $timestamp = false;

    protected $fillable = [
        'customer_id',
        'customer_img',
        'customer_name',
        'customer_phone_number',
        'customer_email',
        'customer_address'
    ];
}
