@extends('layouts.admin')

@section('title', 'Shipments Overview')

@section('content')
    <div class="w-full grid grid-cols-1 xl:grid-cols-3 gap-6">

        <div class="xl:col-span-1 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-1 gap-6 h-fit">

            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-6 border border-gray-100 dark:border-gray-700 transition-colors">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-cyan-50 dark:bg-cyan-900/20 rounded-lg p-3">
                        <i data-lucide="package" class="h-6 w-6 text-cyan-600 dark:text-cyan-400"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Total Shipments</dt>
                            <dd>
                                <div class="text-2xl font-bold text-gray-900 dark:text-white mt-1">{{ number_format($totalShipments) }}</div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-6 border border-gray-100 dark:border-gray-700 transition-colors">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-emerald-50 dark:bg-emerald-900/20 rounded-lg p-3">
                        <i data-lucide="calendar-check" class="h-6 w-6 text-emerald-600 dark:text-emerald-400"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">New This Week</dt>
                            <dd>
                                <div class="text-2xl font-bold text-gray-900 dark:text-white mt-1">{{ number_format($shipmentsThisWeek) }}</div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>

        </div>

        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl border border-gray-100 dark:border-gray-700 xl:col-span-2 flex flex-col">
            
            <div class="flex justify-between items-center p-6 border-b border-gray-100 dark:border-gray-700">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white flex items-center gap-2">
                    <i data-lucide="clock" class="w-5 h-5 text-gray-400"></i>
                    Latest Shipments
                </h3>
                <a href="{{ route('admin.shipments.index') }}" 
                    class="text-sm font-medium text-cyan-600 hover:text-cyan-700 dark:text-cyan-400 dark:hover:text-cyan-300 hover:underline flex items-center">
                    View All
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-1"></i>
                </a>
            </div>

            <div class="overflow-x-auto rounded-b-xl">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700/50">
                        <tr>
                            <th class="p-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Destination</th>
                            <th class="p-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                            <th class="p-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Date</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-100 dark:divide-gray-700">
                        @forelse($latestDeliveries as $shipment)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                <td class="p-4">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $shipment->destination_city }}</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400 flex items-center gap-1 mt-0.5">
                                        <i data-lucide="hash" class="w-3 h-3"></i>
                                        {{ $shipment->tracking_number }}
                                    </div>
                                </td>
                                <td class="p-4">
                                    @php
                                        // Define badge styles based on status
                                        $badgeClass = match ($shipment->status) {
                                            'delivered' => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400 border-green-200 dark:border-green-800',
                                            'transit'   => 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400 border-blue-200 dark:border-blue-800',
                                            'pending'   => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400 border-yellow-200 dark:border-yellow-800',
                                            'canceled'  => 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400 border-red-200 dark:border-red-800',
                                            default     => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300 border-gray-200 dark:border-gray-600',
                                        };
                                    @endphp
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border {{ $badgeClass }}">
                                        {{ ucfirst($shipment->status) }}
                                    </span>
                                </td>
                                <td class="p-4 text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">
                                    {{ $shipment->created_at->format('M d, Y') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="p-8 text-center">
                                    <div class="flex flex-col items-center justify-center text-gray-500 dark:text-gray-400">
                                        <i data-lucide="inbox" class="w-10 h-10 mb-2 opacity-50"></i>
                                        <p class="text-sm">No recent deliveries found.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Re-initialize icons in case this view is loaded dynamically
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>
@endpush