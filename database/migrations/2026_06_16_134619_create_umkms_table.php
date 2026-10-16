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
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->integer('harga'); // Nilai harga berupa angka (contoh: 15000)
            $table->string('nama_penjual');
            $table->string('whatsapp'); // Nomor WA penjual (contoh: 62812345678)
            $table->text('deskripsi'); // Penjelasan produk
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkms');
    }
};
