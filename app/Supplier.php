<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table='supplier';
    protected $fillname=[
        'supplier_id',
        'supplier_img',
        'supplier_phonenumber',
        'supplier_name',
        'supplier_email',
        'supplier_location'];
}
