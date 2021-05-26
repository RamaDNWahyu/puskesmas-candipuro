<?php

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

Route::middleware(['auth'])->group(function () {
    Route::get('profile', 'UsersController@showProfile');
    Route::put('profile', 'UsersController@updateProfile');
    Route::get('/', 'HomeController@index');
});

Route::middleware(['auth', 'check.lengkap'])->group(function () {
    Route::get('daftar-kunjungan-kia', 'Berobat\CRUDController@daftarKunjungan');
    AdvancedRoute::controllers([
        'pasien' => Pasien\CRUDController::class,
        'obat' => Obat\CRUDController::class,
        'berobat' => Berobat\CRUDController::class,
        'laporan' => Laporan\CRUDController::class,
        'hasil-pemeriksaan' => HasilPemeriksaan\CRUDController::class,
        'rekam-medis' => RekamMedis\CRUDController::class,
        'mtbs' => MTBS\CRUDController::class,
    ]);

});


Auth::routes();
