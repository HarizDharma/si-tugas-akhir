<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\WebAuthController;
use App\Http\Controllers\Web\WebAkademikController;
use App\Http\Controllers\Web\WebPanitiaController;
use App\Http\Controllers\Web\WebMahasiswaController;
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
//Data akademik
Route::get('/dataakademik', [WebAkademikController::class, 'dataakademik'])->name('dataakademik');
//tambahAkademik
Route::post('/dataakademik', [WebAkademikController::class, 'tambahAkademik'])->name('tambahAkademik');
//deleteAkademik
Route::delete('/dataakademik/{id}', [WebAkademikController::class, 'deleteAkademik'])->name('deleteAkademik');
//updateAkademik
Route::put('/dataakademik/{id}', [WebAkademikController::class, 'updateAkademik'])->name('updateAkademik');


//Data Panitia
Route::get('/datapanitia', [WebAkademikController::class, 'datapanitia'])->name('datapanitia');
//deletePanitia
Route::delete('/datapanitia/{id}', [WebAkademikController::class, 'deletePanitia'])->name('deletePanitia');
//tambahPanitia
Route::post('/datapanitia', [WebAkademikController::class, 'tambahPanitia'])->name('tambahPanitia');
//updatePanitia
Route::put('/datapanitia/{id}', [WebAkademikController::class, 'updatePanitia'])->name('updatePanitia');


//Data Mahasiswa
Route::get('/datamahasiswa', [WebAkademikController::class, 'datamahasiswa'])->name('datamahasiswa');
//tambahMahasiswa
Route::post('/datamahasiswa', [WebAkademikController::class, 'tambahMahasiswa'])->name('tambahMahasiswa');
//updateMahasiswa
Route::put('/datamahasiswa/{id}', [WebAkademikController::class, 'updateMahasiswa'])->name('updateMahasiswa');
//deleteMahasiswa
Route::delete('/datamahasiswa/{id}', [WebAkademikController::class, 'deleteMahasiswa'])->name('deleteMahasiswa');

//Verifikasi Mahasiswa
Route::get('/verifikasimahasiswa', [WebAkademikController::class, 'verifikasimahasiswa'])->name('verifikasimahasiswa');

//Dashboard Panitia
Route::get('/panitia', [WebPanitiaController::class, 'index'])->name('panitia');
Route::get('/datakonfirmasi', [WebPanitiaController::class, 'konfirmasipanitia'])->name('konfirmasipanitia');
Route::get('/mahasiswalolos', [WebPanitiaController::class, 'mahasiswalolos'])->name('datamahasiswalolos');


//Dashboard Mahasiswa
Route::get('/mahasiswa', [WebMahasiswaController::class, 'index'])->name('mahasiswa');
