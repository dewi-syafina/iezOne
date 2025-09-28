@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajukan Izin</h2>
    <form action="{{ route('orangtua.izin.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alasan</label>
            <textarea name="alasan" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Kirim</button>
    </form>
</div>
@endsection
