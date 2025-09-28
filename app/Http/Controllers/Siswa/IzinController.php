<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Izin;

class IzinController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $siswa = $user->siswa;
        if (!$siswa) abort(403, 'Akun belum terhubung dengan data siswa.');

        $izins = Izin::where('siswa_id', $siswa->id)->latest()->get();
        return view('siswa.izin.index', compact('izins'));
    }

    public function show(Izin $izin)
    {
        $user = Auth::user();
        $siswa = $user->siswa;
        if (!$siswa || $izin->siswa_id !== $siswa->id) {
            abort(403);
        }

        return view('siswa.izin.show', compact('izin'));
    }
}
