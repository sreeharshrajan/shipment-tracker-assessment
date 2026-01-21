@extends('layouts.admin')

@section('title', 'Shipment Details')

@section('content')
    <div
        class="flex flex-col h-[80vh] bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800 overflow-hidden font-sans rounded-lg shadow-lg">

        <div
            class="px-6 py-4 border-b border-gray-200 dark:border-gray-800 flex justify-between items-center bg-white dark:bg-gray-900 shrink-0 z-10 transition-colors">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.shipments.index') }}"
                    class="p-2 -ml-2 text-gray-400 hover:text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white rounded-full transition-colors"
                    title="Back to Shipments">
                    <i data-lucide="arrow-left" class="w-5 h-5"></i>
                </a>
                <div>
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white leading-tight">
                        Shipment Details
                    </h2>
                    <div class="flex items-center gap-2 mt-0.5">
                        <i data-lucide="hash" class="w-3 h-3 text-gray-400"></i>
                        <p class="text-xs text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wide">
                            {{ $shipment->tracking_number }}
                        </p>
                    </div>
                </div>
            </div>

            @php
                $statusClasses = match ($shipment->status) {
                    'delivered' => 'bg-emerald-50 text-emerald-700 border-emerald-200 dark:bg-emerald-900/30 dark:text-emerald-400 dark:border-emerald-800',
                    'transit' => 'bg-blue-50 text-blue-700 border-blue-200 dark:bg-blue-900/30 dark:text-blue-400 dark:border-blue-800',
                    'pending' => 'bg-yellow-50 text-yellow-700 border-yellow-200 dark:bg-yellow-900/30 dark:text-yellow-400 dark:border-yellow-800',
                    'canceled' => 'bg-red-50 text-red-700 border-red-200 dark:bg-red-900/30 dark:text-red-400 dark:border-red-800',
                    default => 'bg-gray-50 text-gray-700 border-gray-200 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-700',
                };
            @endphp
            <span class="px-3 py-1 text-xs font-bold uppercase tracking-wide rounded-full border {{ $statusClasses }}">
                {{ $shipment->status }}
            </span>
        </div>

        <div class="flex flex-1 overflow-hidden">

            <aside
                class="w-full md:w-1/3 bg-gray-50 dark:bg-gray-800/50 border-r border-gray-200 dark:border-gray-800 overflow-y-auto p-6 flex flex-col gap-6 transition-colors">

                <div class="relative pl-4 border-l-2 border-gray-300 dark:border-gray-600">
                    <h3 class="text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-1">Sender
                    </h3>
                    <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $shipment->sender_name }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1 leading-relaxed">
                        {{ $shipment->sender_address ?? 'N/A' }}</p>
                </div>

                <div class="flex items-center gap-2 text-gray-400 dark:text-gray-600">
                    <div class="h-px bg-gray-300 dark:bg-gray-700 flex-1"></div>
                    <i data-lucide="arrow-down" class="w-4 h-4"></i>
                    <div class="h-px bg-gray-300 dark:bg-gray-700 flex-1"></div>
                </div>

                <div class="relative pl-4 border-l-2 border-indigo-400 dark:border-indigo-500">
                    <h3 class="text-xs font-bold text-indigo-500 dark:text-indigo-400 uppercase tracking-widest mb-1">
                        Destination</h3>
                    <p class="text-lg font-bold text-gray-900 dark:text-white">{{ $shipment->destination_city }}</p>
                </div>

                <div class="relative pl-4 border-l-2 border-gray-300 dark:border-gray-600">
                    <h3 class="text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-1">Receiver
                    </h3>
                    <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $shipment->receiver_name }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1 leading-relaxed">
                        {{ $shipment->receiver_address ?? 'No address provided' }}</p>
                </div>

            </aside>

            <main
                class="w-full md:w-2/3 bg-white dark:bg-gray-800/50 flex flex-col overflow-hidden relative transition-colors">
                <div
                    class="px-6 py-3 bg-white/90 dark:bg-gray-900/50 backdrop-blur border-b border-gray-100 dark:border-gray-800 sticky top-0 z-10">
                    <h3 class="text-sm font-bold text-gray-800 dark:text-gray-200 flex items-center gap-2">
                        <i data-lucide="activity" class="w-4 h-4 text-cyan-600 dark:text-cyan-400"></i>
                        Shipment History
                    </h3>
                </div>

                <div class="flex-1 overflow-y-auto p-6 scroll-smooth">
                    @if($shipment->statusLogs->isEmpty())
                        <div class="h-full flex flex-col items-center justify-center text-gray-400 dark:text-gray-500">
                            <i data-lucide="clipboard-x" class="w-12 h-12 mb-3 opacity-50"></i>
                            <span class="text-sm">No history logs recorded yet.</span>
                        </div>
                    @else
                        <ul class="space-y-0 relative">
                            <div class="absolute left-2.5 top-2 bottom-2 w-0.5 bg-gray-100 dark:bg-gray-800"></div>

                            @foreach($shipment->statusLogs as $index => $log)
                                <li class="relative pl-10 pb-8 last:pb-0 group">
                                    <div
                                        class="absolute left-0 top-1.5 w-5 h-5 rounded-full border-4 border-white dark:border-gray-900 shadow-sm flex items-center justify-center transition-colors
                                                    {{ $index === 0 ? 'bg-cyan-600 z-10 ring-1 ring-cyan-100 dark:ring-cyan-900' : 'bg-gray-300 dark:bg-gray-600' }}">
                                    </div>

                                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-baseline gap-1">
                                        <h4
                                            class="text-sm font-bold text-gray-900 dark:text-white group-hover:text-cyan-600 dark:group-hover:text-cyan-400 transition-colors">
                                            {{ ucfirst($log->status) }}
                                        </h4>
                                        <time class="text-xs text-gray-400 dark:text-gray-500 font-mono">
                                            {{ $log->created_at->format('M d, H:i') }}
                                        </time>
                                    </div>

                                    <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                        {{ $log->description ?? 'Status updated' }}
                                    </div>

                                    @if($log->location)
                                        <div
                                            class="mt-2 inline-flex items-center px-2.5 py-1 rounded bg-gray-50 dark:bg-gray-800 border border-gray-100 dark:border-gray-700 text-xs text-gray-500 dark:text-gray-400 font-medium">
                                            <i data-lucide="map-pin" class="w-3 h-3 mr-1.5 text-gray-400 dark:text-gray-500"></i>
                                            {{ $log->location }}
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </main>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>
@endpush