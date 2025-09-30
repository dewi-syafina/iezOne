<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Izin;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil user dari guard siswa
        $user = Auth::guard('siswa')->user();

        if (!$user) {
            return redirect()->route('login')->withErrors('Silakan login sebagai siswa.');
        }

        // Ambil izin berdasarkan siswa yg login
        $izins = Izin::where('siswa_id', $user->id)
            ->with('orangTua', 'waliKelas')
            ->orderByDesc('created_at')
            ->get();

        $totalIzin     = $izins->count();
        $izinDisetujui = $izins->where('status', 'disetujui')->count();
        $izinDitolak   = $izins->where('status', 'ditolak')->count();

        return view('siswa.dashboard', compact(
            'izins', 'totalIzin', 'izinDisetujui', 'izinDitolak', 'user'
        ));
    }
}
