<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataAlternatifController;
use App\Http\Controllers\DataKriteriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NilaiAlternatifController;
use App\Http\Controllers\NilaiKriteriaController;
use App\Http\Controllers\RegisterController;
use App\Models\DataKriteria;
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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'create']);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/data_kriteria', [DataKriteriaController::class, 'index'])->name('data_kriteria');
    Route::post('/data_kriteria', [DataKriteriaController::class, 'create'])->name('simpan_kriteria');
    Route::resource('data_kriteria', DataKriteriaController::class);

    Route::get('/data_alternatif', [DataAlternatifController::class, 'index'])->name('data_alternatif');
    Route::post('/data_alternatif', [DataAlternatifController::class, 'create'])->name('simpan_alternatif');
});
Route::resource('nilai_kriteria', NilaiKriteriaController::class);
Route::put('nilai_kriteria_update', [NilaiKriteriaController::class, 'update'])->name('nilai_kriteria.update');
Route::get('nilai_kriteria_total', [NilaiKriteriaController::class, 'total_kolom'])->name('nilai_kriteria.totalkolom');
// Route::resource('nilai_alternatif', NilaiAlternatifController::class);
Route::get('nilai_alternatif_kriteria1', [NilaiAlternatifController::class, 'index_1'])->name('nilai_alternatif.kriteria1');
Route::get('nilai_alternatif_kriteria2', [NilaiAlternatifController::class, 'index_2'])->name('nilai_alternatif.kriteria2');
Route::put('nilai_alternatif_update', [NilaiAlternatifController::class, 'update'])->name('nilai_alternatif.update');
