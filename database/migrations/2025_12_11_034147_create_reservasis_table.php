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
        Schema::create('reservasis', function (Blueprint $table) {
    $table->id();
    $table->foreignId('tamu_id')->constrained()->onDelete('cascade');
    $table->foreignId('kamar_id')->constrained()->onDelete('cascade');
    $table->date('check_in');
    $table->date('check_out');
    $table->integer('total_bayar');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasis');
    }
};
