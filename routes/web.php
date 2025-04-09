<?php

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return 'Admin Dashboard';
});

Route::get('/browse-items', function () {
    return 'Browse Items Page';
});
