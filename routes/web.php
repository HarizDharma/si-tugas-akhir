<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\WebAuthController;
use App\Http\Controllers\Web\WebAkademikController;
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
Route::get('/', [WebAuthController::class, 'index'])->name('auth');
//login action form
Route::post('/', [WebAuthController::class, 'login'])->name('login');
//logout action button
Route::post('/logout', [WebAuthController::class, 'logout'])->name('logout');

//Dashboard Akademik
Route::get('/akademik', [WebAkademikController::class, 'index'])->name('akademik');
//Profil akademik
Route::get('/akademik/profile', [WebAkademikController::class, 'profile'])->name('profileakademik');
//Profil akademik.update
Route::post('/akademik/profile', [WebAkademikController::class, 'profileUpdate'])->name('profileakademik.update');



