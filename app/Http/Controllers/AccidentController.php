<?php

namespace App\Http\Controllers;

use App\Models\Accident;
use App\Models\Car;
use App\Objects\CarObj;
use Exception;
use Illuminate\Http\Request;
use Throwable;

class AccidentController extends Controller
{

    // 사고이력 등록 페이지 이동
    public function enrollAccident($car_id)
    {
        return view('cars.accident', ['car_id' => $car_id]);;
    }

    /**
     *  사고 등록
     */
    public function insertAccident(Request $request)
    {
        try {
            $accident = new Accident();
            $this->validate($request, Accident::$rules);
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
        $car_obj = new CarObj();
        $accident_info = $car_obj->getAccident($car_id);
        return view('cars.accidentDetail', ['accident_info' => $accident_info, 'car_id' => $car_id]);
    }



}
