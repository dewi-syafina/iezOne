<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | Di sini kamu menentukan guard default dan provider default.
    |
    */
    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Definisi guard untuk masing-masing tipe user.
    |
    */
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'siswa' => [
            'driver' => 'session',
            'provider' => 'siswas',
        ],

        'orang_tua' => [
            'driver' => 'session',
            'provider' => 'orangtuas',
        ],

        'wali_kelas' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | Provider menentukan model Eloquent yang digunakan masing-masing guard.
    |
    */
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'siswas' => [
            'driver' => 'eloquent',
            'model' => App\Models\Siswa::class,
        ],

        'orangtuas' => [
            'driver' => 'eloquent',
            'model' => App\Models\OrangTua::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | Atur konfigurasi reset password untuk setiap tipe user.
    |
    */
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'siswas' => [
            'provider' => 'siswas',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'orangtuas' => [
            'provider' => 'orangtuas',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Lama waktu sebelum meminta konfirmasi password ulang.
    |
    */
    'password_timeout' => 10800,

];
