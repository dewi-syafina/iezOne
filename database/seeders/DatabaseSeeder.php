<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Siswa;
use App\Models\OrangTua;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat akun Wali Kelas
        $wali = User::updateOrCreate(
            ['email' => 'wali@example.com'],
            [
                'name' => 'Wali Kelas',
                'password' => Hash::make('password'),
                'role' => 'wali_kelas',
            ]
        );

        // Buat akun Siswa
        $siswaUser = User::updateOrCreate(
            ['email' => 'siswa@example.com'],
            [
                'name' => 'Siswa Pertama',
                'password' => Hash::make('password'),
                'role' => 'siswa',
            ]
        );

        $siswa = Siswa::updateOrCreate(
            ['user_id' => $siswaUser->id],
            [
                'nama' => 'Siswa Pertama',
                'kelas' => 'XII RPL 1',
            ]
        );

        // Buat akun Orang Tua
        $ortuUser = User::updateOrCreate(
            ['email' => 'ortu@example.com'],
            [
                'name' => 'Orang Tua Siswa',
                'password' => Hash::make('password'),
                'role' => 'orang_tua',
            ]
        );

        OrangTua::updateOrCreate(
            ['user_id' => $ortuUser->id],
            [
                'siswa_id' => $siswa->id,
            ]
        );

        // Seeder tambahan (contoh IzinSeeder)
        $this->call([
            IzinSeeder::class,
        ]);
    }
}
