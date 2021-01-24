<?php

namespace App\Http\Controllers;

use App\Models\Accident;
use App\Models\Car;
use App\Models\CarDetail;
use App\Objects\CarObj;
use Exception;
use Illuminate\Http\Request;
use Throwable;

class CarDetailController extends Controller
{
    /**
     *  tb_car 테이블의 car_id로 tb_car_detail의 목록 출력
     */
    public function getCarDetail($id) // getDetailList
    {
        $car_obj = new CarObj();
        $car_cnt = $car_obj->getCarDetailCnt($id);

        if ($car_cnt != 0) {
            $accident_cnt = $car_obj->getAccidentCnt($id);

            if($accident_cnt != 0) { //사고이력 있으면
                $detail_info = $car_obj->getDetailAccident($id);
                return view('cars.carDetail', ['detail_info' => $detail_info]);
            }
            else if($accident_cnt == 0) { //사고이력 없으면
                $detail_info = $car_obj->getCarDetail($id);
                return view('cars.carDetail', ['detail_info' => $detail_info]);
            }

        }
        else if ($car_cnt == 0) {
            return redirect('/car/insertCarDetail/'.$id) -> with('alert','해당 차의 상세정보를 등록해주세요.');
        }

    }

    // 자동차 디테일 등록 페이지
    public function createCarDetail($car_id)
    {
        return view('cars.insertCarDetail', ['car_id' => $car_id]);
    }

    /**
     *  등록페이지에서 등록 눌렀을때
     */
    public function insertCarDetail(Request $request)
    {
        try {
            $car_detail = new CarDetail();
            $car_detail -> converterCarDetail($request);
            $result = $car_detail -> save();
            if(!$result) throw new Exception('저장에 실패했습니다.');
        } catch(Throwable $e) {
            return redirect('/')->with('alert', $e->getMessage());
            // dd($e->getMessage());
        }

        return redirect('/car/list/'.$request->car_id.'/detail') -> with('alert','등록이 완료되었습니다.');
    }





}
