@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Detail Izin</h2>

    <p><strong>Periode:</strong> {{ $izin->tanggal_mulai }} @if($izin->tanggal_selesai) s/d {{ $izin->tanggal_selesai }} @endif</p>
    <p><strong>Alasan:</strong> {{ $izin->alasan }}</p>
    <p><strong>Status:</strong> {{ ucfirst($izin->status) }}</p>
    <p><strong>Catatan Wali:</strong> {{ $izin->catatan_wali ?? '-' }}</p>

    @if($izin->bukti)
      <div class="mt-4">
        <a href="{{ asset('storage/'.$izin->bukti) }}" target="_blank" class="text-emerald-600 hover:underline">Lihat Bukti / Surat</a>
      </div>
    @endif

    <div class="mt-6">
      <a href="{{ route('siswa.dashboard') }}" class="text-sm text-gray-600 hover:underline">← Kembali</a>
    </div>
</div>
@endsection
