<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            if (!Schema::hasColumn('siswas', 'orangtua_id')) {
                $table->unsignedBigInteger('orangtua_id')->nullable()->after('id');

                $table->foreign('orangtua_id')
                      ->references('id')->on('users') // orang tua ada di tabel users
                      ->onDelete('cascade');
            }
        });
    }

    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->dropForeign(['orangtua_id']);
            $table->dropColumn('orangtua_id');
        });
    }
};
