<?php

namespace App\Objects;

use App\Models\Accident;
use App\Models\Car;
use App\Models\CarDetail;
use Exception;
use Illuminate\Http\Request;
use Throwable;

class CarObj
{
    public function getCarCnt($owner) {
        $car_cnt = Car::where('owner', $owner)->count();
        return $car_cnt;
    }

    public function getCarDetailCnt($id) {
        $detiail_cnt = CarDetail::where('car_id', $id)->count();
        return $detiail_cnt;
    }

    public function getAccidentCnt($id) {
        $accident_cnt = Accident::where('car_id', $id)->count();
        return $accident_cnt;
    }

    public function getDetailAccident($id) {
        $detail_info = CarDetail::join('tb_accident', 'tb_car_detail.car_id', '=', 'tb_accident.car_id')
                    -> where('tb_car_detail.car_id', $id)->first();
        return $detail_info;
    }

    public function getCar($id) {
        $car_info = Car::where('owner', request('owner'))->get();
        return $car_info;
    }

    public function getCarDetail($id) {
        $detail_info = CarDetail::where('car_id', $id)->first();
        return $detail_info;
    }

    public function getAccident($id) {
        $accident_info = Accident::where('car_id', $id)->get();
        return $accident_info;
    }


}
