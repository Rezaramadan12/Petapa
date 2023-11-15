<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\API\untansController;
use App\Http\Controllers\API\rusunawasController;
use App\Http\Controllers\API\polnepsController;
use App\Http\Controllers\API\SiskomController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('maps', [MapsController::class, 'cobaindex'])->name('maps.cobaindex');
Route::get('data',[MapsController::class,'data'])->name('maps.data');
Route::get('/untan', [untansController::class, 'index'])->name('untan.index');
Route::get('/polnep', [polnepsController::class, 'index'])->name('polnep.index');
Route::get('/rusunawa', [rusunawasController::class, 'index'])->name('rusunawa.index');
Route::get('/siskom', [SiskomController::class, 'index'])->name('siskom.index');
