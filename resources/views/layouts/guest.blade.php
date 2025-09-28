<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'IEZ-ONE') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 via-blue-200 to-blue-300">

    <div class="w-full max-w-md p-8 bg-white/90 rounded-2xl shadow-2xl backdrop-blur-md">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-extrabold text-blue-700">📘 {{ config('app.name', 'IEZ-ONE') }}</h1>
            <p class="text-gray-600 text-sm">Sistem Izin Tidak Masuk Sekolah</p>
        </div>

        <!-- Slot untuk form login/register/forgot -->
        {{ $slot }}
    </div>

</body>
</html>
