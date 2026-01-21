<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | ShipTrack Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: { "50": "#eff6ff", "100": "#dbeafe", "200": "#bfdbfe", "300": "#93c5fd", "400": "#60a5fa", "500": "#3b82f6", "600": "#2563eb", "700": "#1d4ed8", "800": "#1e40af", "900": "#1e3a8a", "950": "#172554" }
                    }
                }
            }
        }
    </script>
    <script>
        // Theme persistence logic
        function applyTheme() {
            const savedTheme = localStorage.getItem('theme');
            const systemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

            if (savedTheme === 'dark' || (!savedTheme && systemDark)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }
        applyTheme();
    </script>
</head>

<body
    class="bg-white dark:bg-gray-800 transition-colors duration-300 min-h-screen">

    @include('partials.admin.navbar')

    <div class="flex overflow-hidden pt-16">
        @include('partials.admin.sidebar')

        <div id="sidebarBackdrop" class="fixed inset-0 z-30 hidden bg-gray-900/50 dark:bg-gray-900/50 lg:hidden"></div>

        <div id="main-content" class="relative w-full flex flex-col overflow-y-auto lg:ml-64">
            <main class="flex-grow min-h-[70vh] px-6">
                @yield('content')
            </main>

            @include('partials.admin.footer')
        </div>
    </div>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        // Initialize Lucide icons
        lucide.createIcons();
    </script>

    @stack('scripts')
</body>

</html>