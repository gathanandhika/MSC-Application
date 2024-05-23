<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\AuthAPI;
use App\Http\Controllers\API\BookingAPI;
use App\Http\Controllers\API\LapanganAPI as APILapanganAPI;
use App\Http\Controllers\API\LapanganMFAPI;
use App\Http\Controllers\API\RekeningAPI;
use App\Http\Controllers\API\UserAPI;
use App\Http\Controllers\LapanganAPI;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//AuthAPI
Route::post('/registrasi', [AuthAPI::class, 'registrasi']);
Route::post('/login', [AuthAPI::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function() {

    //RekeningAPI
    Route::get('/rekening/get', [RekeningAPI::class, 'rekeninglist']);

    //LapanganAPI
    Route::get('/lapangan/msc1', [LapanganMFAPI::class, 'msc1']);
    Route::get('/lapangan/msc2', [LapanganMFAPI::class, 'msc2']);

    //UserAPI
    Route::get('/user/get', [UserAPI::class, 'profile']);
    Route::get('/user/admin', [UserAPI::class, 'admin']);


    //BokingAPI
    Route::post('/booking/create', [BookingAPI::class, 'store']);
    Route::get('/booking/get', [BookingAPI::class, 'booklist']);
    Route::get('/booking/urbook', [BookingAPI::class, 'urbook']);

    
});

