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

        <!-- Custom Styles for Educational Pastel Theme -->
        <style>
            .pastel-bg {
                background-color: #E3F2FD; /* Biru Pendidikan Lembut */
            }
            .glass-effect {
                background: rgba(255, 255, 255, 0.9);
                backdrop-filter: blur(12px);
                border: 1px solid rgba(100, 181, 246, 0.4); /* Aksen Biru Pastel */
            }
            .input-glass {
                background: rgba(227, 242, 253, 0.4); /* Biru Soft */
                border: 1px solid #4DB6AC; /* Border Hijau Toska */
                color: #374151;
            }
            .input-glass:focus {
                background: rgba(227, 242, 253, 0.6);
                border-color: #4DB6AC;
                outline: none;
            }
            .hover-lift {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            .hover-lift:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 25px rgba(100, 181, 246, 0.4); /* Biru Shadow */
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
                50% { opacity: .85; }
            }
            .pastel-button-primary {
                background-color: #64B5F6; /* Biru Pendidikan */
                color: #fff;
                border: 1px solid #4DB6AC;
            }
            .pastel-button-primary:hover {
                background-color: #4DB6AC; /* Hijau Toska */
                color: #fff;
            }
            .pastel-link {
                color: #64B5F6; /* Link Biru */
            }
            .pastel-link:hover {
                color: #FBC02D; /* Hover Kuning Ceria */
            }
            /* SVG Pattern Aksen */
            .pattern-stroke {
                stroke: rgba(100, 181, 246, 0.15);
            }
            .icon-pattern {
                fill: rgba(77, 182, 172, 0.15); /* Hijau Toska Transparan */
            }
        </style>
    </head>
    <body class="font-sans text-gray-800 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 pastel-bg relative overflow-hidden">
            <!-- Background Grid Pattern -->
            <div class="absolute inset-0 opacity-15">
                <svg class="w-full h-full" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="edu-grid" width="40" height="40" patternUnits="userSpaceOnUse">
                            <!-- Grid -->
                            <path d="M 40 0 L 0 0 0 40" fill="none" class="pattern-stroke" stroke-width="1"/>
                            <!-- Buku -->
                            <rect x="5" y="5" width="10" height="8" rx="1" class="icon-pattern"/>
                            <!-- Pensil -->
                            <polygon points="25,5 28,10 22,10" class="icon-pattern"/>
                            <!-- Papan tulis -->
                            <rect x="10" y="25" width="18" height="10" rx="2" class="icon-pattern"/>
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#edu-grid)"/>
                </svg>
            </div>

            <!-- Logo -->
            <div class="z-10 relative fade-in mb-8">
                <img src="{{ asset('images/organization-logo.png') }}" 
                     alt="Logo Organisasi" 
                     class="w-24 h-24 mx-auto rounded-full shadow-lg border-4 border-blue-200 logo-pulse" 
                     onerror="this.style.display='none'; this.nextElementSibling.style.display='block';" />
                
                <x-application-logo class="w-20 h-20 fill-current text-gray-700 mx-auto hidden" />
            </div>

            <!-- Main Content -->
            <div class="z-10 relative w-full sm:max-w-lg text-center px-6 py-8 fade-in glass-effect rounded-2xl shadow-xl">
                <h1 class="text-4xl sm:text-5xl font-bold text-blue-700 mb-4 tracking-tight">
                    IEZ-ONE
                </h1>
                <p class="text-lg text-gray-700 mb-8 leading-relaxed max-w-md mx-auto">
                    Sistem Izin Tidak Masuk Sekolah untuk <b>Kelas XII PPLG 2</b> 
                    Didesain dengan konsep digital, ramah pengguna, dan mendukung <span class="text-blue-600 font-semibold">pembelajaran modern</span>.
                </p>

                <!-- Tombol -->
                <div class="space-y-4 sm:space-y-0 sm:flex sm:space-x-4 sm:justify-center">
                    <a href="{{ route('login') }}" 
                       class="block w-full sm:w-auto px-8 py-4 glass-effect text-gray-800 font-semibold rounded-xl hover-lift text-center transition-all duration-300 pastel-button-primary">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" 
                       class="block w-full sm:w-auto px-8 py-4 pastel-button-primary text-white font-semibold rounded-xl hover-lift text-center transition-all duration-300 shadow-lg">
                        Daftar
                    </a>
                </div>

                <p class="text-gray-600 mt-8 text-sm">
                    Dibuat untuk mendukung administrasi & kedisiplinan siswa dalam dunia pendidikan.  
                    <span class="text-yellow-600 font-medium">Belajar lebih mudah, tertata, dan efisien.</span>
                </p>
            </div>

            <!-- Optional Placeholder -->
            <div class="z-10 relative w-full sm:max-w-md mt-6 px-6 py-4 glass-effect shadow-xl overflow-hidden sm:rounded-xl backdrop-blur-md hidden">
            </div>
        </div>
    </body>
</html>
