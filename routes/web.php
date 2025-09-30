<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Siswa\DashboardSiswaController;
use App\Http\Controllers\Auth\CustomLoginController;
use App\Http\Controllers\OrangTua\IzinController as OrangTuaIzinController;
use App\Http\Controllers\WaliKelas\PengajuanController as WaliPengajuanController;
use App\Http\Controllers\Siswa\StatusController as SiswaStatusController;
use App\Http\Controllers\Siswa\DashboardController as SiswaDashboardController;
use App\Http\Controllers\Siswa\IzinController as SiswaIzinController;
use App\Http\Controllers\WaliKelas\DashboardController as WaliDashboardController;
use App\Http\Controllers\OrangTua\DashboardController as OrangTuaDashboardController;

Route::get('/', function () {
    return view('welcome');
});

// ======================= DASHBOARD UTAMA (redirect sesuai role) =======================
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// ======================= PROFILE =======================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ======================= ORANG TUA =======================
Route::middleware(['auth'])->prefix('orangtua')->name('orangtua.')->group(function () {
    Route::get('/izin', [OrangTuaIzinController::class, 'index'])->name('izin.index');
    Route::get('/izin/create', [OrangTuaIzinController::class, 'create'])->name('izin.create');
    Route::post('/izin', [OrangTuaIzinController::class, 'store'])->name('izin.store');
    Route::get('/dashboard', [OrangTuaDashboardController::class, 'index'])->name('dashboard');
});

// ======================= WALI KELAS =======================
Route::middleware(['auth'])->prefix('walikelas')->name('walikelas.')->group(function () {
    Route::get('/pengajuan', [WaliPengajuanController::class, 'index'])->name('pengajuan.index');
    Route::patch('/pengajuan/{izin}', [WaliPengajuanController::class, 'updateStatus'])->name('pengajuan.update');
    Route::get('/dashboard', [WaliDashboardController::class, 'index'])->name('dashboard');

    // update status izin
    Route::put('/izin/{izin}', [WaliPengajuanController::class, 'updateStatus'])->name('izin.update');
});

// ======================= SISWA =======================
Route::middleware(['auth'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/status', [SiswaStatusController::class, 'index'])->name('status.index');
    Route::get('/dashboard', [SiswaDashboardController::class, 'index'])->name('dashboard');

    // izin siswa
    Route::get('/izin', [SiswaIzinController::class, 'index'])->name('izin.index');
    Route::get('/izin/create', [SiswaIzinController::class, 'create'])->name('izin.create');
    Route::post('/izin', [SiswaIzinController::class, 'store'])->name('izin.store');
    Route::get('/izin/{izin}', [SiswaIzinController::class, 'show'])->name('izin.show');
});

// ======================= LOGIN CUSTOM =======================
Route::get('/login', [CustomLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [CustomLoginController::class, 'login'])->name('login.custom');
Route::post('/logout', [CustomLoginController::class, 'logout'])->name('logout');

// ======================= AUTH LAIN (REGISTER, RESET PASSWORD) =======================
// catatan: login/logout bawaan JANGAN dipakai, biar nggak bentrok dengan CustomLoginController
require __DIR__.'/auth.php';
