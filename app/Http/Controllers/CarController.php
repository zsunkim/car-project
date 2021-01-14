<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class CarController extends Controller
{
    // 첫 화면 url : https://carproject.test/
    public function search()
    {
        return view('cars.ownersearch');
    }

    /**
     *  소유자 검색
     */
    public function getOwner()
    {
        $car_cnt = Car::select(DB::raw('count(*) as cnt'))->where('owner', request('owner'))->count();

        if ($car_cnt != 0) { //있으면
            $car_info = Car::where('owner', request('owner')) -> get();
            return view('cars.carList', compact('car_info'));
        }
        else if ($car_cnt == 0) { //없으면 등록
            return redirect() -> route('cars.carEnroll') -> with('alert','등록된 차목록이 없습니다. 등록해주세요.');
            // return view('')->with('alert','등록된 차목록이 없습니다. 등록해주세요.');
        }

    }

    // 자동차 등록 페이지
    public function enrollCar()
    {
        return view('cars.carEnroll');
    }


    /**
     * 등록페이지에서 등록 눌렀을때
     */
    public function insertCar()
    {
        $car = new Car();
        $car -> owner = request('owner');
        $car -> year = request('year');
        $car -> size = request('size');
        $car -> save();

        return redirect() -> route('cars.carDetailEnroll') -> with('alert','자동차 디테일을 추가 해주세요.');

    }

}
