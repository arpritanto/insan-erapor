<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\KeterampilanController;
use App\Http\Controllers\PenBindoController;
use App\Http\Controllers\PengetahuanController;
use App\Http\Controllers\PenIpaController;
use App\Http\Controllers\PenIpsController;
use App\Http\Controllers\PenMatController;
use App\Http\Controllers\PenPaiController;
use App\Http\Controllers\PenPjokController;
use App\Http\Controllers\PenPpknController;
use App\Http\Controllers\PenSbdpController;
use App\Http\Controllers\SiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('formketerampilan.index');
// });
// Route::get('login', function () {
//     return view('auth.login');
// });
// Route::get('formketerampilan', function () {
//     return view('formketerampilan.index');
// });
// Route::get('formpengetahuan', function () {
//     return view('formpengetahuan.index');
// });
// Route::get('logout', function (){
//     Auth::logout();
//     return redirect('login');
// });
Route::get('/',[LoginRegisterController::class, 'login'])->name('login');

Route::post('/register',[LoginRegisterController::class, 'register'])->name('register');

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::get('/register/{id}/delete', [LoginRegisterController::class, 'destroy']);
    Route::post('/register/{id}/update', [LoginRegisterController::class, 'update']);

    Route::get('/register2', 'register2')->name('register2');

    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');

    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/dashboard/create',[SiswaController::class, 'create']);
    Route::post('/dashboard/{nisn}/edit',[SiswaController::class, 'update']);
    Route::get('/dashboard/{nisn}/delete',[SiswaController::class, 'destroy']);

    // Route::get('/pengetahuan/{matpel}', 'pengetahuan')->name('pengetahuan');
    // Route::post('/pengetahuan/create',[PengetahuanController::class, 'create']);
    // Route::post('/pengetahuan/{nisn}/edit',[PengetahuanController::class, 'update']);
    // Route::get('/pengetahuan/{nisn}/delete',[PengetahuanController::class, 'destroy']);

    // Route::get('/keterampilan', 'keterampilan')->name('keterampilan');
    // Route::post('/keterampilan/create',[KeterampilanController::class, 'create']);
    // Route::post('/keterampilan/{nisn}/edit',[KeterampilanController::class, 'update']);
    // Route::get('/keterampilan/{nisn}/delete',[KeterampilanController::class, 'destroy']);

    # PAI
    Route::get('/pengetahuan_pai',[PenPaiController::class, 'get']);
    Route::post('/pengetahuan_pai/create',[PenPaiController::class, 'create']);
    Route::post('/pengetahuan_pai/{id}/edit',[PenPaiController::class, 'update']);
    Route::get('/pengetahuan_pai/{id}/delete',[PenPaiController::class, 'destroy']);

    #PPKN
    Route::get('/pengetahuan_ppkn',[PenPpknController::class, 'get']);
    Route::post('/pengetahuan_ppkn/create',[PenPpknController::class, 'create']);
    Route::post('/pengetahuan_ppkn/{id}/edit',[PenPpknController::class, 'update']);
    Route::get('/pengetahuan_ppkn/{id}/delete',[PenPpknController::class, 'destroy']);

    #Bindo
    Route::get('/pengetahuan_bindo',[PenBindoController::class, 'get']);
    Route::post('/pengetahuan_bindo/create',[PenBindoController::class, 'create']);
    Route::post('/pengetahuan_bindo/{id}/edit',[PenBindoController::class, 'update']);
    Route::get('/pengetahuan_bindo/{id}/delete',[PenBindoController::class, 'destroy']);

    #Mat
    Route::get('/pengetahuan_mat',[PenMatController::class, 'get']);
    Route::post('/pengetahuan_mat/create',[PenMatController::class, 'create']);
    Route::post('/pengetahuan_mat/{id}/edit',[PenMatController::class, 'update']);
    Route::get('/pengetahuan_mat/{id}/delete',[PenMatController::class, 'destroy']);

    #Ipa
    Route::get('/pengetahuan_ipa',[PenIpaController::class, 'get']);
    Route::post('/pengetahuan_ipa/create',[PenIpaController::class, 'create']);
    Route::post('/pengetahuan_ipa/{id}/edit',[PenIpaController::class, 'update']);
    Route::get('/pengetahuan_ipa/{id}/delete',[PenIpaController::class, 'destroy']);

    #Ips
    Route::get('/pengetahuan_ips',[PenIpsController::class, 'get']);
    Route::post('/pengetahuan_ips/create',[PenIpsController::class, 'create']);
    Route::post('/pengetahuan_ips/{id}/edit',[PenIpsController::class, 'update']);
    Route::get('/pengetahuan_ips/{id}/delete',[PenIpsController::class, 'destroy']);

    #Sbdp
    Route::get('/pengetahuan_sbdp',[PenSbdpController::class, 'get']);
    Route::post('/pengetahuan_sbdp/create',[PenSbdpController::class, 'create']);
    Route::post('/pengetahuan_sbdp/{id}/edit',[PenSbdpController::class, 'update']);
    Route::get('/pengetahuan_sbdp/{id}/delete',[PenSbdpController::class, 'destroy']);

    #Pjok
    Route::get('/pengetahuan_pjok',[PenPjokController::class, 'get']);
    Route::post('/pengetahuan_pjok/create',[PenPjokController::class, 'create']);
    Route::post('/pengetahuan_pjok/{id}/edit',[PenPjokController::class, 'update']);
    Route::get('/pengetahuan_pjok/{id}/delete',[PenPjokController::class, 'destroy']);

    // Route::get('/gfg/{a}', 'gfg')->name('gfg');
});