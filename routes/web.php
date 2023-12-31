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


//Data Lolos Sidang Mahasiswa Akademik
Route::get('/datalolossidangakademik', [WebAkademikController::class, 'datalolossidang'])->name('datalolossidangakademik');
//Action Verifikasi Mahasiswa Akademik
Route::post('/dataverifikasimahasiswaakademik/{id}', [WebAkademikController::class, 'verifikasimahasiswa'])->name('verifikasimahasiswaakademik');


//Data Pengambilan Ijazah Mahasiswa
Route::get('/pengambilanijazah', [WebAkademikController::class, 'datapengambilanijazah'])->name('datapengambilanijazah');
//Action jadwal pengambilan ijazah Mahasiswa
Route::put('/pengambilanijazah/{id}', [WebAkademikController::class, 'pengambilanijazah'])->name('pengambilanijazah');
//action delete jadwalijazah
Route::put('/deletejadwalijazah/{id}', [WebAkademikController::class, 'deleteJadwalIjazah'])->name('deletejadwalijazah');



//Ini Dashboard Panitia



//Dashboard Panitia
Route::get('/panitia', [WebPanitiaController::class, 'index'])->name('panitia');


//halaman data mahasiswa dan get all mahasiswa
Route::get('/datamahasiswapanitia', [WebPanitiaController::class, 'datamahasiswa'])->name('datamahasiswapanitia');


//ke halaman data mahasiswa yang sempro di dashboard panitia
Route::get('/datakonfirmasi', [WebPanitiaController::class, 'konfirmasipanitia'])->name('konfirmasipanitia');
//Action Verifikasi Mahasiswa Panitia
Route::post('/dataverifikasimahasiswa/{id}', [WebPanitiaController::class, 'verifikasimahasiswa'])->name('verifikasimahasiswa');


//ke halaman data mahasiswa yang sudah verifikasi panitia sempro di dashboard panitia
Route::get('/dataterverifikasisempro', [WebPanitiaController::class, 'dataterverifikasisempro'])->name('dataterverifikasisempro');
//action untuk tambah hasil sidang
Route::post('/tambahhasilsidang/{id}', [WebPanitiaController::class, 'tambahhasilsidang'])->name('tambahHasilSidangMahasiswa');


//ke halaman data mahasiswa yang gagal sempro
Route::get('/datagagalsempro', [WebPanitiaController::class, 'datagagalsempro'])->name('datagagalsempro');
//action jika hasil sudang sudah ada khusus untuk mahasiswa yang gagalsidang
Route::put('/datagagalsidang/{id}', [WebPanitiaController::class, 'ubahhasilsidang'])->name('ubahHasilSidangMahasiswa');


//ke halaman data mahasiswa yang sudah lolos sempro
Route::get('/mahasiswalolos', [WebPanitiaController::class, 'mahasiswalolos'])->name('datamahasiswalolos');
//Action Verifikasi Mahasiswa Panitia
Route::post('/verifikasisidangakhir/{id}', [WebPanitiaController::class, 'verifikasisidangakhir'])->name('verifikasisidangakhir');


//Data Lolos Sidang Mahasiswa Panitia
Route::get('/datalolossidang', [WebPanitiaController::class, 'datalolossidang'])->name('datalolossidang');
//action untuk tambah hasil sidang
Route::post('/tambahhasilsidangakhir/{id}', [WebPanitiaController::class, 'tambahhasilsidangakhir'])->name('tambahHasilSidangAkhirMahasiswa');


//Data Gagal Sidang Akhir Mahasiswa
Route::get('/datagagalsidang', [WebPanitiaController::class, 'datagagalsidang'])->name('datagagalsidang');
//action untuk tambah hasil sidang
Route::put('/ubahhasilsidangakhir/{id}', [WebPanitiaController::class, 'ubahhasilsidangakhir'])->name('ubahHasilSidangAkhirMahasiswa');


//Data Sudah Sidang Akhir Mahasiswa
Route::get('/datasudahsidangakhir', [WebPanitiaController::class, 'datasudahsidangakhir'])->name('datasudahsidangakhir');


//action jika mau atur ulangjadwal sidang
Route::put('/jadwalsidangulang/{id}', [WebPanitiaController::class, 'ubahJadwalSidang'])->name('ubahJadwalSidang');


//atur jadwal sidang pada halaman data lolos sempro
Route::put('/updateMahasiswaJadwalSidang/{idMhs}', [WebPanitiaController::class, 'updateMahasiswaJadwalSidang'])->name('updateMahasiswaJadwalSidang');



//action untuk ubah status mahasiswa di halaman lolos sempro
Route::put('/editstatusmahasiswa/{id}', [WebPanitiaController::class, 'editstatusmahasiswa'])->name('editStatusMahasiswa');


//jadwal tahap sidang
Route::get('/jadwalsidang', [WebPanitiaController::class, 'jadwalsidang'])->name('jadwalsidang');
Route::put('/jadwalsidang/{id}', [WebPanitiaController::class, 'updateJadwalSidang'])->name('update.jadwalsidang');



//Ini Dashboard Mahasiswa




//Dashboard Mahasiswa
Route::get('/mahasiswa', [WebMahasiswaController::class, 'index'])->name('mahasiswa');


//get halaman pendaftaran sidang
Route::get('/pendaftaransempro', [WebMahasiswaController::class, 'pendaftaransempro'])->name('pendaftaransempro');

//get halaman pendaftaran sidang
Route::get('/pendaftaranmahasiswa', [WebMahasiswaController::class, 'pendaftaranmahasiswa'])->name('pendaftaranmahasiswa');

//get halaman form bebas tanggungan
Route::get('/formbebastanggungan', [WebMahasiswaController::class, 'bebastanggungan'])->name('bebastanggungan');
//upload form pendaftaran
Route::put('/file/{id}', [WebMahasiswaController::class, 'uploadFile'])->name('uploadFile');
Route::put('/fileSempro/{id}', [WebMahasiswaController::class, 'uploadFile_Sempro'])->name('uploadFile_Sempro');

//upload form bebas tanggungan
Route::put('/filebebastanggungan/{id}', [WebMahasiswaController::class, 'uploadFileBebasTanggungan'])->name('uploadFileBebasTanggungan');
