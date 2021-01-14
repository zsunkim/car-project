<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarDetail extends Model
{
    protected $connection = 'db_test';
    protected $table = 'tb_car_detail';
    public $timestamps = false;
}
