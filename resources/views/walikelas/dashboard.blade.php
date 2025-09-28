@extends('layouts.app')

@section('header')
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3">
            <div class="bg-gradient-to-br from-purple-500 to-blue-600 p-2 rounded-xl shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c1.657 0 3-1.343 3-3S13.657 2 12 2 9 3.343 9 5s1.343 3 3 3zM19 21v-2a4 4 0 00-4-4H9a4 4 0 00-4 4v2" />
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-2xl text-gray-800">Dashboard Wali Kelas</h2>
                <p class="text-sm text-gray-600">Kelola pengajuan izin siswa dengan mudah</p>
            </div>
        </div>
        <div class="flex items-center space-x-4">
            <div class="bg-white rounded-full p-2 shadow-md">
                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5-5-5 5z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5 8a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="max-w-7xl mx-auto p-6 space-y-8">
    
    {{-- Welcome Card --}}
    <div class="bg-gradient-to-r from-purple-600 via-blue-600 to-indigo-700 rounded-2xl p-8 text-white shadow-2xl relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-white bg-opacity-10 rounded-full -mr-16 -mt-16"></div>
        <div class="absolute bottom-0 left-0 w-24 h-24 bg-white bg-opacity-10 rounded-full -ml-12 -mb-12"></div>
        
        <div class="relative z-10 flex items-center justify-between">
            <div class="flex-1">
                <h3 class="text-3xl font-bold mb-2">Halo, {{ Auth::user()->name ?? 'Wali Kelas' }}! 👋</h3>
                <p class="text-blue-100 text-lg mb-6">
                    Selamat datang kembali. Mari kelola pengajuan izin siswa dengan efisien.
                </p>
                <div class="flex items-center space-x-4">
                    <div class="bg-white bg-opacity-20 rounded-lg px-4 py-2 backdrop-blur-sm">
                        <span class="text-sm font-medium">Total Pengajuan Hari Ini</span>
                        <div class="text-2xl font-bold">{{ $izins->where('created_at', '>=', today())->count() }}</div>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-lg px-4 py-2 backdrop-blur-sm">
                        <span class="text-sm font-medium">Menunggu Persetujuan</span>
                        <div class="text-2xl font-bold">{{ $izins->where('status', 'menunggu')->count() }}</div>
                    </div>
                </div>
            </div>
            <div class="hidden lg:block">
                <div class="w-48 h-32 bg-white bg-opacity-10 rounded-xl flex items-center justify-center">
                    <svg class="w-20 h-20 text-white opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Quick Stats --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl p-6 shadow-lg border-l-4 border-green-500 hover:shadow-xl transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Disetujui</p>
                    <p class="text-3xl font-bold text-green-600">{{ $izins->where('status', 'disetujui')->count() }}</p>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl p-6 shadow-lg border-l-4 border-yellow-500 hover:shadow-xl transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Menunggu</p>
                    <p class="text-3xl font-bold text-yellow-600">{{ $izins->where('status', 'menunggu')->count() }}</p>
                </div>
                <div class="bg-yellow-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl p-6 shadow-lg border-l-4 border-red-500 hover:shadow-xl transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Ditolak</p>
                    <p class="text-3xl font-bold text-red-600">{{ $izins->where('status', 'ditolak')->count() }}</p>
                </div>
                <div class="bg-red-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Pengajuan Izin Pending --}}
    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center space-x-3">
                <div class="bg-gradient-to-r from-yellow-400 to-orange-500 p-2 rounded-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800">Pengajuan Menunggu Persetujuan</h3>
            </div>
            <div class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">
                {{ $izins->where('status', 'menunggu')->count() }} pending
            </div>
        </div>
        
        <div class="overflow-hidden rounded-xl border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Siswa</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status Kehadiran</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Bukti</th>
                        <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($izins->where('status', 'menunggu') as $izin)
                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <div class="h-10 w-10 rounded-full bg-gradient-to-r from-purple-400 to-blue-500 flex items-center justify-center">
                                            <span class="text-white font-medium text-sm">{{ substr($izin->nama_anak, 0, 2) }}</span>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $izin->nama_anak }}</div>
                                        <div class="text-sm text-gray-500">{{ $izin->kelas }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                {{ $izin->tanggal ? date('d M Y', strtotime($izin->tanggal)) : '-' }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                    {{ $izin->status_kehadiran == 'sakit' ? 'bg-red-100 text-red-800' : 
                                       ($izin->status_kehadiran == 'izin' ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800') }}">
                                    {{ ucfirst($izin->status_kehadiran) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @if($izin->bukti)
                                    <a href="{{ asset('storage/' . $izin->bukti) }}" target="_blank" class="group">
                                        <img src="{{ asset('storage/' . $izin->bukti) }}" 
                                             class="h-12 w-12 rounded-lg object-cover border-2 border-gray-200 group-hover:border-blue-400 transition-colors">
                                    </a>
                                @else
                                    <div class="h-12 w-12 rounded-lg bg-gray-100 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center space-x-2">
                                    <form action="{{ route('walikelas.izin.update', $izin->id) }}" method="POST" class="inline approval-form">
                                        @csrf @method('PUT')
                                        <input type="hidden" name="status" value="disetujui">
                                        <button type="submit" 
                                                class="bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-2 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-200 shadow-md hover:shadow-lg flex items-center space-x-1"
                                                onclick="return confirm('Apakah Anda yakin ingin menyetujui pengajuan ini?')">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                            <span>Setujui</span>
                                        </button>
                                    </form>
                                    <form action="{{ route('walikelas.izin.update', $izin->id) }}" method="POST" class="inline approval-form">
                                        @csrf @method('PUT')
                                        <input type="hidden" name="status" value="ditolak">
                                        <button type="submit" 
                                                class="bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-200 shadow-md hover:shadow-lg flex items-center space-x-1"
                                                onclick="return confirm('Apakah Anda yakin ingin menolak pengajuan ini?')">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                            <span>Tolak</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    <p class="text-gray-500 text-lg font-medium">Tidak ada pengajuan yang menunggu</p>
                                    <p class="text-gray-400 text-sm">Semua pengajuan telah diproses</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Riwayat Semua Izin --}}
    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center space-x-3">
                <div class="bg-gradient-to-r from-blue-500 to-purple-600 p-2 rounded-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800">Riwayat Semua Pengajuan</h3>
            </div>
            <div class="flex items-center space-x-2">
                <select class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>Semua Status</option>
                    <option>Disetujui</option>
                    <option>Ditolak</option>
                    <option>Menunggu</option>
                </select>
            </div>
        </div>
        
        <div class="overflow-hidden rounded-xl border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Siswa</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status Kehadiran</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status Pengajuan</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Waktu Diproses</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($izins as $izin)
                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <div class="h-10 w-10 rounded-full bg-gradient-to-r from-indigo-400 to-purple-500 flex items-center justify-center">
                                            <span class="text-white font-medium text-sm">{{ substr($izin->nama_anak, 0, 2) }}</span>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $izin->nama_anak }}</div>
                                        <div class="text-sm text-gray-500">{{ $izin->kelas }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                {{ $izin->tanggal ? date('d M Y', strtotime($izin->tanggal)) : '-' }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                    {{ $izin->status_kehadiran == 'sakit' ? 'bg-red-100 text-red-800' : 
                                       ($izin->status_kehadiran == 'izin' ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800') }}">
                                    {{ ucfirst($izin->status_kehadiran) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full
                                    @if($izin->status == 'disetujui') bg-green-100 text-green-800
                                    @elseif($izin->status == 'ditolak') bg-red-100 text-red-800
                                    @else bg-yellow-100 text-yellow-800 @endif">
                                    @if($izin->status == 'disetujui')
                                        ✓ {{ ucfirst($izin->status) }}
                                    @elseif($izin->status == 'ditolak')
                                        ✗ {{ ucfirst($izin->status) }}
                                    @else
                                        ⏳ {{ ucfirst($izin->status) }}
                                    @endif
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $izin->updated_at ? $izin->updated_at->diffForHumans() : '-' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    <p class="text-gray-500 text-lg font-medium">Belum ada riwayat pengajuan</p>
                                    <p class="text-gray-400 text-sm">Riwayat akan muncul setelah ada pengajuan izin</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session('success') }}',
        confirmButtonText: 'Tutup',
        confirmButtonColor: '#10b981',
        timer: 3000,
        timerProgressBar: true,
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops!',
        text: '{{ session('error') }}',
        confirmButtonText: 'Tutup',
        confirmButtonColor: '#ef4444',
        timer: 3000,
        timerProgressBar: true
    });
</script>
@endif

{{-- Auto refresh untuk data real-time --}}
<script>
    // Refresh halaman setiap 5 menit untuk data terbaru
    setTimeout(function(){
        location.reload();
    }, 300000); // 5 menit

    // Animasi loading hanya untuk form di dashboard (bukan logout)
    document.querySelectorAll('.approval-form button[type="submit"]').forEach(button => {
        button.addEventListener('click', function() {
            const originalText = this.innerHTML;
            this.innerHTML = '<svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Memproses...';
            this.disabled = true;
            
            // Reset jika ada error (tidak redirect)
            setTimeout(() => {
                this.innerHTML = originalText;
                this.disabled = false;
            }, 5000);
        });
    });
</script>
@endpush

@push('styles')
<style>
    /* Custom animations */
    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-slideInUp {
        animation: slideInUp 0.5s ease-out;
    }
    
    /* Smooth transitions */
    * {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }
    
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }
    
    ::-webkit-scrollbar-thumb {
        background: linear-gradient(45deg, #667eea, #764ba2);
        border-radius: 4px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(45deg, #5a6fd8, #6a4190);
    }
</style>
@endpush