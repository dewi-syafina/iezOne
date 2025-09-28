@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Pengajuan Izin</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Siswa</th>
                <th>Orang Tua</th>
                <th>Periode</th>
                <th>Alasan</th>
                <th>Status</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($izins as $izin)
            <tr>
                <td>{{ $izin->siswa->nama }}</td>
                <td>{{ $izin->orangTua->user->name }}</td>
                <td>{{ $izin->tanggal_mulai }} s/d {{ $izin->tanggal_selesai }}</td>
                <td>{{ $izin->alasan }}</td>
                <td>{{ ucfirst($izin->status) }}</td>
                <td>{{ $izin->catatan_wali ?? '-' }}</td>
                <td>
                    <form action="{{ route('walikelas.pengajuan.update', $izin->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="form-select" required>
                            <option value="disetujui">Setujui</option>
                            <option value="ditolak">Tolak</option>
                        </select>
                        <input type="text" name="catatan_wali" placeholder="Catatan" class="form-control mt-1">
                        <button class="btn btn-sm btn-success mt-1">Update</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
