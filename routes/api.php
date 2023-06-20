<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiAkademikController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('user', [\App\Http\Controllers\TestEloquentController::class, 'getUser'])->name('api.user.penjaga');
//

Route::post('/login', [ApiAuthController::class, 'login'])->name('api.login');
Route::middleware('auth:sanctum')
    ->post('/logout', [ApiAuthController::class, 'logout'])
    ->name('api.logout');


//
Route::middleware('auth:sanctum')->group(function () {
    //  api/mahasiswa
    // TODO : API RESOURCES MAHASISWA
    Route::apiResource('mahasiswa', ApiAkademikController::class)->names([
        'index' => 'api.mahasiswa.index',
        'show' => 'api.mahasiswa.show',
        'store' => 'api.mahasiswa.store',
        'update' => 'api.mahasiswa.update',
        'destroy' => 'api.mahasiswa.destroy',
    ]);
    //  api/akademik
    Route::apiResource('akademik', ApiAkademikController::class)->names([
        'index' => 'api.akademik.index',
        'show' => 'api.akademik.show',
        'store' => 'api.akademik.store',
        'update' => 'api.akademik.update',
        'destroy' => 'api.akademik.destroy',
    ]);

    Route::apiResource('panitia', ApiAkademikController::class)->names([
        'index' => 'api.panitia.index',
        'show' => 'api.panitia.show',
        'store' => 'api.panitia.store',
        'update' => 'api.panitia.update',
        'destroy' => 'api.panitia.destroy',
    ]);


});
