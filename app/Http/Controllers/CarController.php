<?php

namespace App\Http\Controllers;

use App\Models\Car;
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
        $car_cnt = Car::where('owner', request('owner'))->count();

        if ($car_cnt != 0) { //있으면
            $car_info = Car::where('owner', request('owner'))->get();
            return view('cars.carList', ['car_info' => $car_info]);

            // $result = array();
            // $result =
            // return response([$car_info]);
        }
        else if ($car_cnt == 0) { //없으면 등록
            return redirect('/car/create')->with('alert','등록된 차목록이 없습니다. 등록해주세요.');
        }

    }

    // 자동차 등록 페이지
    public function createCar()
    {
        return view('cars.carEnroll');
    }


    /**
     * db트랜잭션 생성해서 모델 저장까지 하기
     * 등록페이지에서 등록 눌렀을때
     */
    public function insertCar(Request $request)
    {
        $car = new Car();
        try{
            $car->converterModel($request);
            $result = $car->save();
            if(!$result) return redirect()->with('alert','저장에 실패했습니다.');
        } catch(Throwable $e){
            dd($e->getMessage());
        }
        return redirect('/car/carDetailEnroll/'.$car->id)->with('alert','자동차 상세정보를 입력해주세요.');

    }

}
