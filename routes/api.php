<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HotelController;
use App\Http\Controllers\AsignHabitacionController;

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

Route::post('/hoteles', [HotelController::class, 'store']);
Route::get('/hoteles', [HotelController::class, 'index']);
Route::get('/hoteles/{id}', [HotelController::class, 'show']);

Route::post('/asignaciones', [AsignHabitacionController::class, 'assign']);
Route::get('/asignaciones/{hotel_id}', [AsignHabitacionController::class, 'index']);
