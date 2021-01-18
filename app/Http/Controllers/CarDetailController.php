<?php

namespace App\Http\Controllers;

use App\Models\Accident;
use App\Models\Car;
use App\Models\CarDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class CarDetailController extends Controller
{
    /**
     *  tb_car 테이블의 car_id로 tb_car_detail의 목록 출력
     */
    public function getCarDetail($id)
    {
        $car_cnt = CarDetail::where('car_id', $id)->count();

        if ($car_cnt != 0) {
            $accident_cnt = Accident::where('car_id', $id)->count();

            if($accident_cnt != 0) { //사고이력 있으면
                $detail_info = CarDetail::join('tb_accident', 'tb_car_detail.car_id', '=', 'tb_accident.car_id')
                    -> where('tb_car_detail.car_id', $id) -> first();

                return view('cars.carDetail', ['detail_info' => $detail_info]);
            }
            else if($accident_cnt == 0) { //사고이력 없으면
                $detail_info = CarDetail::where('car_id', $id) -> first();
                return view('cars.carDetail', ['detail_info' => $detail_info]);
            }

        }
        else if ($car_cnt == 0) {
            return redirect('/car/carDetailEnroll/'.$id) -> with('alert','해당 차의 상세정보를 등록해주세요.');
        }

    }

    // 자동차 디테일 등록 페이지
    public function enrollCarDetail($car_id)
    {
        return view('cars.carDetailEnroll', ['car_id' => $car_id]);
    }

    /**
     *  등록페이지에서 등록 눌렀을때
     */
    public function insertCarDetail(Request $request)
    {
        try {
            $car_detail = new CarDetail();
            $car_detail -> insertCarDetail($request);
            $result = $car_detail -> save();
            if(!$result) return redirect('/')->with('alert','저장에 실패했습니다.');
        } catch(Throwable $e) {
            dd($e->getMessage());
        }

        return redirect('/car/list/'.$request->car_id.'/detail') -> with('alert','등록이 완료되었습니다.');
    }





}
