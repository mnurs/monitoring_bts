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


Route::resource('bts', BtsController::class);


Route::resource('fotos', FotoController::class);


Route::resource('jenis', JenisController::class);


Route::resource('kondisis', KondisiController::class);


Route::resource('konfigurasis', KonfigurasiController::class);


Route::resource('kuesioners', KuesionerController::class);


Route::resource('kuesionerJawabans', KuesionerJawabanController::class);


Route::resource('kuesionerPilihans', KuesionerPilihanController::class);


Route::resource('monitorings', MonitoringController::class);


Route::resource('pemiliks', PemilikController::class);


Route::resource('wilayahs', WilayahController::class);


Route::resource('users', App\Http\Controllers\UserController::class);
