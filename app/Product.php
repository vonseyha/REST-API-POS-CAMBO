<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    public $timestamp = false;

    protected $fillable = [
        
            'product_img',
            'product_name',
            'product_wholesales_price',
            'product_retail_price',
            'product_status',
            'product_description',
            'category_id'
    ];
}
