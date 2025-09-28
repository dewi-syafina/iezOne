<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Izin;

class DashboardController extends Controller
{
        public function index()
    {
        $user = Auth::user();

        // ambil siswa milik orang tua yang login
        $siswa = $user->siswa;

        if (!$siswa) {
            $izins = collect();
            $totalIzin = 0;
            $izinDisetujui = 0;
            $izinDitolak = 0;

            return view('siswa.dashboard', compact(
                'izins','totalIzin','izinDisetujui','izinDitolak','user'
            ));
        }

        // Ambil izin hanya untuk anaknya
        $izins = Izin::where('siswa_id', $siswa->id)
            ->with('orangTua','waliKelas')
            ->orderByDesc('created_at')
            ->get();

        $totalIzin     = $izins->count();
        $izinDisetujui = $izins->where('status', 'disetujui')->count();
        $izinDitolak   = $izins->where('status', 'ditolak')->count();

        return view('siswa.dashboard', compact(
            'izins','totalIzin','izinDisetujui','izinDitolak','user'
        ));
    }
}
