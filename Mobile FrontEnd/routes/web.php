<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\BookingController;
use App\Http\Controllers\Backend\LapanganController;
use App\Http\Controllers\Backend\LaporanController;
use App\Http\Controllers\Backend\RekeningController;
use App\Http\Controllers\Backend\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Akses Halaman Dashboard
Route::get('/', function () {
    return view('dashboard.index',[
        'title' => 'Dashboard'
    ]);
})->middleware('auth');

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

//Auth
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

//Back-end Dashboard
Route::resource('/dashboard/users', UserController::class)->middleware('auth');    
Route::resource('/dashboard/lapangans', LapanganController::class)->middleware('auth'); 
Route::resource('/dashboard/rekenings', RekeningController::class)->middleware('auth'); 
Route::resource('/dashboard/bookings', BookingController::class)->middleware('auth'); 
Route::resource('/dashboard/laporans', LaporanController::class)->middleware('auth'); 
