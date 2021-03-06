<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Core\Auth\UserController;
use App\Http\Controllers\Core\Auth\TestController;
use App\Http\Controllers\DealController;
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

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
     
Route::middleware('auth:api')->group( function () {
    Route::get('deals', [DealController::class, 'getDeals']);
    Route::post('deals', [DealController::class, 'store']);
});
