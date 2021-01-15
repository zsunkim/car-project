<?php

namespace App\Http\Controllers;

use App\Models\Accident;
use App\Models\CarDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class AccidentController extends Controller
{

    // 사고이력 등록 페이지 이동
    public function enrollAccident($car_id)
    {
        $view = view('cars.accident');
        $view->car_id = $car_id;
        return $view;
    }

    /**
     *  사고 등록
     */
    public function insertAccident(Request $request)
    {
        try {
            $accident = new Accident();
            $accident -> insertAccident($request);
            $result = $accident -> save();
            if (!$result) return redirect('/')->with('alert', '등록이 실패했습니다.');
        } catch(Throwable $e) {
            dd($e->getMessage());
        }

        return redirect('/car/list/'.$request->car_id.'/detail') -> with('alert','등록이 완료되었습니다.');
    }

    public function accidentDetail($car_id)
    {
        $accident_info = Accident::where('car_id', $car_id)->get();
        $view = view('cars.accidentDetail');
        $view->accident_info = $accident_info;
        $view->car_id = $car_id;
        return $view;
    }



}
