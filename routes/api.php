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


Route::resource('fotos', App\Http\Controllers\API\FotoAPIController::class);


Route::resource('jenis', App\Http\Controllers\API\JenisAPIController::class);


Route::resource('kondisis', App\Http\Controllers\API\KondisiAPIController::class);


Route::resource('konfigurasis', App\Http\Controllers\API\KonfigurasiAPIController::class);
