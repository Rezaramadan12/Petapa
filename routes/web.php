<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MapsController;
use App\Http\Controllers\API\untansController;
use App\Http\Controllers\API\rusunawasController;
use App\Http\Controllers\API\polnepsController;
use App\Http\Controllers\API\SiskomController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');



// Grup middleware auth
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name(
        'dashboard.index'
    );
    Route::get('/untan', [untansController::class, 'index'])->name(
        'untan.index'
    );
    Route::get('/polnep', [polnepsController::class, 'index'])->name(
        'polnep.index'
    );
    Route::get('/rusunawa', [rusunawasController::class, 'index'])->name(
        'rusunawa.index'
    );
    Route::get('/siskom', [SiskomController::class, 'index'])->name(
        'siskom.index'
    );
    // Tambahkan rute lain yang memerlukan otentikasi di sini

    // Rute logout
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Rute 'maps' tetap di luar grup middleware auth
Route::get('maps', [MapsController::class, 'cobaindex'])->name(
    'maps.cobaindex'
);
Route::get('data', [MapsController::class, 'data'])->name('maps.data');

// Rute authentikasi register dan login
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login',[AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
