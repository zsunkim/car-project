<?php

namespace App\Http\Controllers;

use App\Models\Accident;
use Exception;
use Illuminate\Http\Request;
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
            $accident->converterAccident($request);
            $result = $accident->save();

            if (!$result) throw new Exception("등록을 실패했습니다.");
        } catch(Throwable $e) {
            return redirect('/')->with('alert', $e->getMessage());
            // dd($e->getMessage());
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
