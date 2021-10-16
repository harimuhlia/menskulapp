<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataekskulController;
use App\Http\Controllers\DataeventController;
use App\Http\Controllers\DataprestasiController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('Dashboard');
Route::resource('/dataekskul', DataekskulController::class);
Route::resource('/dataevent', DataeventController::class);
Route::resource('/dataprestasi', DataprestasiController::class);
