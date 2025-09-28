<?php

namespace App\Http\Controllers\WaliKelas;

use App\Http\Controllers\Controller;
use App\Models\Izin;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    // Menampilkan daftar pengajuan izin
    public function index()
    {
        $izins = Izin::with('siswa')->latest()->get();

        return view('walikelas.dashboard', compact('izins'));
    }

    // Update status izin (Setujui / Tolak)
    public function updateStatus(Request $request, Izin $izin)
    {
        $request->validate([
            'status' => 'required|in:disetujui,ditolak',
        ]);

        $izin->update([
            'status' => $request->status,
        ]);

        return redirect()->route('walikelas.pengajuan.index')
                         ->with('success', 'Status izin berhasil diperbarui!');
    }
}
