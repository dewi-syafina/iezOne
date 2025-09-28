<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->unsignedBigInteger('orang_tua_id')->nullable()->after('id');

            $table->foreign('orang_tua_id')
                  ->references('id')->on('users') // asumsi orang tua disimpan di tabel users
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->unsignedBigInteger('orang_tua_id')->nullable()->after('id');

            $table->foreign('orang_tua_id')
                  ->references('id')->on('users') // asumsi orang tua disimpan di tabel users
                  ->onDelete('cascade');
        });
    }
};
