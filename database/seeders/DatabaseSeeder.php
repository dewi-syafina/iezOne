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
        // 1️⃣ Buat akun Wali Kelas
        $wali = User::updateOrCreate(
            ['email' => 'wali@example.com'],
            [
                'name' => 'Wali Kelas',
                'password' => Hash::make('password'),
                'role' => 'wali_kelas',
            ]
        );

        // 2️⃣ Buat akun Orang Tua
        $ortuUser = User::updateOrCreate(
            ['email' => 'ortu@example.com'],
            [
                'name' => 'Orang Tua Siswa',
                'password' => Hash::make('password'),
                'role' => 'orang_tua',
            ]
        );

        // 3️⃣ Buat akun Siswa dan sambungkan ke Orang Tua
        $siswa = Siswa::updateOrCreate(
            ['nis' => '12345'], // NIS unik
            [
                'nama' => 'Siswa Pertama',
                'kelas' => 'XII RPL 1',
                'password' => bcrypt('123456'),
                'orangtua_id' => $ortuUser->id,
            ]
        );

        // 4️⃣ Buat relasi di tabel OrangTua
        OrangTua::updateOrCreate(
            ['user_id' => $ortuUser->id],
            [
                'nama' => $ortuUser->name,
            ]
        );

        // 5️⃣ Seeder tambahan
        $this->call([IzinSeeder::class]);
    }
}
