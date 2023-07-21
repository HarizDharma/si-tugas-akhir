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
Route::get('/datamahasiswa', [WebAkademikController::class, 'datamahasiswa'])->name('datamahasiswaakademik');
//tambahMahasiswa
Route::post('/datamahasiswa', [WebAkademikController::class, 'tambahMahasiswa'])->name('tambahMahasiswa');
//updateMahasiswa
Route::put('/datamahasiswa/{id}', [WebAkademikController::class, 'updateMahasiswa'])->name('updateMahasiswa');
//deleteMahasiswa
Route::delete('/datamahasiswa/{id}', [WebAkademikController::class, 'deleteMahasiswa'])->name('deleteMahasiswa');

//Data Verifikasi Mahasiswa
Route::get('/dataverifikasimahasiswa', [WebAkademikController::class, 'dataverifikasimahasiswa'])->name('dataverifikasimahasiswa');
//Action Verifikasi Mahasiswa
Route::post('/dataverifikasimahasiswa/{id}', [WebAkademikController::class, 'verifikasimahasiswa'])->name('verifikasimahasiswa');

//Data Gagal Sidang Mahasiswa
Route::get('/datagagalsidang', [WebAkademikController::class, 'datagagalsidang'])->name('datagagalsidang');

//Data Lolos Sidang Mahasiswa
Route::get('/datalolossidang', [WebAkademikController::class, 'datalolossidang'])->name('datalolossidang');

//Data Pengambilan Ijazah Mahasiswa
Route::get('/pengambilanijazah', [WebAkademikController::class, 'datapengambilanijazah'])->name('datapengambilanijazah');
//Action jadwal pengambilan ijazah Mahasiswa
Route::post('/pengambilanijazah/{id}', [WebAkademikController::class, 'pengambilanijazah'])->name('pengambilanijazah');

//Dashboard Panitia
Route::get('/panitia', [WebPanitiaController::class, 'index'])->name('panitia');
Route::get('/datakonfirmasi', [WebPanitiaController::class, 'konfirmasipanitia'])->name('konfirmasipanitia');
Route::get('/mahasiswalolos', [WebPanitiaController::class, 'mahasiswalolos'])->name('datamahasiswalolos');
Route::get('/datamahasiswapanitia', [WebPanitiaController::class, 'datamahasiswa'])->name('datamahasiswapanitia');

//jadwal tahap sidang
Route::get('/jadwalsidang', [WebPanitiaController::class, 'jadwalsidang'])->name('jadwalsidang');
//Panitia lihat maahsiswa yang gagal sidang
Route::get('/gagalsidang', [WebPanitiaController::class, 'gagalsidang'])->name('panitiagagalsidang');


//Dashboard Mahasiswa
Route::get('/mahasiswa', [WebMahasiswaController::class, 'index'])->name('mahasiswa');
//get halaman pendaftaran sidang
Route::get('/pendaftaranmahasiswa', [WebMahasiswaController::class, 'pendaftaranmahasiswa'])->name('pendaftaranmahasiswa');
//get halaman form bebas tanggungan
Route::get('/formbebastanggungan', [WebMahasiswaController::class, 'bebastanggungan'])->name('bebastanggungan');
