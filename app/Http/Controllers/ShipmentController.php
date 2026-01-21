<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Constants\ShipmentStatus;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Shipment::query();

        $perPage = $request->get('per_page', 10);

        if ($request->filled('search')) {
            $query->where('tracking_number', 'LIKE', '%' . $request->search . '%');
        }

        $shipments = $query
            ->latest()
            ->paginate($perPage);

        return view('shipments.index', compact('shipments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Shipment $shipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shipment $shipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shipment $shipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipment $shipment)
    {
        //
    }
}
