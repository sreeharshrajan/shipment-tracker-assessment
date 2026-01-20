<header class="w-full z-50 dark:border-gray-800 py-2 backdrop-blur-md">
    <nav class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
        <a href="{{ route('index') }}" class="flex items-center gap-2">
            <div class="bg-primary-600 p-1.5 rounded-lg">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            </div>
            <span class="text-lg font-bold dark:text-white text-slate-900 tracking-tight">ShipTrack<span class="text-primary-500">.</span></span>
        </a>

        <div class="hidden md:flex items-center gap-8 text-sm font-medium dark:text-gray-400 text-gray-600">
            <a href="#" class="hover:text-primary-500 transition-colors">Services</a>
            <a href="#" class="hover:text-primary-500 transition-colors">Solutions</a>
            <button id="theme-toggle" class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                <svg id="sun-icon" class="hidden w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path></svg>
                <svg id="moon-icon" class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
            </button>
        </div>

        <a href="#" class="bg-primary-600 hover:bg-primary-700 text-white px-5 py-2 rounded-full text-xs font-semibold transition-all">Get Started</a>
    </nav>
</header>