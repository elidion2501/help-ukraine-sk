<?php

use App\Http\Controllers\Api\v1\Auth\AuthApiController;
use App\Http\Controllers\Api\v1\Car\CarApiController;
use App\Http\Controllers\Api\v1\City\CityApiController;
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
Route::prefix('auth')->group(function () {
    Route::post('/signUp', [AuthApiController::class, 'signUp']);
    Route::post('/login', [AuthApiController::class, 'login']);
});
Route::post('/car', [CarApiController::class, 'store']);
Route::get('/car', [CarApiController::class, 'index']);

Route::get('/cities', [CityApiController::class, 'index']);
