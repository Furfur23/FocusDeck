<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TugasController;



Route::get('welcome', function () {
    return view('welcome');
})->name('welcome');

// Login
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginProses'])->name('loginProses');

// Logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout');




Route::middleware('checkLogin')->group(function () {
    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // User
    Route::get('user', [UserController::class, 'index'])->name('user');
    // Tugas
    Route::get('tugas', [TugasController::class, 'index'])->name('tugas');
});
