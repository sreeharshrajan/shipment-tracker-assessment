<!DOCTYPE html>
<html lang="en" id="html-tag">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ShipTrack - Global Logistics')</title>
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
    <style>
        .glass {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .light .glass {
            background: rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        body {
            overflow: hidden;
        }

        /* Ensure no scroll for hero landing */
    </style>
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

<body class="bg-slate-50 dark:bg-[#05070a] transition-colors duration-300 h-screen flex flex-col">

    <div class="absolute inset-0 -z-10 overflow-hidden pointer-events-none">
        <div
            class="absolute top-[-15%] left-[-5%] w-[500px] h-[500px] bg-primary-500/10 dark:bg-primary-600/10 blur-[120px] rounded-full">
        </div>
        <div
            class="absolute bottom-[-15%] right-[-5%] w-[600px] h-[600px] bg-blue-600/10 dark:bg-blue-500/5 blur-[120px] rounded-full">
        </div>
        <div
            class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-[0.03] brightness-100 contrast-150">
        </div>
    </div>

    @include('partials.header')

    <main class="flex-grow flex items-center overflow-hidden">
        @yield('content')
    </main>

    @include('partials.footer')

    </div>

    <script>
        const themeToggle = document.getElementById('theme-toggle');
        const sunIcon = document.getElementById('sun-icon');
        const moonIcon = document.getElementById('moon-icon');

        function updateIcons() {
            const isDark = document.documentElement.classList.contains('dark');

            sunIcon.classList.toggle('hidden', !isDark);
            moonIcon.classList.toggle('hidden', isDark);
        }

        themeToggle.addEventListener('click', () => {
            // Toggle the class
            document.documentElement.classList.toggle('dark');

            // Save the manual preference
            const isDark = document.documentElement.classList.contains('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
            updateIcons();
        });

        // Initialize icons on load
        updateIcons();
    </script>
</body>

</html>