<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HikesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('hikes')->group(function () {
    Route::get('/', [HikesController::class, 'index']);
    Route::get('/search', [HikesController::class, 'indexPrev']);

    Route::get('{id}', [HikesController::class, 'show']);


    Route::post('/', [HikesController::class, 'store']);
});
