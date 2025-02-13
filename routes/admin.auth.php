<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\LandController;

// 🔹 Admin Guest Routes (Login & Register)
Route::prefix('admin')->middleware('guest:admin')->group(function () {

    Route::get('register', [RegisteredUserController::class, 'create'])->name('admin.register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('admin.login');
    Route::post('login', [LoginController::class, 'store']);

});

// 🔹 Admin Authenticated Routes (Requires Login)
Route::prefix('admin')->middleware('auth:admin')->group(function () {

    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('admin.dashboard');

    // 🔹 House Management Routes (Use HouseController)
    Route::get('/dashboard/house', [HouseController::class, 'manageHouse'])->name('manage.house');
    Route::get('/dashboard/house/add', [HouseController::class, 'addHouse'])->name('add.house');
    Route::post('/dashboard/house/store', [HouseController::class, 'storeHouse'])->name('store.house');
    Route::get('/dashboard/house/{id}/edit', [HouseController::class, 'editHouse'])->name('edit.house');
    Route::put('/dashboard/house/{id}/update', [HouseController::class, 'updateHouse'])->name('update.house');
    Route::get('/dashboard/house/{id}/delete', [HouseController::class, 'destroyHouse'])->name('delete.house');

    // 🔹 Land Management Routes (Use LandController)
    Route::get('/dashboard/land', [LandController::class, 'manageLand'])->name('manage.land');
    Route::get('/dashboard/land/add', [LandController::class, 'addLand'])->name('add.land');
    Route::post('/dashboard/land/store', [LandController::class, 'storeLand'])->name('store.land');
    Route::get('/dashboard/land/{id}/edit', [LandController::class, 'editLand'])->name('edit.land');
    Route::put('/dashboard/land/{id}/update', [LandController::class, 'updateLand'])->name('update.land');
    Route::get('/dashboard/land/{id}/delete', [LandController::class, 'destroyLand'])->name('delete.land');

    // 🔹 Admin Logout (Ensure Auth Middleware)
    Route::post('logout', [LoginController::class, 'destroy'])->name('admin.logout');
});
