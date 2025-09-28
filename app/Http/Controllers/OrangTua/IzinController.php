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
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required|string',
            'bukti' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $path = $request->hasFile('bukti')
            ? $request->file('bukti')->store('izin', 'public')
            : null;

        $orangTua = Auth::user();
        $siswa = $orangTua->siswa; // pastikan relasi User → Siswa ada

        Izin::create([
            'siswa_id' => $siswa->id,
            'orang_tua_id' => $orangTua->id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'alasan' => $request->alasan,
            'bukti' => $path,
            'status' => 'pending',
        ]);

        return redirect()->route('orangtua.izin.index')->with('success', 'Izin berhasil diajukan.');
    }


}
