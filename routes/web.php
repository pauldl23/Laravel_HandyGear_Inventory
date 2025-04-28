<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index']);

use App\Http\Controllers\InventoryController;

Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
Route::post('/inventory/add', [InventoryController::class, 'add'])->name('inventory.add');
Route::post('/inventory/edit/{id}', [InventoryController::class, 'edit'])->name('inventory.edit');
Route::post('/inventory/adjust/{id}', [InventoryController::class, 'adjustQuantity'])->name('inventory.adjust');
Route::post('/inventory/delete/{id}', [InventoryController::class, 'delete'])->name('inventory.delete');

use App\Http\Controllers\ManageUsersController;

Route::get('/manage-users', [ManageUsersController::class, 'index'])->name('manage_users.index');
Route::post('/manage-users', [ManageUsersController::class, 'store'])->name('manage_users.store');
Route::post('/manage-users/delete/{id}', [ManageUsersController::class, 'destroy'])->name('manage_users.destroy');

