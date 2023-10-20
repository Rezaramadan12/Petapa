<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UntanController;
use App\Http\Controllers\API\untansController;
use App\Http\Controllers\API\polnepsController;
use App\Http\Controllers\API\rusunawasController;
use App\Http\Controllers\API\umpsController;
use App\Http\Controllers\API\SiskomController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\dummyAPI;

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
Route::post('untan',[untansController::class,'postedgeuntan']);
Route::get('untan',[untansController::class,'postedgeuntan']);
Route::post('polnep',[polnepsController::class,'postedgepolnep']);
Route::get('polnep',[polnepsController::class,'postedgepolnep']);
Route::post('rusunawa',[rusunawasController::class,'postedgerusunawa']);
Route::get('rusunawa',[rusunawasController::class,'postedgerusunawa']);
Route::post('ump',[umpsController::class,'postedgeump']);
Route::get('ump',[umpsController::class,'postedgeump']);
Route::post('siskom',[SiskomController::class,'getedgesiskom']);
Route::get('siskom',[SiskomController::class,'getedgesiskom']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get("data",[dummyAPI::class,'getData']);

// Route::middleware('auth:api')->group(function(){
//     // Rute yang membutuhkan autentikasi

//     Route::get('/user', [UserController::class, 'getUser']);
    Route::post('Untan', [UntanController::class, 'getUntan']);
//     Route::put('/user/{id}', [UserController::class, 'updateUser']);
//     Route::delete('/user/{id}', [UserController::class, 'deleteUser']);
// });


// // Rute yang tidak membutuhkan autentikasi

// Route::get('/products', [ProductController::class, 'index']);
// Route::get('/products/{id}', [ProductController::class, 'show']);
