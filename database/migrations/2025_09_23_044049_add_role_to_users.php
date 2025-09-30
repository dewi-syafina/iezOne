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
        // migration snippet: add role to users
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('siswa'); // values: siswa, orangtua, walikelas, admin
        });
    }


    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('role');
        });
    }
};
