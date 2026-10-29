<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Halaman UMKM kini berupa direktori usaha warga, bukan katalog produk.
     * Harga dan nama penjual tidak lagi wajib, sedangkan kategori, alamat,
     * dan tautan peta ditambahkan.
     */
    public function up(): void
    {
        Schema::table('umkms', function (Blueprint $table) {
            $table->string('kategori')->nullable()->after('nama_produk');
            $table->text('alamat')->nullable()->after('deskripsi');
            $table->string('maps_url')->nullable()->after('alamat');
        });

        Schema::table('umkms', function (Blueprint $table) {
            $table->integer('harga')->nullable()->change();
            $table->string('nama_penjual')->nullable()->change();
            $table->string('whatsapp')->nullable()->change();
            $table->text('deskripsi')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('umkms', function (Blueprint $table) {
            $table->dropColumn(['kategori', 'alamat', 'maps_url']);
        });

        Schema::table('umkms', function (Blueprint $table) {
            $table->integer('harga')->nullable(false)->change();
            $table->string('nama_penjual')->nullable(false)->change();
            $table->string('whatsapp')->nullable(false)->change();
            $table->text('deskripsi')->nullable(false)->change();
        });
    }
};
