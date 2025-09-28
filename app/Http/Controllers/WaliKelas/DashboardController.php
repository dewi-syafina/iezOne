<?php

namespace App\Http\Controllers\WaliKelas;

use App\Http\Controllers\Controller;
use App\Models\Izin;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Tampilkan dashboard (kirim $izins ke view)
    public function index()
    {
        // ambil semua izin beserta relasi siswa (urut terbaru dulu)
        $raw = Izin::with('siswa')->orderBy('created_at', 'desc')->get();

        // map supaya view tidak tergantung nama kolom persis di DB
        $izins = $raw->map(function ($i) {
            return (object) [
                'id'               => $i->id,
                'nama_anak'        => $i->nama_anak ?? optional($i->siswa)->nama_siswa ?? ($i->nama ?? '-'),
                'kelas'            => $i->kelas ?? optional($i->siswa)->kelas ?? '-',
                'tanggal'          => $i->tanggal ?? ($i->created_at ? $i->created_at->format('Y-m-d') : '-'),
                'status_kehadiran' => $i->status_kehadiran ?? $i->jenis ?? 'menunggu',
                'bukti'            => $i->bukti ?? $i->bukti_path ?? $i->file ?? null,
                'status'           => $i->status ?? 'menunggu',
            ];
        });

        return view('walikelas.dashboard', compact('izins'));
    }

    // Update status (disetujui / ditolak)
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:disetujui,ditolak',
        ]);

        $izin = Izin::findOrFail($id);
        $izin->status = $request->status;

        if ($request->filled('komentar')) {
            $izin->komentar = $request->komentar;
        }

        $izin->save();

        return redirect()->route('walikelas.dashboard')->with('success', 'Status izin berhasil diperbarui.');
    }
}
