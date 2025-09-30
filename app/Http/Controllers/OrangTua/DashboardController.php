<?php

namespace App\Http\Controllers\Orangtua;

use App\Http\Controllers\Controller;
use App\Models\Izin;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // ambil data user yang login
        $user = Auth::user();

        // ambil data orangtua dari relasi user -> orangTua
        $orangtua = $user->orangTua;

        if (!$orangtua) {
            return view('orangtua.no-orangtua');
        }

        // ambil semua siswa yang terkait dengan orang tua ini
        $siswas = $orangtua->siswa;

        if ($siswas->isEmpty()) {
            return view('orangtua.no-siswa');
        }

        // ambil semua izin untuk semua siswa terkait
        $izins = Izin::whereIn('siswa_id', $siswas->pluck('id'))->get();

        return view('orangtua.dashboard', compact('izins', 'siswas', 'orangtua'));
    }
}
