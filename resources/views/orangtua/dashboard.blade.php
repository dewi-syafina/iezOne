@extends('layouts.app')

@section('header')
    <div class="flex items-center justify-between">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Dashboard Orang Tua
        </h2>
        <div class="flex items-center space-x-4">
            <div class="text-sm text-gray-500">
                {{ now()->format('F, Y') }}
            </div>
            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-semibold">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 py-6">
    <div class="container mx-auto px-6">
        
        {{-- Welcome Section --}}
        <div class="bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 rounded-2xl shadow-xl p-8 mb-8 text-white relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-5 rounded-full -ml-24 -mb-24"></div>
            <div class="relative z-10">
                <h3 class="text-2xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}!</h3>
                <p class="text-blue-100 mb-6">Kelola keperluan sekolah anak Anda dengan mudah dan cepat</p>
                <div class="flex flex-wrap gap-4">
                    <div class="bg-white bg-opacity-20 rounded-lg px-4 py-2 backdrop-blur-sm">
                        <div class="text-sm text-blue-100">Anak Anda</div>
                        <div class="font-semibold">{{ optional(Auth::user()->siswa)->nama ?? 'Belum ada data siswa' }}</div>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-lg px-4 py-2 backdrop-blur-sm">
                        <div class="text-sm text-blue-100">Kelas</div>
                        <div class="font-semibold">{{ optional(Auth::user()->siswa)->kelas ?? 'Belum ada data' }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            {{-- Left Column - Form --}}
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Surat Izin Siswa</h3>
                            <p class="text-gray-500">Lengkapi form untuk mengajukan izin</p>
                        </div>
                    </div>

                    <form action="{{ route('orangtua.izin.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        {{-- Student Info Cards --}}
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Siswa</label>
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <span class="font-medium text-gray-800">{{ optional(Auth::user()->siswa)->nama ?? 'Belum ada data siswa' }}</span>
                                </div>
                            </div>

                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Kelas</label>
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                                        <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                    </div>
                                    <span class="font-medium text-gray-800">{{ optional(Auth::user()->siswa)->kelas ?? 'Belum ada data' }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Status Kehadiran --}}
                        <div class="space-y-2">
                            <label for="status_kehadiran" class="block text-sm font-semibold text-gray-700">Status Kehadiran *</label>
                            <select name="status_kehadiran" id="status_kehadiran"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-white" required>
                                <option value="">Pilih Status Kehadiran</option>
                                <option value="izin">🌿 Izin - Tidak hadir dengan izin</option>
                                <option value="sakit">🤒 Sakit - Tidak hadir karena sakit</option>
                                <option value="dispensasi">📄 Dispensasi - Izin khusus sekolah</option>
                            </select>
                        </div>

                        {{-- Keterangan Tambahan --}}
                        <div class="space-y-2">
                            <label for="alasan" class="block text-sm font-semibold text-gray-700">Keterangan Tambahan</label>
                            <textarea name="alasan" id="alasan" rows="4" 
                                placeholder="Tambahkan keterangan detail jika diperlukan..."
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 resize-none"></textarea>
                        </div>

                        {{-- Upload Surat Keterangan --}}
                        <div class="space-y-2">
                            <label for="bukti" class="block text-sm font-semibold text-gray-700">Upload Surat Keterangan *</label>
                            <div class="border-2 border-dashed border-gray-200 rounded-xl p-6 text-center hover:border-blue-300 transition-colors duration-200">
                                <div class="w-12 h-12 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                </div>
                                <input type="file" name="bukti" id="bukti" 
                                    accept=".pdf,image/*"
                                    class="hidden" required>
                                <label for="bukti" class="cursor-pointer">
                                    <span class="text-blue-600 font-semibold hover:text-blue-700">Klik untuk upload file</span>
                                    <p class="text-gray-500 text-sm mt-2">PDF, JPG, PNG (Max 5MB)</p>
                                </label>
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <button type="submit" 
                            class="w-full bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-6 py-4 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Kirim Pengajuan Izin</span>
                        </button>
                    </form>
                </div>
            </div>

            {{-- Right Column - Quick Stats --}}
            <div class="space-y-6">
                {{-- Quick Stats --}}
                <div class="bg-white rounded-2xl shadow-xl p-6">
                    <h4 class="font-bold text-gray-800 mb-4">Status Izin</h4>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-3 bg-yellow-50 rounded-xl">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span class="ml-3 text-sm font-medium text-gray-700">Menunggu</span>
                            </div>
                            <span class="font-bold text-yellow-600">{{ $izins->where('status', 'menunggu')->count() }}</span>
                        </div>

                        <div class="flex items-center justify-between p-3 bg-green-50 rounded-xl">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="ml-3 text-sm font-medium text-gray-700">Disetujui</span>
                            </div>
                            <span class="font-bold text-green-600">{{ $izins->where('status', 'disetujui')->count() }}</span>
                        </div>

                        <div class="flex items-center justify-between p-3 bg-red-50 rounded-xl">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </div>
                                <span class="ml-3 text-sm font-medium text-gray-700">Ditolak</span>
                            </div>
                            <span class="font-bold text-red-600">{{ $izins->where('status', 'ditolak')->count() }}</span>
                        </div>
                    </div>
                </div>

                {{-- Calendar Widget --}}
                <div class="bg-white rounded-2xl shadow-xl p-6">
                    <h4 class="font-bold text-gray-800 mb-4">{{ now()->format('F Y') }}</h4>
                    <div class="grid grid-cols-7 gap-1 text-center text-xs">
                        <div class="p-2 font-semibold text-gray-500">Min</div>
                        <div class="p-2 font-semibold text-gray-500">Sen</div>
                        <div class="p-2 font-semibold text-gray-500">Sel</div>
                        <div class="p-2 font-semibold text-gray-500">Rab</div>
                        <div class="p-2 font-semibold text-gray-500">Kam</div>
                        <div class="p-2 font-semibold text-gray-500">Jum</div>
                        <div class="p-2 font-semibold text-gray-500">Sab</div>
                        
                        @php
                            $startOfMonth = now()->startOfMonth();
                            $endOfMonth = now()->endOfMonth();
                            $startDate = $startOfMonth->copy()->startOfWeek();
                            $endDate = $endOfMonth->copy()->endOfWeek();
                        @endphp
                        
                        @for($date = $startDate; $date <= $endDate; $date->addDay())
                            <div class="p-2 {{ $date->month !== now()->month ? 'text-gray-300' : '' }} {{ $date->isToday() ? 'bg-blue-500 text-white rounded-full' : 'hover:bg-gray-100 rounded' }}">
                                {{ $date->day }}
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        {{-- Riwayat Pengajuan Izin --}}
        <div class="bg-white rounded-2xl shadow-xl p-8 mt-8">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">Riwayat Pengajuan</h3>
                        <p class="text-gray-500">Daftar semua pengajuan izin yang telah dibuat</p>
                    </div>
                </div>
                <div class="text-sm text-gray-500">
                    Total: {{ $izins->count() }} pengajuan
                </div>
            </div>

            <div class="overflow-hidden border border-gray-100 rounded-xl">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Siswa</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status Kehadiran</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Keterangan</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Bukti</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($izins as $izin)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div>
                                        <div class="font-medium text-gray-900">{{ $izin->nama_anak }}</div>
                                        <div class="text-sm text-gray-500">{{ $izin->kelas }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                        @if($izin->status_kehadiran == 'izin') bg-blue-100 text-blue-800
                                        @elseif($izin->status_kehadiran == 'sakit') bg-red-100 text-red-800
                                        @elseif($izin->status_kehadiran == 'dispensasi') bg-purple-100 text-purple-800
                                        @endif">
                                        @if($izin->status_kehadiran == 'izin') 🌿
                                        @elseif($izin->status_kehadiran == 'sakit') 🤒
                                        @elseif($izin->status_kehadiran == 'dispensasi') 📄
                                        @endif
                                        {{ ucfirst($izin->status_kehadiran) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 max-w-xs truncate">
                                        {{ $izin->alasan ?? '-' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($izin->bukti)
                                        <a href="{{ asset('storage/' . $izin->bukti) }}" target="_blank" 
                                           class="inline-flex items-center px-3 py-1 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-150">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            Lihat
                                        </a>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                        @if($izin->status == 'menunggu') bg-yellow-100 text-yellow-800
                                        @elseif($izin->status == 'disetujui') bg-green-100 text-green-800
                                        @elseif($izin->status == 'ditolak') bg-red-100 text-red-800
                                        @endif">
                                        @if($izin->status == 'menunggu') ⏳
                                        @elseif($izin->status == 'disetujui') ✅
                                        @elseif($izin->status == 'ditolak') ❌
                                        @endif
                                        {{ ucfirst($izin->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $izin->created_at->format('d M Y') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                        </div>
                                        <p class="text-gray-500 font-medium">Belum ada pengajuan izin</p>
                                        <p class="text-gray-400 text-sm">Buat pengajuan izin pertama Anda menggunakan form di atas</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Silahkan kirim surat fisik ke sekolah maksimal jam 09.00 WIB',
                confirmButtonText: 'Tutup',
                confirmButtonColor: '#3085d6',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            });
        </script>
    @endif

    {{-- File Upload Enhancement --}}
    <script>
        document.getElementById('bukti').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const label = e.target.parentElement.querySelector('label span');
            
            if (file) {
                label.textContent = file.name;
                label.parentElement.querySelector('p').textContent = `File dipilih: ${(file.size / 1024 / 1024).toFixed(2)} MB`;
            }
        });
    </script>
@endpush

@push('styles')
    <style>
        .animate__animated {
            animation-duration: 0.5s;
            animation-fill-mode: both;
        }
        
        .animate__fadeInDown {
            animation-name: fadeInDown;
        }
        
        .animate__fadeOutUp {
            animation-name: fadeOutUp;
        }
        
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translate3d(0, -100%, 0);
            }
            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }
        
        @keyframes fadeOutUp {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
                transform: translate3d(0, -100%, 0);
            }
        }
    </style>
@endpush