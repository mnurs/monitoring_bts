<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('bts', BtsAPIController::class);


Route::resource('fotos', FotoAPIController::class);


Route::resource('jenis', JenisAPIController::class);


Route::resource('kondisis', KondisiAPIController::class);


Route::resource('konfigurasis', KonfigurasiAPIController::class);


Route::resource('kuesioners', KuesionerAPIController::class);


Route::resource('kuesioner_jawabans', KuesionerJawabanAPIController::class);


Route::resource('kuesioner_pilihans', KuesionerPilihanAPIController::class);


Route::resource('monitorings', MonitoringAPIController::class);


Route::resource('pemiliks', PemilikAPIController::class);


Route::resource('wilayahs', WilayahAPIController::class);


Route::resource('users', UserAPIController::class);
