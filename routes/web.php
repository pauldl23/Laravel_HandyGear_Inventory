<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ManageUsersController;
use App\Http\Controllers\ReportController;


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Admin-only routes
Route::middleware(['web', 'is.admin'])->group(function () {
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //Add other admin pages here

  // 📦 Inventory routes
  Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');
    Route::post('/inventory/add', [InventoryController::class, 'add'])->name('inventory.add');
    Route::post('/inventory/edit/{id}', [InventoryController::class, 'edit'])->name('inventory.edit');
    Route::post('/inventory/adjust/{id}', [InventoryController::class, 'adjustQuantity'])->name('inventory.adjust');
    Route::post('/inventory/delete/{id}', [InventoryController::class, 'delete'])->name('inventory.delete');


  // 👥 Manage Users routes
  Route::get('/manage_users', [ManageUsersController::class, 'index'])->name('manage_users');
  Route::post('/manage_users/store', [ManageUsersController::class, 'store'])->name('manage_users.store');
  Route::post('/manage_users/destroy/{id}', [ManageUsersController::class, 'destroy'])->name('manage_users.destroy');
  Route::post('/manage_users/edit/{id}', [ManageUsersController::class, 'edit'])->name('manage_users.edit');

  
  Route::get('/reports/low-stock', [ReportController::class, 'lowStock'])->name('reports');
});

// User-only routes
Route::middleware('web')->group(function () {
    Route::get('/browse-items', [ProductController::class, 'browse'])->name('browse.items');
    Route::get('/help-support', function () {
      return view('user.help');
    })->name('help.support');
});




// In your routes/web.php
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


