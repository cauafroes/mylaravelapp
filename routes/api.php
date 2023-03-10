<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpoUserController;

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

Route::controller(ExpoUserController::class)->group(function () {
    Route::get('/user', 'index');
    Route::post('/user/notify', 'notify');
    Route::post('/user', 'store');
});

// Route::group(['prefix' => 'user'], function () {
//     Route::post('/setpushtoken', [ExpoUserController::class, 'setPushToken']);
// });
