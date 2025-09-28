<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>IEZ-ONE - Izin Tidak Masuk Sekolah Kelas XII PPLG 2</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Custom Styles for Pastel Cute Theme (Biru & Pink Pastel, Tanpa Gradasi) -->
        <style>
            .pastel-bg {
                background-color: #FFB6C1; /* Biru Pastel Solid - Cute & Calming */
            }
            .glass-effect {
                background: rgba(255, 255, 255, 0.8);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 182, 193, 0.3); /* Aksen Pink Pastel */
            }
            .input-glass {
                background: rgba(255, 182, 193, 0.2); /* Pink Pastel Ringan */
                border: 1px solid #A7C7E7; /* Border Biru Pastel */
                color: #4B5563; /* Text Gelap untuk Readability */
            }
            .input-glass:focus {
                background: rgba(255, 182, 193, 0.3);
                border-color: #A7C7E7; /* Focus Pink Pastel */
                outline: none;
            }
            .hover-lift {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            .hover-lift:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 25px rgba(167, 199, 231, 0.3); /* Shadow Biru Pastel */
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
                0%, 100% { opacity: 1; }
                50% { opacity: .8; }
            }
            .pastel-button-primary {
                background-color: #FFB6C1; /* Pink Pastel untuk Tombol Utama */
                color: #4B5563;
                border: 1px solid #A7C7E7; /* Border Biru */
            }
            .pastel-button-primary:hover {
                background-color: #A7C7E7; /* Hover ke Biru Pastel */
                color: #4B5563;
            }
            .pastel-link {
                color: #FFB6C1; /* Link Pink Pastel */
            }
            .pastel-link:hover {
                color: #A7C7E7; /* Hover Biru */
            }
            /* SVG Pattern dengan Aksen Pink Pastel */
            .pattern-stroke {
                stroke: rgba(255, 182, 193, 0.2);
            }
        </style>
    </head>
    <body class="font-sans text-gray-800 antialiased"> <!-- Text Gelap untuk Bg Light -->
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 pastel-bg relative overflow-hidden">
            <!-- Subtle Background Pattern (Aksen Pink Pastel) -->
            <div class="absolute inset-0 opacity-20">
                <svg class="w-full h-full" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                            <path d="M 10 0 L 0 0 0 10" fill="none" class="pattern-stroke" stroke-width="1"/>
                        </pattern>
                    </defs>
                    <rect width="100" height="100" fill="url(#grid)"/>
                </svg>
            </div>

            <!-- Logo Section -->
            <div class="z-10 relative fade-in mb-8">
                <img src="{{ asset('images/organization-logo.png') }}" 
                     alt="Logo Organisasi" 
                     class="w-24 h-24 mx-auto rounded-full shadow-lg border-4 border-pink-200 logo-pulse" 
                     onerror="this.style.display='none'; this.nextElementSibling.style.display='block';" />
                
                <x-application-logo class="w-20 h-20 fill-current text-gray-700 mx-auto hidden" />
            </div>

            <!-- Main Content -->
            <div class="z-10 relative w-full sm:max-w-lg text-center px-6 py-8 fade-in">
                <h1 class="text-4xl sm:text-5xl font-bold text-gray-800 mb-4 tracking-tight">
                    IEZ-ONE
                </h1>
                <p class="text-xl text-gray-700 mb-8 leading-relaxed max-w-md mx-auto">
                    Sistem Izin Tidak Masuk Sekolah untuk Kelas XII PPLG 2. 
                    Kelola izin Anda dengan mudah, aman, dan efisien di era digital.
                </p>

                <!-- Tombol Log In & Register (Pastel Cute) -->
                <div class="space-y-4 sm:space-y-0 sm:flex sm:space-x-4 sm:justify-center">
                    <a href="{{ route('login') }}" 
                       class="block w-full sm:w-auto px-8 py-4 bg-white glass-effect text-gray-800 font-semibold rounded-xl hover-lift text-center transition-all duration-300 pastel-button-primary">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" 
                       class="block w-full sm:w-auto px-8 py-4 pastel-button-primary text-gray-800 font-semibold rounded-xl hover-lift text-center transition-all duration-300 shadow-lg">
                        Daftar
                    </a>
                </div>

                <p class="text-gray-600 mt-8 text-sm">
                    Dibuat untuk mendukung pembelajaran dan administrasi siswa Kelas XII PPLG 2.
                </p>
            </div>

            <!-- Optional Placeholder -->
            <div class="z-10 relative w-full sm:max-w-md mt-6 px-6 py-4 glass-effect shadow-xl overflow-hidden sm:rounded-xl backdrop-blur-md hidden">
            </div>
        </div>
    </body>
</html>