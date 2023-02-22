<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DatVeController;
use App\Http\Controllers\FakeController;
use App\Http\Controllers\NhaGaController;
use App\Http\Controllers\TraCuuDatVeController;
use App\Http\Controllers\TuyenController;
use Illuminate\Support\Facades\Route;


Route::get('/', [TuyenController::class, 'index']);
Route::get('fetch-routes', [TuyenController::class, 'fecthroute']);
Route::get('get-route/{id}', [TuyenController::class, 'getRoute']);
Route::get('get-station/{id}', [NhaGaController::class, 'LayNhaGa']);

Route::get('booking', [BookingController::class, 'index']);
Route::get('fetch-booking', [BookingController::class, 'fetchbooking']);
Route::get('get-bookings/{sdt}', [BookingController::class, 'getbooking']);
Route::post('booking',[BookingController::class, 'store']);


Route::get('check', [TraCuuDatVeController::class, 'index']);


Route::get('/', function () {
    return view('home');
});

