<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table='staff';
    protected $fillname=[
        'staff_id',
        'staff_img',
        'staff_name',
        'staff_password',
        'staff_phonenumber',
        'supplier_id'];
}
