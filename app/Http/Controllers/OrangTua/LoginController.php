<?php

namespace App\Http\Controllers\OrangTua;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('orangtua.login'); // buatkan blade sederhana
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('orangtua')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('orangtua.dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    public function logout(Request $request)
    {
        Auth::guard('orangtua')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('orangtua.login');
    }
}
