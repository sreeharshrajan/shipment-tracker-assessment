@extends('layouts.master')

@section('content')
    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center">
        <div class="space-y-6">
            <div
                class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary-500/10 border border-primary-500/20 text-primary-500 text-[10px] font-bold uppercase tracking-wider">
                <span class="relative flex h-2 w-2">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-primary-500"></span>
                </span>
                Live Tracking
            </div>

            <h1 class="text-4xl lg:text-6xl font-extrabold tracking-tight dark:text-white text-slate-900 leading-tight">
                Track your <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-primary-400 to-blue-600">shipment</span> in
                real-time.
            </h1>

            <p class="text-base dark:text-gray-400 text-slate-600 max-w-lg leading-relaxed">
                The world's fastest way to track global logistics. Enter your tracking ID below to get instant status
                updates.
            </p>

            @include('partials.track-input')

            <div class="flex items-center gap-6 pt-4">
                <div class="flex -space-x-2">
                    <img class="w-8 h-8 rounded-full border-2 border-white dark:border-black"
                        src="https://i.pravatar.cc/100?u=1" alt="">
                    <img class="w-8 h-8 rounded-full border-2 border-white dark:border-black"
                        src="https://i.pravatar.cc/100?u=2" alt="">
                    <img class="w-8 h-8 rounded-full border-2 border-white dark:border-black"
                        src="https://i.pravatar.cc/100?u=3" alt="">
                </div>
                <div class="text-[11px]">
                    <p class="dark:text-white font-bold text-slate-900">12k+ Global Users</p>
                    <p class="dark:text-gray-500 text-slate-500">Trusting our precision data.</p>
                </div>
            </div>
        </div>

        <div class="relative hidden lg:block">
            <div
                class="relative z-10 bg-slate-200/50 dark:bg-slate-800/50 p-2 rounded-[2.5rem] border border-slate-200/60 dark:border-white/10 shadow-2xl">

                <div class="relative overflow-hidden rounded-[2rem]">
                    <img class="w-full h-auto object-cover"
                        src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&q=80&w=1000"
                        alt="Global Logistics Operations">
                    <div class="absolute inset-0 bg-gradient-to-tr from-slate-900/40 to-transparent"></div>
                </div>

                <div
                    class="absolute -top-6 -right-6 bg-white dark:bg-slate-900 py-3 px-5 rounded-2xl shadow-xl border border-slate-100 dark:border-slate-700 flex items-center gap-3">
                    <div class="bg-blue-100 dark:bg-blue-500/20 p-2 rounded-xl">
                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 002 2h.5A2.5 2.5 0 0018 9.5V5a2 2 0 00-2-2h-2.12a2 2 0 00-1.414.586l-1.07 1.07">
                            </path>
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Network</span>
                        <span class="text-lg font-black text-slate-900 dark:text-white leading-none">140+ Countries</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection