<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Admin-only routes
Route::middleware(['web', 'is.admin'])->group(function () {
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //Add other admin pages here
});

// User-only routes
Route::middleware('web')->group(function () {
    Route::get('/browse-items', [ProductController::class, 'browse'])->name('browse.items');
    Route::get('/help-support', function () {
        return view('user.support');
    })->name('help.support');
});


// In your routes/web.php
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


