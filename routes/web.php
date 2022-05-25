<?php

use Illuminate\Support\Facades\Route;

  
use App\Http\Controllers\Auth\AuthController; 
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

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['role'])->group(function () {
    Route::resource('bts', BtsController::class);
	Route::resource('fotos', FotoController::class);
	Route::resource('jenis', JenisController::class);
	Route::resource('kondisis', KondisiController::class);
	Route::resource('konfigurasis', KonfigurasiController::class);
	Route::resource('kuesioners', KuesionerController::class);
	Route::resource('kuesionerJawabans', KuesionerJawabanController::class);
	Route::resource('kuesionerPilihans', KuesionerPilihanController::class);
	Route::resource('pemiliks', PemilikController::class);
	Route::resource('wilayahs', WilayahController::class);
	Route::resource('users', UserController::class);
	Route::post('/monitoring/generate', [App\Http\Controllers\MonitoringController::class, 'generateKunjungan']);
	Route::resource('monitorings', MonitoringController::class, ['only' => ['create','edit']]);
});

	Route::post('/monitoring/survey', [App\Http\Controllers\MonitoringController::class, 'storeSurvey']);
	Route::get('/monitoring/survey/{id}', [App\Http\Controllers\MonitoringController::class, 'createSurvey']);
	Route::resource('monitorings', MonitoringController::class, ['except' => ['create','edit']]);

	Route::get('login', [AuthController::class, 'index'])->name('login');
	Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
	Route::get('registration', [AuthController::class, 'registration'])->name('register');
	Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
	Route::get('dashboard', [AuthController::class, 'dashboard']); 
	Route::post('logout', [AuthController::class, 'logout'])->name('logout');
	Route::get('change-password', 'ChangePasswordController@index');
	Route::post('change-password', 'ChangePasswordController@store')->name('change.password');