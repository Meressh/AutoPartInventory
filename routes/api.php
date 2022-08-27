<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\PartsController;

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

// Cars
Route::get('/get/cars', [CarsController::class, 'index']);
Route::get('/get/car/{id}', [CarsController::class, 'show']);
Route::post('/update/car/{id}', [CarsController::class, 'update']);
Route::post('/delete/car/{id}', [CarsController::class, 'delete']);
Route::post('/add/cars', [CarsController::class, 'store']);

//Parts
Route::get('/get/items', [PartsController::class, 'index']);
Route::get('/get/item/{id}', [PartsController::class, 'show']);
Route::post('/update/item/{id}', [PartsController::class, 'update']);
Route::post('/delete/item/{id}', [PartsController::class, 'delete']);
Route::post('/add/items', [PartsController::class, 'store']);
