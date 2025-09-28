<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Izin;
use App\Models\Siswa;
use App\Models\OrangTua;

class IzinSeeder extends Seeder
{
    public function run()
    {
        $siswa = Siswa::first();
        $ortu = $siswa->orangtua; // relasi dari Siswa ke User

        Izin::firstOrCreate(
            [
                'siswa_id' => $siswa->id,
                'orang_tua_id' => $ortu->id,
                'tanggal_mulai' => now()->toDateString(),
            ],
            [
                'tanggal_selesai' => now()->addDay()->toDateString(),
                'alasan' => 'Sakit flu',
                'status' => 'pending',
            ]
        );
    }
}
