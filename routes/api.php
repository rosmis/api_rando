<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HikesController;
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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('hikes/{id}', [HikesController::class, 'show']);
});

Route::prefix('hikes')->group(function () {
    Route::get('/', [HikesController::class, 'index']);
    Route::get('/prev', [HikesController::class, 'indexPrev']);

    Route::post('/', [HikesController::class, 'store']);
});

Route::post('/login', [AuthController::class, 'login']);



// Route::get('/species', [HikesController::class, 'index']);