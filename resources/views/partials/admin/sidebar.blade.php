<aside id="sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-full transition-transform -translate-x-full bg-white border-r border-gray-200 lg:translate-x-0 lg:pt-16"
    aria-label="Sidebar">

    <div class="h-full px-3 py-4 overflow-y-auto bg-white">
        <div class="flex items-center ps-2.5 mb-6 lg:hidden">
            <i data-lucide="ship-wheel" class="h-8 w-8 mr-3 text-cyan-600"></i>
            <span class="self-center text-xl font-bold whitespace-nowrap text-gray-900">ShipTrack</span>
        </div>

        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100' : '' }}">
                    <i data-lucide="layout-dashboard"
                        class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"></i>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.shipments.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ request()->routeIs('admin.shipments.*') ? 'bg-gray-100' : '' }}">
                    <i data-lucide="package"
                        class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"></i>
                    <span class="ml-3">All Shipments</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
@push('scripts')
    <script>
        const sidebar = document.getElementById('sidebar');
        const sidebarBackdrop = document.getElementById('sidebarBackdrop');
        const toggleBtn = document.getElementById('toggleSidebarMobile');

        function toggleSidebar() {
            sidebar.classList.toggle('-translate-x-full');
            sidebarBackdrop.classList.toggle('hidden');
        }

        toggleBtn.addEventListener('click', toggleSidebar);
        sidebarBackdrop.addEventListener('click', toggleSidebar);
    </script>
@endpush