<?php

namespace App\Http\Controllers\OrangTua;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Izin;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class IzinController extends Controller
{
    public function index()
    {
        $orangTua = Auth::user()->orangTua;
        $izins = Izin::where('orang_tua_id', $orangTua->id)->latest()->get();

        return view('orangtua.izin.index', compact('izins'));
    }

    public function create()
    {
        return view('orangtua.izin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'status_kehadiran' => 'required|string',
            'alasan' => 'nullable|string',
            'bukti' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $path = $request->file('bukti')->store('izin', 'public');

        Izin::create([
            'nama_anak' => Auth::user()->siswa->nama,
            'kelas' => Auth::user()->siswa->kelas,
            'status_kehadiran' => $request->status_kehadiran,
            'alasan' => $request->alasan,
            'bukti' => $path,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', true);
    }

}
