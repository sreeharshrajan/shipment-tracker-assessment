<aside id="sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-full transition-transform -translate-x-full bg-white border-r border-gray-200 lg:translate-x-0 lg:pt-0 dark:bg-gray-900 dark:border-gray-800"
    aria-label="Sidebar">

    <div class="h-full flex flex-col px-3 py-4 overflow-y-auto bg-white dark:bg-gray-900">

        <div class="flex items-center ps-2.5 mb-8 mt-2">
            <div class="p-2 bg-cyan-50 rounded-lg dark:bg-cyan-900/20 mr-3">
                <i data-lucide="ship-wheel" class="h-6 w-6 text-cyan-600 dark:text-cyan-400"></i>
            </div>
            <span class="self-center text-xl font-bold whitespace-nowrap text-gray-900 dark:text-white tracking-tight">
                ShipTrack
            </span>
        </div>

        <ul class="space-y-2 font-medium flex-1">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center p-3 rounded-lg group transition-all duration-200
                    {{ request()->routeIs('admin.dashboard')
    ? 'bg-cyan-50 text-cyan-700 dark:bg-cyan-900/20 dark:text-cyan-400'
    : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white' 
                    }}">

                    <i data-lucide="layout-dashboard" class="w-5 h-5 transition duration-75 
                        {{ request()->routeIs('admin.dashboard')
    ? 'text-cyan-700 dark:text-cyan-400'
    : 'text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white' 
                        }}"></i>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.shipments.index') }}" class="flex items-center p-3 rounded-lg group transition-all duration-200
                    {{ request()->routeIs('admin.shipments.*')
    ? 'bg-cyan-50 text-cyan-700 dark:bg-cyan-900/20 dark:text-cyan-400'
    : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white' 
                    }}">

                    <i data-lucide="package" class="w-5 h-5 transition duration-75 
                        {{ request()->routeIs('admin.shipments.*')
    ? 'text-cyan-700 dark:text-cyan-400'
    : 'text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white' 
                        }}"></i>
                    <span class="ml-3">All Shipments</span>
                </a>
            </li>
        </ul>

        <div class="mt-auto pt-4 border-t border-gray-200 dark:border-gray-800">
            <button id="theme-toggle"
                class="flex items-center w-full p-3 text-gray-700 rounded-lg hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white transition-colors group">

                <div class="relative w-5 h-5 mr-3">
                    <i id="sun-icon" data-lucide="sun"
                        class="absolute inset-0 w-5 h-5 transition-transform duration-300 rotate-0 dark:rotate-90 dark:scale-0"></i>
                    <i id="moon-icon" data-lucide="moon"
                        class="absolute inset-0 w-5 h-5 transition-transform duration-300 rotate-90 scale-0 dark:rotate-0 dark:scale-100"></i>
                </div>

                <span class="flex-1 text-left">Theme</span>

                <span
                    class="text-xs font-medium px-2 py-0.5 rounded bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400">
                    <span class="block dark:hidden">Light</span>
                    <span class="hidden dark:block">Dark</span>
                </span>
            </button>
        </div>
    </div>
</aside>

<div id="sidebarBackdrop"
    class="fixed inset-0 z-30 hidden bg-gray-900/50 backdrop-blur-sm transition-opacity lg:hidden"></div>

@push('scripts')
    <script src="https://unpkg.com/lucide@latest"></script>

    <script>
        // 1. Initialize Icons
        lucide.createIcons();

        // 2. Sidebar Logic
        const sidebar = document.getElementById('sidebar');
        const sidebarBackdrop = document.getElementById('sidebarBackdrop');
        // Note: Make sure an element with ID 'toggleSidebarMobile' exists in your navbar
        const toggleBtn = document.getElementById('toggleSidebarMobile');

        function toggleSidebar() {
            sidebar.classList.toggle('-translate-x-full');
            sidebarBackdrop.classList.toggle('hidden');
        }

        if (toggleBtn) {
            toggleBtn.addEventListener('click', toggleSidebar);
        }
        sidebarBackdrop.addEventListener('click', toggleSidebar);

        // 3. Theme Toggle Logic
        const themeToggle = document.getElementById('theme-toggle');
        // We don't need to select icons by ID anymore for logic, CSS classes handle the visibility/rotation

        // Check local storage or system preference on load
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }

        themeToggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');

            if (document.documentElement.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }
        });
    </script>
@endpush