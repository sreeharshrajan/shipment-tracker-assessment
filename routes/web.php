<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\ShipmentTrackingController;

Route::get('/', function () {
    return view('index');
})->name(name: 'index');


Route::get('/track/{tracking_number}', [ShipmentTrackingController::class, 'show'])
    ->name('shipment.track');

Route::get('/track', function (\Illuminate\Http\Request $request) {
    return redirect()->route('shipment.track', $request->tracking_number);
})->name('shipment.track.redirect');
