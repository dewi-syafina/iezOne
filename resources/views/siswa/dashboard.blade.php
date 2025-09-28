<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Dashboard Siswa - IEZ-ONE</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans">
<div class="flex h-screen">

  <!-- Sidebar (singkat) -->
  <aside class="w-72 bg-emerald-800 text-white flex flex-col">
    <div class="p-6 text-center">
      <img src="{{ asset('images/user.png') }}" class="mx-auto w-24 h-24 rounded-full border-4 border-white shadow" alt="avatar">
      <h2 class="mt-4 font-bold">{{ $user->name ?? Auth::user()->name }}</h2>
      <p class="text-sm text-emerald-200">{{ Auth::user()->email }}</p>
    </div>

    <nav class="flex-1 px-4 space-y-3">
      <a href="{{ route('siswa.dashboard') }}" class="block px-4 py-2 rounded-xl {{ request()->routeIs('siswa.dashboard') ? 'bg-emerald-600' : 'hover:bg-emerald-700' }}">📊 Dashboard</a>
      <a href="{{ route('siswa.izin.index') }}" class="block px-4 py-2 rounded-xl hover:bg-emerald-700">📝 Daftar Izin</a>
    </nav>

    <div class="p-6">
      <form method="POST" action="{{ route('logout') }}"> @csrf
        <button type="submit" class="w-full bg-red-500 hover:bg-red-600 py-2 rounded-xl">Logout</button>
      </form>
    </div>
  </aside>

  <!-- Main content -->
  <main class="flex-1 p-8 overflow-y-auto">
        <div class="flex items-center space-x-3 mb-6">
      <div class="bg-gradient-to-br from-emerald-500 to-green-600 p-3 rounded-xl shadow">
        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 8c1.657 0 3-1.343 3-3S13.657 2 12 2s-3 1.343-3 3 1.343 3 3 3zM12 14c-2.21 0-4-1.79-4-4H4v8c0 2.21 1.79 4 4 4h8c2.21 0 4-1.79 4-4v-8h-4c0 2.21-1.79 4-4 4z"/>
        </svg>
      </div>
      <div>
        <h1 class="text-3xl font-bold text-emerald-700">Halo, {{ $user->name ?? Auth::user()->name }} 👋</h1>
        <p class="text-gray-600">Berikut status izin yang diajukan untukmu oleh orang tua.</p>
      </div>
    </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6 mb-6">
    <div class="bg-white rounded-xl shadow p-6 flex items-center space-x-4">
      <div class="bg-emerald-100 text-emerald-700 p-3 rounded-full">
        📊
      </div>
      <div>
        <h3 class="text-sm text-gray-600">Total Izin</h3>
        <div class="text-2xl font-bold text-emerald-700">{{ $totalIzin ?? 0 }}</div>
      </div>
    </div>
    <div class="bg-white rounded-xl shadow p-6 flex items-center space-x-4">
      <div class="bg-green-100 text-green-600 p-3 rounded-full">
        ✅
      </div>
      <div>
        <h3 class="text-sm text-gray-600">Disetujui</h3>
        <div class="text-2xl font-bold text-green-600">{{ $izinDisetujui ?? 0 }}</div>
      </div>
    </div>
    <div class="bg-white rounded-xl shadow p-6 flex items-center space-x-4">
      <div class="bg-red-100 text-red-600 p-3 rounded-full">
        ❌
      </div>
      <div>
        <h3 class="text-sm text-gray-600">Ditolak</h3>
        <div class="text-2xl font-bold text-red-600">{{ $izinDitolak ?? 0 }}</div>
      </div>
    </div>
  </div>


    <!-- Tabel / Riwayat -->
    <div class="bg-white rounded-xl shadow p-6">
      <h2 class="text-xl font-semibold mb-4">Riwayat Pengajuan Izin</h2>

      <table class="w-full table-auto border-collapse">
        <thead>
          <tr class="bg-gray-100 text-left">
            <th class="p-2">Periode</th>
            <th class="p-2">Alasan</th>
            <th class="p-2">Status</th>
            <th class="p-2">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($izins as $item)
            <tr class="border-t">
              <td class="p-2">{{ $item->tanggal_mulai }} @if($item->tanggal_selesai) s/d {{ $item->tanggal_selesai }} @endif</td>
              <td class="p-2">{{ \Illuminate\Support\Str::limit($item->alasan, 60) }}</td>
              <td class="p-2">
                @if($item->status === 'disetujui')
                  <span class="text-green-600 font-semibold">Disetujui</span>
                @elseif($item->status === 'ditolak')
                  <span class="text-red-600 font-semibold">Ditolak</span>
                @else
                  <span class="text-yellow-600 font-semibold">Menunggu</span>
                @endif
              </td>
              <td class="p-2">
                <a href="{{ route('siswa.izin.show', $item->id) }}" class="text-emerald-600 hover:underline">Detail</a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="p-4 text-center text-gray-500">Belum ada pengajuan izin</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </main>
</div>
</body>
</html>
