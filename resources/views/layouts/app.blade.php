<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'IEZ-ONE') }} - Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom Styles -->
    <style>
        .pastel-bg {
            background-color: #E3F2FD;
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(100, 181, 246, 0.4);
        }
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(100, 181, 246, 0.4);
        }
        .active-link {
            background-color: #BBDEFB;
            font-weight: 600;
        }
        .pattern-stroke {
            stroke: rgba(100, 181, 246, 0.15);
        }
        .icon-pattern {
            fill: rgba(77, 182, 172, 0.15);
        }
    </style>
</head>
<body class="font-sans antialiased pastel-bg relative min-h-screen">

    <!-- Background Grid Pattern -->
    <div class="absolute inset-0 opacity-15 -z-10">
        <svg class="w-full h-full" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="edu-grid" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M 40 0 L 0 0 0 40" fill="none" class="pattern-stroke" stroke-width="1"/>
                    <rect x="5" y="5" width="10" height="8" rx="1" class="icon-pattern"/>
                    <polygon points="25,5 28,10 22,10" class="icon-pattern"/>
                    <rect x="10" y="25" width="18" height="10" rx="2" class="icon-pattern"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#edu-grid)"/>
        </svg>
    </div>

    <div class="min-h-screen flex">
        {{-- Sidebar --}}
        <aside class="w-64 glass-effect flex flex-col h-screen">
            {{-- Profil User --}}
            <div class="flex items-center space-x-3 px-6 py-6 border-b border-blue-200">
                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" 
                     class="w-12 h-12 rounded-full border-2 border-blue-300 shadow-md">
                <div>
                    <h2 class="text-lg font-bold text-blue-700">{{ Auth::user()->name }}</h2>
                    <p class="text-sm text-gray-600">{{ Auth::user()->email }}</p>
                </div>
            </div>

            {{-- Menu Navigasi --}}
            <nav class="flex-1 px-4 py-6 space-y-3 overflow-y-auto">
                <a href="{{ route('dashboard') }}" 
                   class="block px-4 py-2 rounded-lg hover-lift transition {{ request()->routeIs('dashboard') ? 'active-link' : 'bg-white/70' }}">
                    🏠 Dashboard
                </a>

                {{-- Link khusus sesuai role --}}
                @if(Auth::user()->role === 'orangtua')
                    <a href="{{ route('orangtua.izin.index') }}" 
                       class="block px-4 py-2 rounded-lg hover-lift transition bg-white/70">
                        📄 Pengajuan Izin
                    </a>
                @elseif(Auth::user()->role === 'siswa')
                    <a href="{{ route('siswa.izin.index') }}" 
                       class="block px-4 py-2 rounded-lg hover-lift transition bg-white/70">
                        📄 Pengajuan Izin
                    </a>
                    <a href="{{ route('siswa.status.index') }}" 
                       class="block px-4 py-2 rounded-lg hover-lift transition bg-white/70">
                        📊 Riwayat
                    </a>
                @elseif(Auth::user()->role === 'walikelas')
                    <a href="{{ route('walikelas.pengajuan.index') }}" 
                       class="block px-4 py-2 rounded-lg hover-lift transition bg-white/70">
                        📄 Pengajuan Izin
                    </a>
                @endif
            </nav>

            {{-- Logout --}}
            <div class="p-4 border-t border-blue-200">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full bg-blue-400 hover:bg-teal-400 px-4 py-2 rounded-md text-white font-medium transition">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- Konten Utama --}}
        <div class="flex-1 flex flex-col">
            {{-- Header --}}
            <header class="glass-effect py-4 px-6 shadow-md flex justify-between items-center">
                <h1 class="text-xl font-bold text-blue-700">@yield('title', 'Dashboard')</h1>
            </header>

            {{-- Isi Konten --}}
            <main class="flex-1 p-6 overflow-y-auto">
                @yield('content')
            </main>

            {{-- Footer --}}
            <footer class="glass-effect text-center py-4 text-sm text-gray-600">
                &copy; {{ date('Y') }} <span class="font-semibold">IEZ-ONE</span> - SMKN 1 Sayung.
            </footer>
        </div>
    </div>
</body>
</html>
