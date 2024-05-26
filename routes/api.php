<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductosController;
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



Route::post('registrar', [LoginController::class,'registrar']);

Route::post('login', [LoginController::class,'login']);


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('logout', [LoginController::class,'logout']);
    Route::get('productos', [ProductosController::class,'index']);
   
});