<?php

namespace App\Http\Controllers;

use App\Models\Shipment;

class ShipmentTrackingController extends Controller
{
    public function show(string $tracking_number)
    {
        $shipment = Shipment::where('tracking_number', $tracking_number)->first();

        if (! $shipment) {
           return redirect()->route('index')->with('error', 'Tracking number not found.');
        }

        return view('shipment-tracking', compact('shipment'));
    }
}
