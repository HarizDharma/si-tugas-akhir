<?php

use App\Http\Controllers\AuthController;
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
//Route::get('user', [\App\Http\Controllers\TestEloquentController::class, 'getUser'])->name('api.user.penjaga');
//

Route::post('/login', [AuthController::class, 'login'])->name('api.login');
Route::middleware('auth:sanctum')
    ->post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])
    ->name('api.logout');


//Route::middleware('auth:sanctum')->group(function () {
//    Route::apiResource('tamu', TamuController::class)->names([
//        'index' => 'api.tamu.index',
//        'show' => 'api.tamu.show',
//        'store' => 'api.tamu.store',
//        'update' => 'api.tamu.update',
//        'destroy' => 'api.tamu.destroy',
//    ]);
//
//    Route::apiResource('plat', PlatNomorController::class)->names([
//        'index' => 'api.plat.index',
//        'show' => 'api.plat.show',
//        'store' => 'api.plat.store',
//        'update' => 'api.plat.update',
//        'destroy' => 'api.plat.destroy',
//    ]);
//
//    Route::apiResource('penjaga', PenjagaController::class)->names([
//        'index' => 'api.penjaga.index',
//        'show' => 'api.penjaga.show',
//        'store' => 'api.penjaga.store',
//        'update' => 'api.penjaga.update',
//        'destroy' => 'api.penjaga.destroy',
//    ]);
//
//    Route::apiResource('penghuni', PenghuniController::class)->names([
//        'index' => 'api.penghuni.index',
//        'show' => 'api.penghuni.show',
//        'store' => 'api.penghuni.store',
//        'update' => 'api.penghuni.update',
//        'destroy' => 'api.penghuni.destroy',
//    ]);
//
//    Route::apiResource('sensor', SensorController::class)->names([
//        'index' => 'api.sensor.index',
//        'show' => 'api.sensor.show',
//        'store' => 'api.sensor.store',
//        'update' => 'api.sensor.update',
//        'destroy' => 'api.sensor.destroy',
//    ]);
//
//    Route::apiResource('control', ControlController::class)->names([
//        'index' => 'api.control.index',
//        'show' => 'api.control.show',
//        'store' => 'api.control.store',
//        'update' => 'api.control.update',
//        'destroy' => 'api.control.destroy',
//    ]);
//
//});
