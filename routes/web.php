<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// route;;group -> /cars
// 시작 화면 - 소유자 입력
Route::get('/', 'CarController@search');

Route::group(['prefix' => '/car'], function () {
    // 소유자 입력 시
    Route::post('/list', 'CarController@getOwner');

    // 자동차 디테일 출력 페이지
    Route::get('/list/{car_id}/detail', 'CarDetailController@getCarDetail');

    // 자동차 등록 페이지
    Route::get('/carEnroll', 'CarController@enrollCar');
    // 자동차 등록 클릭
    Route::post('/carEnroll', 'CarController@insertCar');

    // 자동차 디테일 등록 페이지
    Route::get('/carDetailEnroll/{car_id}', 'CarDetailController@enrollCarDetail');
    // 자동차 디테일 등록 클릭
    Route::post('/carDetailEnroll', 'CarDetailController@insertCarDetail');

    // 자동차 사고 등록 페이지
    Route::get('/{car_id}/accident', 'AccidentController@enrollAccident');
    // 자동차 사고 등록 클릭
    Route::post('/{car_id}/accident', 'AccidentController@insertAccident');

    // 자동차 사고 확인 페이지
    Route::get('/{car_id}/accident/status', 'AccidentController@accidentDetail');

});

