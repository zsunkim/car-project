<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $connection = 'db_test';
    protected $table = 'tb_car';
    public $timestamps = false;
}
