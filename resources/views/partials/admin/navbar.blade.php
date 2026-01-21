<nav class="bg-white border-b border-gray-200 fixed z-50 w-full">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button id="toggleSidebarMobile" class="lg:hidden mr-2 text-gray-600 hover:text-gray-900 cursor-pointer p-2 hover:bg-gray-100 rounded">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"></path></svg>
                </button>
                <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold flex items-center lg:ml-2.5 pr-5">
                    <span class="self-center whitespace-nowrap text-cyan-600">ShipTrack</span>
                </a>
                
                <form action="#" method="GET" class="hidden lg:hidden lg:pl-32">
                    <div class="mt-1 relative lg:w-64">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"><path d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"></path></svg>
                        </div>
                        <input type="text" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full pl-10 p-2.5" placeholder="Track Shipment...">
                    </div>
                </form>
            </div>
            
            <div class="flex items-center">
                <div class="hidden lg:flex items-center mr-4">
                    <span class="text-sm font-medium text-gray-700">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</span>
                </div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>