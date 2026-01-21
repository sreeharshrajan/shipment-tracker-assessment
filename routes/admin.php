<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\ShipmentController;

Route::middleware('web')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');


    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [AuthController::class, 'showDashboard'])->name('dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::prefix('shipments')->name('shipments.')->group(function () {
            Route::get('/', [ShipmentController::class, 'index'])->name('index');
            Route::get('/create', [ShipmentController::class, 'create'])->name('create');
            Route::post('/', [ShipmentController::class, 'store'])->name('store');
            Route::get('/{shipment}', [ShipmentController::class, 'show'])->name('show');
            Route::get('/{shipment}/edit', [ShipmentController::class, 'edit'])->name('edit');
            Route::put('/{shipment}', [ShipmentController::class, 'update'])->name('update');
            Route::delete('/{shipment}', [ShipmentController::class, 'destroy'])->name('destroy');
        });
    });
});
