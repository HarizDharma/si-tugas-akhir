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
Route::get('user', [\App\Http\Controllers\TestEloquentController::class, 'getUser'])->name('api.user.penjaga');
//

Route::post('/login', [App\Http\Controllers\Api\ApiAuthController::class, 'login'])->name('api.login');
Route::middleware('auth:sanctum')
    ->post('/logout', [App\Http\Controllers\Api\ApiAuthController::class, 'logout'])
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
//
//
//});
