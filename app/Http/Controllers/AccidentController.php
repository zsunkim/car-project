<?php

namespace App\Http\Controllers;

use App\Models\Accident;
use App\Models\CarDetail;
use Illuminate\Support\Facades\DB;

class AccidentController extends Controller
{

    // 사고이력 등록 페이지
    public function enrollAccident($car_id)
    {
        return view('cars.accident', compact('car_id'));
    }

    /**
     *  사고 등록
     */
    public function insertAccident()
    {
        $accident = new Accident();
        $accident -> car_id = request('car_id');
        $accident -> accident_status = request('accident_status');
        $accident -> save();

        // return view('cars.carDetail', ['detail_info' => $detail_info]);
        return redirect() -> route('cars.carDetail', ['car_id' => request('car_id')]) -> with('alert','등록이 완료되었습니다.');

    }
}
