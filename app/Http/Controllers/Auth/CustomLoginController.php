<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Siswa;
use App\Models\User;

class CustomLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'role'     => 'required|in:siswa,orangtua,wali_kelas',
            'nis'      => 'nullable|string',
            'email'    => 'nullable|email',
            'password' => 'required|string',
        ]);

        if ($request->role === 'siswa') {
            $request->validate(['nis' => 'required|string']);
            $siswa = Siswa::where('nis', $request->nis)->first();

            if (!$siswa || !Hash::check($request->password, $siswa->password)) {
                return back()->withErrors(['nis' => 'NIS atau password salah'])->withInput();
            }

            Auth::guard('siswa')->login($siswa);
            $request->session()->regenerate();
        }

        if ($request->role === 'orangtua' || $request->role === 'wali_kelas') {
            $request->validate(['email' => 'required|email']);
            $credentials = $request->only('email', 'password');

            if (!Auth::guard('web')->attempt($credentials, $request->filled('remember'))) {
                return back()->withErrors(['email' => 'Email atau password salah']);
            }

            $request->session()->regenerate();
        }

        // Semua role diarahkan ke dashboard siswa
        return redirect()->route('siswa.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('siswa')->logout();
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
