@if (session('error'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed top-5 right-5 z-[100] max-w-sm w-full">
        <div class="bg-white dark:bg-slate-800 border-l-4 border-red-500 shadow-2xl rounded-lg p-4 flex items-center gap-3">
            <div class="bg-red-100 p-2 rounded-full">
                <i data-lucide="info"
                    class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"></i>
            </div>

            <div class="flex-1">
                <p class="text-sm font-bold text-gray-900 dark:text-white">Error</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">
                    {{ session('error') }}
                </p>
            </div>

            <button @click="show = false" class="text-gray-400 hover:text-gray-600">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
@endif

<div class="glass p-1.5 rounded-2xl flex flex-col gap-2 max-w-xl">
    <form action="{{ route('shipment.track.redirect') }}" method="GET" class="flex flex-col md:flex-row gap-2">
        <div class="flex-1 flex items-center px-4 py-2 gap-3 bg-white/5 rounded-xl">
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <input type="text" name="tracking_number" placeholder="Enter Tracking Number (e.g. ST-9920)"
                class="bg-transparent border-none outline-none w-full text-sm dark:text-white text-slate-900 placeholder:text-gray-500 focus:ring-0"
                required>
        </div>
        <button type="submit"
            class="bg-primary-600 hover:bg-primary-500 text-white px-6 py-3 rounded-xl text-sm font-bold transition-all shadow-lg shadow-primary-500/25">
            Track Order
        </button>
    </form>
</div>