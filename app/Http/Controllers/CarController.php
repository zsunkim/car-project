<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Objects\CarObj;
use Exception;
use Illuminate\Http\Request;
use Throwable;

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
        $car_obj = new CarObj();
        $car_cnt = $car_obj->getCarCnt(request('owner'));

        if ($car_cnt != 0) { //있으면
            $car_info = $car_obj->getCar(request('owner'));
            return view('cars.carList', ['car_info' => $car_info]);

        }
        else if ($car_cnt == 0) { //없으면 등록
            return redirect('/car/create')->with('alert','등록된 차목록이 없습니다. 등록해주세요.');
        }

    }

    // 자동차 등록 페이지
    public function createCar()
    {
        return view('cars.insertCar');
    }


    /**
     * db트랜잭션 생성해서 모델 저장까지 하기
     * 등록페이지에서 등록 눌렀을때
     */
    public function insertCar(Request $request)
    {
        $car = new Car();
        try{
            $this->validate($request, Car::$rules);
            $car->converterModel($request);
            $result = $car->save();
            if(!$result) throw new Exception('저장에 실패했습니다.');
        } catch(Throwable $e){
            return redirect('/')->with('alert',$e->getMessage());
        }
        return redirect('/car/insertCarDetail/'.$car->id)->with('alert','자동차 상세정보를 입력해주세요.');

    }

    public function validateCar()
    {
        $owner = request('owner');
        $year = request('year');
        $size = request('size');




    }

}
