<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipmentController;

Route::get('/', function () {
    return view('index');
});

Route::prefix('shipments')->name('shipments.')->group(function () {
    Route::get('/', [ShipmentController::class, 'index'])->name('index');
    Route::get('/create', [ShipmentController::class, 'create'])->name('create');
    Route::post('/', [ShipmentController::class, 'store'])->name('store');
    Route::get('/{shipment}', [ShipmentController::class, 'show'])->name('show');
    Route::get('/{shipment}/edit', [ShipmentController::class, 'edit'])->name('edit');
    Route::put('/{shipment}', [ShipmentController::class, 'update'])->name('update');
    Route::delete('/{shipment}', [ShipmentController::class, 'destroy'])->name('destroy');
});