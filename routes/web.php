<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\HostController;
use App\Http\Controllers\gmvController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\StatistikController;

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
})->name('welcome');

Route::get('/', [WelcomeController::class, 'dataDashboard'])->name('welcome');

Route::get('/Host', [HostController::class, 'index'])->name('host.index');
Route::post('/host/store', [HostController::class, 'store'])->name('host.store');
Route::put('/host/{id}', [HostController::class, 'update'])->name('host.update');
Route::get('/host/{id}/edit', [HostController::class, 'edit'])->name('host.edit');
Route::delete('/host/{id}', [HostController::class, 'destroy'])->name('host.destroy');
Route::put('/host/{id}/photo', [HostController::class, 'updatePhoto'])->name('host.updatePhoto');
Route::delete('/host/{id}/photo', [HostController::class, 'deletePhoto'])->name('host.deletePhoto');
Route::put('/host/{id}', [HostController::class, 'update'])->name('host.update');


Route::get('/GMV', [gmvController::class, 'index'])->name('gmv.index');
Route::post('/GMV/store', [gmvController::class, 'store'])->name('gmv.store');
Route::delete('/GMV/{id_gmv}', [gmvController::class, 'destroy'])->name('gmv.destroy');
Route::get('/gmv/{id}/sekarang', [gmvController::class, 'gmvSekarang'])->name('gmv.sekarang');
Route::get('/gmv/{id}/edit', [gmvController::class, 'edit'])->name('gmv.edit');
Route::post('/gmv/{id}/tambahGmv', [gmvController::class, 'tambahGmv'])->name('gmv.tambah');
Route::put('/gmv/{id}', [gmvController::class, 'update'])->name('gmv.update');

Route::get('/Absen', [AbsenController::class, 'index'])->name('absen.index');
Route::get('/Absen/edit', [AbsenController::class, 'halamanEdit'])->name('absen.halamanEdit');
Route::post('/Absen/Hadir', [AbsenController::class, 'createDataHadir'])->name('Absen.addHadir');
Route::post('/Absen/Alfa', [AbsenController::class, 'createDataAlfa'])->name('Absen.addAlfa');
Route::post('/Absen/Libur', [AbsenController::class, 'createDataLibur'])->name('Absen.addLibur');
Route::get('/Absen/{id}/edit', [AbsenController::class, 'edit'])->name('absen.edit');
Route::delete('/Absen/{id}/hapus', [AbsenController::class, 'destroy'])->name('absen.destroy');
Route::get('/absen/filter/{id_host}', [AbsenController::class, 'filter'])->name('absen.filter');

Route::get('/Gaji', [GajiController::class, 'index'])->name('gaji.index');
Route::get('/Gaji/{id}/pembayaran', [GajiController::class, 'edit'])->name('gaji.halamanBayar');
Route::get('/gaji/cetak/{id}', [GajiController::class, 'cetakPDF'])->name('gaji.cetak');
Route::get('/Gaji/komisi', [GajiController::class, 'komisi'])->name('gaji.komisi');

Route::get('/Statistik', [StatistikController::class, 'index'])->name('statistik.index');