<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Izin;

class StatusController extends Controller
{
    public function index()
    {
        $siswa = Auth::user()->siswa;
        $izins = Izin::where('siswa_id', $siswa->id)->latest()->get();

        return view('siswa.status.index', compact('izins'));
    }
}
