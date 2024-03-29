<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DataekskulController;
use App\Http\Controllers\DataeventController;
use App\Http\Controllers\DatalatihanController;
use App\Http\Controllers\DatapembinaController;
use App\Http\Controllers\DataprestasiController;
use App\Http\Controllers\ManageuserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Auth;
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
    return view('frontend');
});

   // Route::resource('/frontend', FrontendController::class);
Route::get('/', [FrontendController::class, 'index']);
Route::get('/show/{id}', [FrontendController::class, 'show']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'ceklevel:Administrator,Pembina'])->group(function () {
    Route::resource('/dataevent', DataeventController::class);
    Route::resource('/dataprestasi', DataprestasiController::class);
    Route::resource('/datalatihan', DatalatihanController::class);

    // ---------------Route Export Import Excel Data Event-------------------//
    Route::get('/exportevent', [DataeventController::class, 'EventExport'])->name('exportevent');
    
    // ---------------Manage Profil-------------------//
    Route::get('/user/profile/{id}', [HomeController::class, 'userProfile'])->name('user.profile');
    Route::get('/user/profile/edit/{id}',[HomeController::class, 'editUserProfile'])->name('user.profile.edit');
    Route::put('/user/profile/update/{id}',[HomeController::class, 'updateUserProfile'])->name('user.profile.update');

    // ---------------Route Laporan-------------------//
    Route::get('laporan/index', [LaporanController::class, 'index'])->name('laporan.index');
    Route::post('laporan/select', [LaporanController::class, 'getData'])->name('laporan.select');
});

Route::middleware(['auth', 'ceklevel:Administrator'])->group(function () {
    Route::resource('/dataekskul', DataekskulController::class);
    Route::resource('/datapembina', DatapembinaController::class);
    
    // ---------------Manage User-------------------//
    Route::get('/manageuser', [ManageuserController::class, 'index'])->name('usermanage.index');
    Route::get('/manageuser/create', [ManageuserController::class, 'create'])->name('usermanage.create');
    Route::post('/manageuser/store', [ManageuserController::class, 'store'])->name('usermanage.store');
    Route::get('/manageuser/edit/{id}', [ManageuserController::class, 'edit'])->name('usermanageEdit');
    Route::put('/manageuser/update/{id}', [ManageuserController::class, 'update'])->name('usermanage.update');
    Route::get('/manageuser/delete/{id}', [ManageuserController::class, 'destroy'])->name('usermanage.destroy');
});

// Route::middleware(['auth', 'CekLevel:Administrator,Pembina'])->group(function () {

// });