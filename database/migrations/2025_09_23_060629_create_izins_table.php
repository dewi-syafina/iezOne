<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('izins', function (Blueprint $table) {
            $table->id();
            
            // Relasi siswa
            $table->foreignId('siswa_id')
                  ->nullable()
                  ->constrained('siswas')
                  ->onDelete('cascade');

            // Relasi orang tua
            $table->foreignId('orang_tua_id')
                  ->nullable()
                  ->constrained('users')
                  ->onDelete('cascade');

            // Data izin
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->text('alasan');
            $table->string('bukti')->nullable();
            $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending');
            $table->text('catatan_wali')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('izins');
    }
};
