<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | ShipTrack Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans antialiased">
    <div class="min-h-screen flex">
        <aside class="w-64 bg-slate-900 text-white hidden md:flex flex-col">
            <div class="p-6 text-2xl font-bold border-b border-slate-800">
                LogiTrack
            </div>
            <nav class="flex-1 p-4 space-y-2">
                <a href="{{ route('admin.shipments.index') }}" class="flex items-center space-x-3 p-3 rounded-lg bg-blue-600">
                    <i class="fas fa-shipping-fast"></i>
                    <span>Shipments</span>
                </a>
                <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-slate-800 transition">
                    <i class="fas fa-chart-line"></i>
                    <span>Analytics</span>
                </a>
            </nav>
        </aside>

        <main class="flex-1 flex flex-col">
            <header class="bg-white border-b h-16 flex items-center justify-between px-8">
                <h1 class="text-xl font-semibold text-gray-800">@yield('header', 'Dashboard')</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-500">Admin User</span>
                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                        AU
                    </div>
                </div>
            </header>

            <div class="p-8">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>