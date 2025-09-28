<?php

namespace App\Http\Controllers\OrangTua;

use App\Http\Controllers\Controller;
use App\Models\Izin;

class DashboardController extends Controller
{
    public function index()
    {
        $orangTua = auth()->user()->orangTua;   // ambil data orang tua
        $siswa = $orangTua->siswa;              // ambil anak (siswa) nya

        return view('orangtua.dashboard', compact('orangTua', 'siswa'));
    }
}
