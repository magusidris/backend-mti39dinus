<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//group route with prefix "web"
Route::prefix('web')->group(function () {

    Route::get('/mahasiswa', [App\Http\Controllers\Api\Web\MahasiswaController::class, 'show']);
    Route::post('/ktmphoto', [App\Http\Controllers\Api\Web\KtmPhotoController::class, 'store']);
    Route::post('/kumpuldm', [App\Http\Controllers\Api\Web\KumpulDMController::class, 'store']);
    Route::post('/kumpulip', [App\Http\Controllers\Api\Web\KumpulIPController::class, 'store']);
    Route::post('/kumpulir', [App\Http\Controllers\Api\Web\KumpulIRController::class, 'store']);
});
