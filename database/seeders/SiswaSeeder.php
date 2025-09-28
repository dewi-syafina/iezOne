<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\User;

class SiswaSeeder extends Seeder
{
    public function run()
    {
        // contoh buat user ortu
        $ortu = User::create([
            'name' => 'Orang Tua Budi',
            'email' => 'ortu@example.com',
            'password' => bcrypt('password'),
            'role' => 'orangtua',
        ]);

        // buat siswa terkait ortu
        Siswa::create([
            'nama' => 'Budi Setia',
            'kelas' => 'X-A',
            'user_id' => $ortu->id,
        ]);
    }
}