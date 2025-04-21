<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


// Other routes
Route::get('/browse-items', function () {
    return 'Browse Items Page';
});
