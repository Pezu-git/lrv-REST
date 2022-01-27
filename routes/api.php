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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource(
    '/cars',
    \App\Http\Controllers\CarsController::class
);

Route::post(
    '/api/token/create',
    [\App\Http\Controllers\ApiTokenController::class, 'createToken']
);

Route::get(
    '/api/user',
    [\App\Http\Controllers\UserController::class, 'index']
);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource(
        '/cars',
        \App\Http\Controllers\CarsController::class
    );
});
