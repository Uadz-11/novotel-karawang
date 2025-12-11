<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kamars', function (Blueprint $table) {
            // Cek kolom mana yang belum ada, tambahkan jika belum ada
            if (!Schema::hasColumn('kamars', 'tipe_kamar')) {
                $table->string('tipe_kamar')->after('nomor_kamar');
            }
            if (!Schema::hasColumn('kamars', 'harga')) {
                $table->decimal('harga', 10, 2)->after('tipe_kamar');
            }
            if (!Schema::hasColumn('kamars', 'status')) {
                $table->enum('status', ['tersedia', 'terisi'])->default('tersedia')->after('harga');
            }
        });
    }

    public function down(): void
    {
        Schema::table('kamars', function (Blueprint $table) {
            $table->dropColumn(['tipe_kamar', 'harga', 'status']);
        });
    }
};