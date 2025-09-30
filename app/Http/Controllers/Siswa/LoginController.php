<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('siswa.login'); // buatkan blade sederhana
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nis' => ['required'],
            'password' => ['required'],
        ]);

        // cari user berdasarkan relasi siswa
        $siswa = Siswa::where('nis', $credentials['nis'])->first();

        if (!$siswa || !$siswa->user) {
            return back()->withErrors(['nis' => 'NIS tidak ditemukan']);
        }

        $user = $siswa->user;

        if (Hash::check($credentials['password'], $user->password)) {
            Auth::guard('siswa')->login($user);
            return redirect()->route('siswa.dashboard');
        }

        return back()->withErrors(['password' => 'Password salah']);
    }

    public function logout(Request $request)
    {
        Auth::guard('siswa')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('siswa.login');
    }
}
