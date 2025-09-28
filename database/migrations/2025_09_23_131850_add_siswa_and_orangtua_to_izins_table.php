<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
        {
            Schema::table('izins', function (Blueprint $table) {
                $table->unsignedBigInteger('siswa_id')->nullable()->after('id');
                $table->unsignedBigInteger('orang_tua_id')->nullable()->after('siswa_id');

                $table->foreign('siswa_id')->references('id')->on('siswas')->onDelete('cascade');
                $table->foreign('orang_tua_id')->references('id')->on('users')->onDelete('cascade');
            });
        }

        public function down()
        {
            Schema::table('izins', function (Blueprint $table) {
                $table->dropForeign(['siswa_id']);
                $table->dropForeign(['orang_tua_id']);
                $table->dropColumn(['siswa_id', 'orang_tua_id']);
            });
        }

};
