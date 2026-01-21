<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-900 dark:border-gray-800">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">

            <div class="flex items-center justify-start rtl:justify-end">

                <button id="toggleSidebarMobile" aria-controls="sidebar" aria-expanded="false"
                    class="p-2 mr-2 text-gray-600 rounded cursor-pointer lg:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>

                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 md:mr-24">
                    <div class="bg-cyan-600 p-1.5 rounded-lg dark:bg-cyan-500">
                        <i data-lucide="package" class="w-6 h-6 text-white"></i>
                    </div>
                    <span
                        class="self-center text-xl font-bold sm:text-2xl whitespace-nowrap text-gray-900 dark:text-white tracking-tight">
                        ShipTrack<span class="text-cyan-600 dark:text-cyan-400">.</span>
                    </span>
                </a>
            </div>

            <div class="hidden lg:block lg:flex-1 lg:max-w-lg lg:ml-12">
                <form action="#" method="GET">
                    <label for="topbar-search" class="sr-only">Search</label>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i data-lucide="search" class="w-5 h-5 text-gray-500 dark:text-gray-400"></i>
                        </div>
                        <input type="text" name="search" id="topbar-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full pl-10 p-2.5 
                            dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500 transition-colors"
                            placeholder="Track Shipment ID, Order #...">
                    </div>
                </form>
            </div>

            <div class="flex items-center gap-3">

                <button type="button"
                    class="lg:hidden p-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700">
                    <span class="sr-only">Search</span>
                    <i data-lucide="search" class="w-6 h-6"></i>
                </button>

                <div class="hidden sm:flex items-center">
                    <div class="text-right mr-3">
                        <div class="text-sm font-semibold text-gray-900 dark:text-white">
                            {{ Auth::guard('admin')->user()->name ?? 'Administrator' }}
                        </div>
                    </div>
                    <div class="p-1 bg-gray-100 rounded-full dark:bg-gray-700">
                        <i data-lucide="user" class="w-6 h-6 text-gray-600 dark:text-gray-300"></i>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit"
                        class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-300 font-medium rounded-lg text-sm px-4 py-2 
                        dark:bg-cyan-600 dark:hover:bg-cyan-700 dark:focus:ring-cyan-800 transition-colors flex items-center gap-2">
                        <span class="hidden sm:inline">Logout</span>
                        <i data-lucide="log-out" class="w-4 h-4"></i>
                    </button>
                </form>

            </div>
        </div>
    </div>
</nav>

<div class="pt-8"></div>