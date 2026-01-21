@extends('layouts.master')

@section('title', 'Track Shipment #' . $shipment->tracking_number)

@section('content')
    <style>
        .manifest-paper {
            background-color: white; /* or slate-900 for dark mode */
            position: relative;
        }
        
        .dark .manifest-paper {
            background-color: #0f172a; /* Slate 900 */
        }
    </style>

    <div class="w-full min-h-screen bg-slate-100 dark:bg-[#05080F] transition-colors duration-500 overflow-y-auto font-sans pb-20">

        <div class="max-w-5xl mx-auto px-4 py-10 md:py-16">

            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-8 px-2">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700">
                        <i data-lucide="package" class="w-6 h-6 text-indigo-600 dark:text-indigo-400"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight">
                            Shipment Tracking
                        </h1>
                        <p class="text-sm font-bold text-slate-500 dark:text-slate-500 tracking-wider">
                            #{{ $shipment->tracking_number }}
                        </p>
                    </div>
                </div>

                <button onclick="window.location.reload()" 
                        class="group flex items-center gap-2 px-4 py-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg hover:border-indigo-500 dark:hover:border-indigo-500 transition-all active:scale-95 shadow-sm">
                    <i data-lucide="refresh-cw" class="w-4 h-4 text-slate-500 group-hover:text-indigo-500 group-active:animate-spin"></i>
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-400 group-hover:text-indigo-600 dark:group-hover:text-indigo-400">Refresh</span>
                </button>
            </div>

            <div class="filter drop-shadow-xl">
                
                <div class="manifest-paper w-full rounded-t-xl pb-6">
                    
                    <div class="relative p-8 md:p-10 border-b border-dashed border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-800/20">
                        <div class="absolute top-0 right-0 p-6 opacity-5 pointer-events-none">
                            <i data-lucide="truck" class="w-32 h-32 text-indigo-900 dark:text-indigo-400"></i>
                        </div>
                        
                        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                            <div>
                                <span class="text-[10px] font-black uppercase tracking-[0.2em] text-indigo-500 mb-2 block">
                                    Current Status
                                </span>
                                <div class="flex items-center gap-4">
                                    <span class="text-3xl md:text-4xl font-black text-slate-900 dark:text-white">
                                        {{ ucfirst($shipment->status) }}
                                    </span>
                                    <span class="relative flex h-4 w-4">
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-4 w-4 bg-emerald-500 border-2 border-white dark:border-slate-900"></span>
                                    </span>
                                </div>
                                <p class="text-sm text-slate-500 dark:text-slate-400 mt-2 font-medium">
                                    Last updated on {{ $shipment->updated_at->format('F d, Y \a\t h:i A') }}
                                </p>
                            </div>
                            
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-12 min-h-[400px]">
                        
                        <div class="lg:col-span-8 p-8 md:p-10">
                            <h2 class="text-xs font-black uppercase tracking-[0.2em] text-slate-400 dark:text-slate-600 mb-10 flex items-center gap-2">
                                <i data-lucide="history" class="w-4 h-4"></i>
                                Progress
                            </h2>

                            <div class="relative border-l-2 border-slate-100 dark:border-slate-800 ml-3 space-y-12">
                                @php
                                    $statuses = [
                                        ['key' => 'delivered', 'label' => 'Delivered', 'icon' => 'check-circle-2', 'desc' => 'Package received by recipient', 'time' => 'Jan 21, 04:00 PM'],
                                        ['key' => 'transit', 'label' => 'In Transit', 'icon' => 'truck', 'desc' => 'Arrived at regional distribution hub', 'time' => 'Jan 21, 02:30 PM'],
                                        ['key' => 'pending', 'label' => 'Order Confirmed', 'icon' => 'package-check', 'desc' => 'Sender has created the label', 'time' => 'Jan 20, 09:00 AM'],
                                    ];
                                @endphp

                                @foreach($statuses as $step)
                                    @php
                                        $isActive = $shipment->status === $step['key'];
                                        $isPassed = false; // Logic omitted for brevity
                                        if($isActive) $isPassed = false;
                                    @endphp

                                    <div class="relative pl-10 group">
                                        <div class="absolute -left-[13px] bg-white dark:bg-slate-900 py-1 transition-all">
                                        @if($isActive)
    <div class="h-6 w-6 rounded-full bg-indigo-600 flex items-center justify-center ring-4 ring-white dark:ring-slate-900 shadow-lg shadow-indigo-500/40">
        <i data-lucide="{{ $step['icon'] }}" class="w-3 h-3 text-white"></i>
    </div>
@elseif($isPassed)
    <div class="h-5 w-5 rounded-full bg-emerald-500 flex items-center justify-center ring-4 ring-white dark:ring-slate-900">
        <i data-lucide="check" class="w-3 h-3 text-white"></i>
    </div>
@else
    <div class="h-5 w-5 rounded-full border-2 border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 ring-4 ring-white dark:ring-slate-900"></div>
@endif
                                        </div>

                                        <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-2">
                                            <div>
                                                <h3 class="text-base font-black {{ $isActive ? 'text-indigo-600 dark:text-indigo-400' : 'text-slate-900 dark:text-slate-200' }}">
                                                    {{ $step['label'] }}
                                                </h3>
                                                <p class="text-sm font-medium text-slate-500 dark:text-slate-400 mt-1 max-w-sm">
                                                    {{ $step['desc'] }}
                                                </p>
                                            </div>
                                            <span class="text-xs font-bold font-mono text-slate-400 dark:text-slate-600 bg-slate-50 dark:bg-slate-800 px-2 py-1 rounded self-start">
                                                {{ $step['time'] }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="lg:col-span-4 bg-slate-50 dark:bg-slate-800/50 border-t lg:border-t-0 lg:border-l border-slate-100 dark:border-slate-800 p-8 md:p-10">
                            
                            <div class="space-y-8">
                                <div>
                                    <div class="flex items-center gap-2 mb-3">
                                        <i data-lucide="map-pin" class="w-4 h-4 text-indigo-500"></i>
                                        <span class="text-[11px] font-black text-slate-400 uppercase tracking-widest">Origin</span>
                                    </div>
                                    <p class="text-sm font-bold text-slate-900 dark:text-slate-100">{{ $shipment->sender_name }}</p>
                                  <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
    {{ e($shipment->sender_address) }}
</p>
   </div>

                                <div class="w-full h-px border-t border-dashed border-slate-200 dark:border-slate-700"></div>

                                <div>
                                    <div class="flex items-center gap-2 mb-3">
                                        <i data-lucide="map-pin" class="w-4 h-4 text-emerald-500"></i>
                                        <span class="text-[11px] font-black text-slate-400 uppercase tracking-widest">Destination</span>
                                    </div>
                                    <p class="text-sm font-bold text-slate-900 dark:text-slate-100">{{ $shipment->receiver_name }}</p>
                                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">{{ $shipment->receiver_address }}</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <div class="text-center mt-8">
                <p class="text-xs font-medium text-slate-400">
                    Need help? <a href="#" class="text-indigo-500 hover:underline">Contact Support</a>
                </p>
            </div>

        </div>
    </div>
@endsection