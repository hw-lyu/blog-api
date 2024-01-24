<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Member\V1\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1/member/', 'as' => 'api.v1.member.'], function () {
    Route::post('login', [AuthController::class, "login"])->name('login');
    Route::post('logout', [AuthController::class, "logout"])->name('logout');
    Route::post('refresh', [AuthController::class, "refresh"])->name('refresh');
    Route::post('me', [AuthController::class, "me"])->name('me');
});
