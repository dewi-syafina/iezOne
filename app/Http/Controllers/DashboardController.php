<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        switch ($user->role) {
            case 'siswa':
                return redirect()->route('siswa.dashboard');
            case 'wali_kelas':
                return redirect()->route('walikelas.dashboard');
            case 'orang_tua':
                return redirect()->route('orangtua.dashboard');
            default:
                return view('dashboard'); // fallback kalau role tidak cocok
        }
    }
}
