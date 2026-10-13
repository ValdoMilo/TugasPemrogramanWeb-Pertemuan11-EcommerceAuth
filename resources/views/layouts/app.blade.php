<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — E-Commerce App</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-slate-950 text-slate-100">
    <div class="min-h-screen">

        {{-- NAVBAR --}}
        <nav class="sticky top-0 z-40 border-b border-slate-800 bg-slate-950/80 backdrop-blur-lg">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between gap-4">

                {{-- Logo --}}
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-lg bg-red-600 flex items-center justify-center">
                        <span class="text-white font-bold">E</span>
                    </div>
                    <div class="hidden sm:block">
                        <p class="font-semibold text-sm leading-tight">E-Commerce App</p>
                        <p class="text-xs text-slate-500 leading-tight">Tugas 11</p>
                    </div>
                </a>

                {{-- Menu --}}
                @auth
                    <div class="hidden md:flex items-center gap-1">
                        <a href="{{ route('dashboard') }}"
                           class="px-3 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('dashboard') ? 'text-red-400 bg-red-950/40' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-800' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('products.index') }}"
                           class="px-3 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('products.*') ? 'text-red-400 bg-red-950/40' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-800' }}">
                            Produk
                        </a>
                        <a href="{{ route('categories.index') }}"
                           class="px-3 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('categories.*') ? 'text-red-400 bg-red-950/40' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-800' }}">
                            Kategori
                        </a>
                        <a href="{{ route('suppliers.index') }}"
                           class="px-3 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('suppliers.*') ? 'text-red-400 bg-red-950/40' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-800' }}">
                            Supplier
                        </a>
                        <a href="{{ route('orders.index') }}"
                           class="px-3 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('orders.*') ? 'text-red-400 bg-red-950/40' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-800' }}">
                            Order
                        </a>
                        @if (auth()->user()->isAdmin())
                            <a href="{{ route('admin.users') }}"
                               class="px-3 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.*') ? 'text-red-400 bg-red-950/40' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-800' }}">
                                User
                            </a>
                        @endif
                    </div>
                @endauth

                {{-- User Info --}}
                <div class="flex items-center gap-3">
                    @auth
                        <div class="hidden sm:flex flex-col items-end">
                            <span class="text-sm font-medium">{{ auth()->user()->name }}</span>
                            <span class="text-xs px-2 py-0.5 rounded-full
                                @if(auth()->user()->isAdmin()) bg-red-500/20 text-red-300 border border-red-500/40
                                @elseif(auth()->user()->isEditor()) bg-blue-500/20 text-blue-300 border border-blue-500/40
                                @else bg-slate-500/20 text-slate-300 border border-slate-500/40 @endif">
                                {{ ucfirst(auth()->user()->role) }}
                            </span>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="px-3 py-2 text-sm font-medium text-slate-400 hover:text-red-400 hover:bg-red-950/40 rounded-lg transition-colors">
                                Keluar
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="px-3 py-2 text-sm font-medium text-slate-400 hover:text-slate-100">Masuk</a>
                        <a href="{{ route('register') }}" class="px-4 py-2 rounded-lg bg-red-600 hover:bg-red-500 text-white text-sm font-medium transition-colors">Daftar</a>
                    @endauth
                </div>
            </div>
        </nav>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="max-w-6xl mx-auto px-4 sm:px-6 pt-6">
                <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-emerald-950/50 border border-emerald-800 text-emerald-300">
                    <span>✓</span>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="max-w-6xl mx-auto px-4 sm:px-6 pt-6">
                <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-red-950/50 border border-red-800 text-red-300">
                    <span>✕</span>
                    <span class="text-sm font-medium">{{ session('error') }}</span>
                </div>
            </div>
        @endif

        {{-- Content --}}
        <main class="max-w-6xl mx-auto px-4 sm:px-6 py-8">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="border-t border-slate-800 mt-16">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 py-6 text-center text-xs text-slate-500">
                &copy; {{ date('Y') }} Tugas 11 — E-Commerce DB & Secure Auth
            </div>
        </footer>
    </div>
</body>
</html>