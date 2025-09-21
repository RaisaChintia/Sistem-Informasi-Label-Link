<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pasien', function (Blueprint $table) {
            // tambah kolom baru
            $table->string('tempat_lahir')->after('nama');
            $table->date('tanggal_lahir')->nullable()->after('tempat_lahir');

            // hapus kolom ttl lama
            $table->dropColumn('ttl');
        });
    }

    public function down(): void
    {
        Schema::table('pasien', function (Blueprint $table) {
            // rollback ke struktur lama
            $table->dropColumn(['tempat_lahir', 'tanggal_lahir']);
            $table->string('ttl')->nullable();
        });
    }
};
