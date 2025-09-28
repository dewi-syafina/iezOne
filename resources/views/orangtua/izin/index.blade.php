@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Riwayat Izin</h2>
    <a href="{{ route('orangtua.izin.create') }}" class="btn btn-primary">Ajukan Izin</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Alasan</th>
                <th>Status</th>
                <th>Catatan Wali</th>
            </tr>
        </thead>
        <tbody>
            @foreach($izins as $izin)
                <tr>
                    <td>{{ $izin->tanggal_mulai }} s/d {{ $izin->tanggal_selesai }}</td>
                    <td>{{ $izin->alasan }}</td>
                    <td>{{ ucfirst($izin->status) }}</td>
                    <td>{{ $izin->catatan_wali ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
