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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('bts', App\Http\Controllers\BtsController::class);


Route::resource('fotos', App\Http\Controllers\FotoController::class);


Route::resource('jenis', App\Http\Controllers\JenisController::class);


Route::resource('kondisis', App\Http\Controllers\KondisiController::class);


Route::resource('konfigurasis', App\Http\Controllers\KonfigurasiController::class);


Route::resource('kuesioners', App\Http\Controllers\KuesionerController::class);


Route::resource('kuesionerJawabans', App\Http\Controllers\KuesionerJawabanController::class);


Route::resource('kuesionerPilihans', App\Http\Controllers\KuesionerPilihanController::class);


Route::resource('monitorings', App\Http\Controllers\MonitoringController::class);


Route::resource('pemiliks', App\Http\Controllers\PemilikController::class);
