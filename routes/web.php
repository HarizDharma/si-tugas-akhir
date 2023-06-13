<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AkademikController;
use App\Http\Controllers\PanitiaController;


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

//index halaman login
Route::get('/', [AuthController::class, 'index'])->name('auth');

//login action form
Route::post('/', [AuthController::class, 'login'])->name('login');

//logout action button
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Route::group(['middleware' => 'role:akademik'], function () {
//    // Rute yang hanya bisa diakses oleh pengguna dengan peran "akademik"
//    //
//    Route::get('/dashboard', [\App\Http\Controllers\AkademikController::class, 'dashboard']);
//});
//
//Route::group(['middleware' => 'role:mahasiswa'], function () {
//    // Rute yang hanya bisa diakses oleh pengguna dengan peran "Mahasiswa"
//
//    Route::get('/mahasiswa', [\App\Http\Controllers\MahasiswaController::class, 'mahasiswa']);
//});


