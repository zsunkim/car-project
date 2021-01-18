<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accident extends Model
{
    protected $connection = 'db_test';
    protected $table = 'tb_accident';
    public $timestamps = false;

    public function converterAccident($request) {
        $car_cnt = Accident::where('car_id', $request->car_id)->where('accident_status', $request->accident_status)->count();

        if($car_cnt == 0) {
            foreach($request->request as $key => $val) {
                if(isset($val)) {
                    $this->{$key} = $val;
                }
            }

            return $this;
        }

        return redirect('/')->with('alert', '아이디 중복');
    }
}
