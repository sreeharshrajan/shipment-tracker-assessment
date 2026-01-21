<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | ShipTrack Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

    @include('partials.admin.navbar')

    <div class="flex overflow-hidden bg-white pt-16">
        @include('partials.admin.sidebar')

        <div id="sidebarBackdrop" class="fixed inset-0 z-30 hidden bg-gray-900/50 lg:hidden"></div>

        <div id="main-content" class="relative w-full flex flex-col overflow-y-auto bg-gray-50 lg:ml-64">
            <main class="flex-grow min-h-[70vh]">
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