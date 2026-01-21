@extends('layouts.admin')

@section('title', 'Shipment Details')

@section('content')
    <div class="p-6 bg-white border-b border-gray-200">
        <div class="mb-6">
            <a href="{{ route('admin.shipments.index') }}" class="text-cyan-600 hover:text-cyan-800">
                &larr; Back to Shipments
            </a>
        </div>

        <div class="bg-gray-50 p-6 rounded-lg shadow-sm border">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-gray-800">
                    Tracking: {{ $shipment->tracking_number }}
                </h2>
                <span class="px-3 py-1 text-sm font-semibold rounded-full 
                    {{ $shipment->status === 'delivered' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                    {{ ucfirst($shipment->status) }}
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-gray-500 uppercase text-xs font-bold mb-1">Receiver</h3>
                    <p class="text-lg">{{ $shipment->receiver_name }}</p>
                    <p class="text-gray-600">{{ $shipment->receiver_email ?? 'N/A' }}</p>
                </div>

                <div>
                    <h3 class="text-gray-500 uppercase text-xs font-bold mb-1">Destination</h3>
                    <p class="text-lg">{{ $shipment->destination_city }}</p>
                    <p class="text-gray-600">{{ $shipment->destination_address ?? '' }}</p>
                </div>

            </div>
        </div>
    </div>
@endsection