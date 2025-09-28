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
        $siswa = auth()->user()->siswa;  
        $siswa = $user->siswa; // pastikan relasi user->siswa ada

        // Jika akun orang belum terhubung ke siswa, kirim data kosong agar view tidak error
        if (!$siswa) {
            $izins = collect();
            $totalIzin = 0;
            $izinDisetujui = 0;
            $izinDitolak = 0;
            return view('siswa.dashboard', compact('izins','totalIzin','izinDisetujui','izinDitolak','user'));
        }

        // Ambil semua izin milik siswa
        $izins = Izin::where('siswa_id', $siswa->id)
            ->with('orangTua','waliKelas') // optional, jika relasi ada
            ->orderByDesc('created_at')
            ->get();

        $totalIzin = $izins->count();
        $izinDisetujui = $izins->where('status','disetujui')->count();
        $izinDitolak = $izins->where('status','ditolak')->count();

        return view('siswa.dashboard', compact('izins','totalIzin','izinDisetujui','izinDitolak','user'));
    }
}
