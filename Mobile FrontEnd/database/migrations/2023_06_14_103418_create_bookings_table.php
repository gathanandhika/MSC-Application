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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pelanggan');
            $table->foreignId('id_lapangan');
            $table->date('tanggal');
            $table->string('waktu_mulai');
            $table->string('waktu_selesai');
            $table->integer('biaya');
            $table->string('nama_tim');
            $table->string('tipe');
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
