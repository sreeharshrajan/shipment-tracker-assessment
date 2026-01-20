@extends('layouts.master')

@section('title', 'Login - ShipTrack')

@section('content')
    <div class="w-full max-w-[420px] mx-auto px-4 relative z-10">

        <div class="glass rounded-2xl p-8 shadow-2xl border border-white/20 dark:border-white/5 relative overflow-hidden">

            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-slate-900 dark:text-white tracking-tight">Welcome Back</h1>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-2">Enter your credentials to access your dashboard.
                </p>
            </div>

            @if ($errors->any())
                <div
                    class="mb-6 rounded-lg bg-red-50 dark:bg-red-900/10 border border-red-200 dark:border-red-800/50 p-4 flex gap-3">
                    <div class="shrink-0 text-red-500 dark:text-red-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>

                    <div class="text-sm text-red-600 dark:text-red-400">
                        @if ($errors->count() > 1)
                            <p class="font-medium mb-1">Please correct the following errors:</p>
                            <ul class="list-disc list-inside space-y-1 text-red-600/90 dark:text-red-400/90">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p class="font-medium">{{ $errors->first() }}</p>
                        @endif
                    </div>
                </div>
            @endif


            <form action="{{ route('admin.login') }}" method="POST" class="space-y-5">
                @csrf

                <div class="space-y-1.5">
                    <label for="email" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Email
                        Address</label>
                    <div class="relative">
                        <input type="email" id="email" name="email" autofocus value="{{ old('email') }}"
                            class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 bg-white/50 dark:bg-slate-900/50 text-slate-900 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 outline-none transition-all duration-200 sm:text-sm"
                            placeholder="name@shiptrack.com">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path
                                    d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                                <path
                                    d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label for="password"
                        class="block text-sm font-medium text-slate-700 dark:text-slate-300">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password"
                            class="w-full pl-10 pr-10 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 bg-white/50 dark:bg-slate-900/50 text-slate-900 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 outline-none transition-all duration-200 sm:text-sm"
                            placeholder="••••••••">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd"
                                    d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <button type="button" id="togglePassword"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-primary-600 dark:hover:text-primary-400 cursor-pointer transition-colors">
                            <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-5 h-5">
                                <path d="M10 12.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" />
                                <path fill-rule="evenodd"
                                    d="M.664 10.59a1.651 1.651 0 010-1.186A10.004 10.004 0 0110 3c4.257 0 8.201 1.996 9.336 5.295.147.433.147.904 0 1.337C18.201 12.004 14.257 14 10 14c-4.257 0-8.201-1.996-9.336-5.295zM3.5 10a7.5 7.5 0 005.27 3.328 6.505 6.505 0 01-1.27-2.678c-.283-.93-.283-1.92 0-2.85A6.5 6.5 0 003.5 10z"
                                    clip-rule="evenodd" />
                            </svg>
                            <svg id="eyeSlashIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" class="w-5 h-5 hidden">
                                <path fill-rule="evenodd"
                                    d="M3.28 2.22a.75.75 0 00-1.06 1.06l14.5 14.5a.75.75 0 101.06-1.06l-1.745-1.745a10.029 10.029 0 003.3-4.38 1.651 1.651 0 000-1.185A10.004 10.004 0 009.999 3a9.956 9.956 0 00-4.744 1.194L3.28 2.22zM7.752 6.69l1.092 1.092a2.5 2.5 0 013.374 3.373l1.43 1.43a4 4 0 00-5.896-5.896zM4.755 4.756a8.498 8.498 0 00-1.255 4.654 11.503 11.503 0 003.181 4.757l-1.926 1.926a9.954 9.954 0 01-4.091-5.5 1.651 1.651 0 010-1.185 9.953 9.953 0 012.308-3.606l1.783-1.046z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember" type="checkbox"
                            class="h-4 w-4 rounded border-slate-300 text-primary-600 focus:ring-primary-500 dark:border-slate-600 dark:bg-slate-800 transition-colors">
                        <label for="remember-me"
                            class="ml-2 block text-sm text-slate-600 dark:text-slate-400 select-none">Remember me</label>
                    </div>
                    <div class="text-sm">
                        <a href="#"
                            class="font-medium text-primary-600 hover:text-primary-500 dark:text-primary-400 dark:hover:text-primary-300 transition-colors">
                            Forgot password?
                        </a>
                    </div>
                </div>

                <button type="submit"
                    class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-lg shadow-primary-500/20 text-sm font-semibold text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all transform hover:scale-[1.02]">
                    Sign in
                </button>
            </form>
        </div>
    </div>

    <script>
        // Password Toggle Logic
        const toggleBtn = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        const eyeSlashIcon = document.getElementById('eyeSlashIcon');

        toggleBtn.addEventListener('click', () => {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Toggle icons
            eyeIcon.classList.toggle('hidden');
            eyeSlashIcon.classList.toggle('hidden');
        });
    </script>
@endsection