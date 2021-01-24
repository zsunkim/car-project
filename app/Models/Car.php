<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $connection = 'db_test';
    protected $table = 'tb_car';
    public $timestamps = false;

    public function converterModel($request) {
        foreach($request->request as $key=>$val) { // request 변수명과 컬럼명이 같을때
            if(isset($val)) {
                $this->{$key} = $val;
            }
        }
        // $this->owner = $request->owner; // 컬럼 하나만

        return $this;
    }

    public static $rules = [
        'owner' => ['required', 'min:2', 'max:10'],
        'year' => ['required', 'min:2', 'max:10'],
        'size' => ['required']
    ];


}
