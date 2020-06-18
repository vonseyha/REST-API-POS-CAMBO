<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    protected $table = 'payment_type';

    public $timestamp = false;

    protected $fillable = [

        'payment_id',
        'payment_description'
    ];
}
