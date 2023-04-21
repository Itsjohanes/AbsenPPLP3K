<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruP3KController;
use App\Http\Controllers\GuruP3KAbsenController;
use App\Http\Controllers\GuruPPLController;
use App\Http\Controllers\GuruPPLAbsenController;
use App\Http\Controllers\LaporanAbsenController;
use App\Http\Controllers\KoordinatSekolahController;

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

Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth', 'ceklevel:admin,guru_p3k,guru_ppl']], function () {

    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

    Route::resource('admin', AdminController::class);

    Route::resource('kepala-sekolah', KepalaSekolahController::class);

    Route::resource('guru-p3k', GuruP3KController::class);

    Route::resource('guru-ppl', GuruPPLController::class);
});

Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {

    Route::resource('admin', AdminController::class);


    Route::resource('guru-p3k', GuruP3KController::class);

    Route::resource('guru-ppl', GuruPPLController::class);

    Route::get('/laporan-absensi-p3k', [LaporanAbsenController::class, 'laporanP3K']);
    Route::get('/filter-p3k/{tglawal}/{tglakhir}', [LaporanAbsenController::class, 'filterP3K']);
    Route::get('/cetak-p3k/{data1}/{data2}', [LaporanAbsenController::class, 'cetakP3K']);

    Route::get('laporan-absensi-ppl', [LaporanAbsenController::class, 'laporanPPL']);
    Route::get('/filter-ppl/{tglawal}/{tglakhir}', [LaporanAbsenController::class, 'filterPPL']);
    Route::get('/cetak-ppl/{data1}/{data2}', [LaporanAbsenController::class, 'cetakPPL']);

    Route::get('lokasi-sekolah', [KoordinatSekolahController::class, 'index']);
    Route::post('ubah-koordinat', [KoordinatSekolahController::class, 'update']);
});


Route::group(['middleware' => ['auth', 'ceklevel:guru_p3k']], function () {

    Route::resource('absen-guru-p3k', GuruP3KAbsenController::class);
    Route::post('absen-guru-p3k-keluar', [GuruP3KAbsenController::class, 'absenKeluar'])->name('absen-p3k-keluar');
});

Route::group(['middleware' => ['auth', 'ceklevel:guru_ppl']], function () {

    Route::resource('absen-guru-ppl', GuruPPLAbsenController::class);
    Route::post('absen-guru-ppl-keluar', [GuruPPLAbsenController::class, 'absenKeluar'])->name('absen-ppl-keluar');
});

Route::group(['middleware' => ['auth', 'ceklevel:guru_p3k,guru_ppl']], function () {

    Route::view('lokasi-anda', 'pages.lokasi.lokasi-anda');
});
