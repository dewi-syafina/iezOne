<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>IEZ-ONE - {{ $pageTitle ?? 'Izin Tidak Masuk Sekolah Kelas XII PPLG 2' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Custom Styles for Cute Pastel Theme -->
        <style>
            .gradient-bg {
                background: linear-gradient(135deg, #ffeef8 0%, #d1c4e9 100%);
            }
            .glass-effect {
                background: rgba(255, 255, 255, 0.15);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 182, 193, 0.3);
            }
            .input-glass {
                background: rgba(255, 255, 255, 0.25);
                border: 1px solid rgba(255, 182, 193, 0.4);
                color: #4a5568;
                backdrop-filter: blur(5px);
            }
            .input-glass:focus {
                background: rgba(255, 255, 255, 0.35);
                border-color: #ffb6c1;
                outline: none;
                box-shadow: 0 0 0 3px rgba(255, 182, 193, 0.1);
            }
            .hover-lift {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            .hover-lift:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 25px rgba(255, 182, 193, 0.2);
            }
            .fade-in {
                animation: fadeIn 1s ease-in-out;
            }
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .logo-pulse {
                animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
            }
            @keyframes pulse {
                0%, 100% { opacity: 1; box-shadow: 0 0 0 0 rgba(255, 182, 193, 0.4); }
                70% { opacity: 0.8; box-shadow: 0 0 0 10px rgba(255, 182, 193, 0); }
                100% { box-shadow: 0 0 0 0 rgba(255, 182, 193, 0); }
            }
            .error-text {
                color: #ff9999;
                font-size: 0.875rem;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 gradient-bg relative overflow-hidden">
            <!-- Subtle Background Pattern for Depth (Cute dengan Aksen Pastel) -->
            <div class="absolute inset-0 opacity-10">
                <svg class="w-full h-full" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                            <path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255, 182, 193, 0.2)" stroke-width="1"/>
                        </pattern>
                    </defs>
                    <rect width="100" height="100" fill="url(#grid)"/>
                </svg>
            </div>

            <!-- Logo Section with Organization Logo (Cute Pulse) -->
            <div class="z-10 relative fade-in mb-6">
                <img src="{{ asset('images/organization-logo.png') }}" 
                     alt="Logo Organisasi" 
                     class="w-20 h-20 mx-auto rounded-full shadow-lg border-4 border-pink-200/50 logo-pulse" 
                     onerror="this.style.display='none'; this.nextElementSibling.style.display='block';" />
                
                <!-- Fallback ke Application Logo -->
                <x-application-logo class="w-16 h-16 fill-current text-gray-700 mx-auto hidden rounded-full shadow-lg" />
            </div>

            <!-- Header Tema (Ditampilkan di Atas Slot) -->
            <div class="z-10 relative w-full sm:max-w-md text-center px-6 py-4 fade-in mb-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">
                    IEZ-ONE
                </h2>
                <p class="text-gray-700 text-sm leading-relaxed">
                    Sistem Izin Tidak Masuk Sekolah Kelas XII PPLG 2
                </p>
            </div>

            <!-- Slot untuk Form (dari Auth Views) -->
            <div class="z-10 relative w-full sm:max-w-md px-6 py-4 glass-effect shadow-xl overflow-hidden sm:rounded-2xl backdrop-blur-md fade-in">
                {{ $slot }}
            </div>

            <!-- Link Alternatif (misal dari login ke register) -->
            <div class="z-10 relative mt-6 text-center fade-in">
                {{ $footer ?? '' }}
            </div>
        </div>
    </body>
</html>