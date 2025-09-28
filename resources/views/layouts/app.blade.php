<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'IEZ-ONE') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        <aside class="w-64 bg-gray-900 text-gray-100 flex flex-col">
            {{-- Profil User --}}
            <div class="flex items-center space-x-3 px-6 py-6 border-b border-gray-700">
                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" 
                     class="w-12 h-12 rounded-full border-2 border-emerald-400">
                <div>
                    <h2 class="text-lg font-bold">{{ Auth::user()->name }}</h2>
                    <p class="text-sm text-gray-400">{{ Auth::user()->email }}</p>
                </div>
            </div>

            {{-- Menu Navigasi --}}
            <nav class="flex-1 px-4 py-6 space-y-3">
                <a href="{{ route('dashboard') }}" 
                   class="flex items-center space-x-2 px-3 py-2 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('dashboard') ? 'bg-gray-800' : '' }}">
                    🏠 <span>Dashboard</span>
                </a>
                <a href="#" class="flex items-center space-x-2 px-3 py-2 rounded-lg hover:bg-gray-800 transition">
                    📄 <span>Pengajuan Izin</span>
                </a>
                <a href="#" class="flex items-center space-x-2 px-3 py-2 rounded-lg hover:bg-gray-800 transition">
                    📊 <span>Riwayat</span>
                </a>
            </nav>

            {{-- Logout --}}
            <div class="p-4 border-t border-gray-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-500 px-4 py-2 rounded-md text-white font-medium">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- Konten Utama --}}
        <div class="flex-1 flex flex-col">
            {{-- Header --}}
            <header class="bg-white shadow-sm py-4 px-6 flex justify-between items-center">
                <h1 class="text-xl font-bold text-gray-700">@yield('title', 'Dashboard')</h1>
            </header>

            {{-- Isi Konten --}}
            <main class="flex-1 p-6">
                @yield('content')
            </main>

            {{-- Footer --}}
            <footer class="bg-gray-100 text-center py-4 text-sm text-gray-500">
                &copy; {{ date('Y') }} <span class="font-semibold">IEZ-ONE</span> - SMKN 1 Sayung.
            </footer>
        </div>
    </div>
</body>
</html>
