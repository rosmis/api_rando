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

Route::post('/login', [AuthController::class, 'login']);

Route::get('hikes', [HikesController::class, 'index']);
Route::get('hikes/prev', [HikesController::class, 'indexPrev']);

Route::post('hikes', [HikesController::class, 'store']);

// Route::get('/species', [HikesController::class, 'index']);