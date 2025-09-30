<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\User;

class SiswaSeeder extends Seeder
{
    public function run()
    {
        // buat user orang tua
        $ortu = User::create([
            'name' => 'Orang Tua Budi',
            'email' => 'ortu@example.com',
            'password' => bcrypt('password'),
            'role' => 'orang_tua', // pastikan role sesuai
        ]);

        // buat siswa terkait ortu
        Siswa::create([
            'nis' => '12345', // tambahkan NIS karena kolom wajib
            'nama' => 'Budi Setia',
            'kelas' => 'XII-PPLG2',
            'password' => bcrypt('123456'), // password siswa default
            'orangtua_id' => $ortu->id, // sesuaikan dengan kolom yang ada
        ]);
    }
}
