<?php

namespace App\Http\Controllers\Orangtua;

use App\Http\Controllers\Controller;
use App\Models\Izin;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   public function index()
    {
        $orangtua = Auth::user();
        $siswa = $orangtua->siswa; // relasi hasOne

        if (!$siswa) {
            // solusi 1: tampilkan view khusus
            return view('orangtua.no-siswa'); 

            // atau solusi 2: redirect ke halaman lain (contoh ke /profile)
            // return redirect()->route('profile.edit')
            //     ->with('error', 'Belum ada siswa yang terhubung dengan akun ini.');
        }

        $izins = Izin::where('siswa_id', $siswa->id)->get();

        return view('orangtua.dashboard', compact('izins', 'siswa'));
    }
}
