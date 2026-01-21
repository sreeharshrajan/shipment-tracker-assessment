@extends('layouts.admin')

@section('title', 'Shipments Overview')

@section('content')
    <div class="pt-6 px-4">
        <div class="w-full grid grid-cols-1 xl:grid-cols-3 gap-4">

            <div class="xl:col-span-1 grid grid-cols-1 gap-4">

                <div class="bg-white shadow rounded-lg p-4 sm:p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-cyan-600 rounded-md p-3">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Total Shipments</dt>
                                <dd>
                                    <div class="text-2xl font-bold text-gray-900">{{ number_format($totalShipments) }}</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>

                <div class="bg-white shadow rounded-lg p-4 sm:p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">New This Week</dt>
                                <dd>
                                    <div class="text-2xl font-bold text-gray-900">{{ number_format($shipmentsThisWeek) }}
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>

            </div>

            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:col-span-2">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-gray-900">Latest Shipments</h3>
                    <a href="{{ route('admin.shipments.index') }}" class="text-sm text-cyan-600 hover:underline">View
                        All</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Destination</th>
                                <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse($latestDeliveries as $shipment)
                                <tr>
                                    <td class="p-4 text-sm text-gray-900">
                                        <div class="font-medium">{{ $shipment->destination_city }}</div>
                                        <div class="text-xs text-gray-500">{{ $shipment->tracking_number }}</div>
                                    </td>
                                    <td class="p-4 text-sm font-bold">
                                        @php
                                            $colorClass = match ($shipment->status) {
                                                'delivered' => 'text-green-600',
                                                'transit' => 'text-blue-600',
                                                'pending' => 'text-yellow-600',
                                                'canceled' => 'text-red-600',
                                                default => 'text-gray-600',
                                            };
                                        @endphp
                                        <span class="{{ $colorClass }}">
                                            {{ ucfirst($shipment->status) }}
                                        </span>
                                    </td>
                                    <td class="p-4 text-sm text-gray-500">
                                        {{ $shipment->created_at->format('M d, Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="p-4 text-center text-gray-500 text-sm">No recent deliveries</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection