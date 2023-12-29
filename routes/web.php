<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\KeterampilanController;
use App\Http\Controllers\PengetahuanController;
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

    Route::get('/pengetahuan', 'pengetahuan')->name('pengetahuan');
    Route::post('/pengetahuan/create',[PengetahuanController::class, 'create']);
    Route::post('/pengetahuan/{nisn}/edit',[PengetahuanController::class, 'update']);
    Route::get('/pengetahuan/{nisn}/delete',[PengetahuanController::class, 'destroy']);

    Route::get('/keterampilan', 'keterampilan')->name('keterampilan');
    Route::post('/keterampilan/create',[KeterampilanController::class, 'create']);
    Route::post('/keterampilan/{nisn}/edit',[KeterampilanController::class, 'update']);
    Route::get('/keterampilan/{nisn}/delete',[KeterampilanController::class, 'destroy']);
});