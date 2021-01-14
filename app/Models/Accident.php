<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accident extends Model
{
    protected $connection = 'db_test';
    protected $table = 'tb_accident';
    public $timestamps = false;
}
