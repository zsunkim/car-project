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


// 시작 화면 - 소유자 입력
Route::get('/', 'App\Http\Controllers\CarController@search');

// 소유자 입력 시
Route::post('/cars/list', 'App\Http\Controllers\CarController@getOwner');

// 자동차 디테일 출력 페이지
Route::get('/cars/list/{car_id}/detail', 'App\Http\Controllers\CarDetailController@getCarDetail')->name('cars.carDetail');

// 자동차 등록 페이지
Route::get('/cars/carEnroll', 'App\Http\Controllers\CarController@enrollCar')->name('cars.carEnroll');
// 자동차 등록 클릭
Route::post('/cars/carEnroll', 'App\Http\Controllers\CarController@insertCar');

// 자동차 디테일 등록 페이지
Route::get('/cars/carDetailEnroll/{car_id}', 'App\Http\Controllers\CarDetailController@enrollCarDetail')->name('cars.carDetailEnroll');
// 자동차 디테일 등록 클릭
Route::post('/cars/carDetailEnroll', 'App\Http\Controllers\CarDetailController@insertCarDetail');

// 자동차 사고 등록 페이지
Route::get('/cars/{car_id}/accident', 'App\Http\Controllers\AccidentController@enrollAccident');
// 자동차 사고 등록 클릭
Route::post('/cars/{car_id}/accident', 'App\Http\Controllers\AccidentController@insertAccident');
