<?php

namespace Database\Seeders;

use App\Models\Umkm;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UmkmSeeder extends Seeder
{
    /**
     * Mengisi direktori UMKM dari hasil pendataan Profil Desa Rantau Jaya 2025.
     * Sumber: database/data/umkm-rantau-jaya.json.
     */
    public function run(): void
    {
        $path = database_path('data/umkm-rantau-jaya.json');

        if (! File::exists($path)) {
            $this->command?->warn("Berkas data UMKM tidak ditemukan: {$path}");

            return;
        }

        $usaha = json_decode(File::get($path), true);

        if (! is_array($usaha)) {
            $this->command?->error('Berkas data UMKM tidak dapat dibaca.');

            return;
        }

        DB::transaction(function () use ($usaha) {
            foreach ($usaha as $item) {
                Umkm::updateOrCreate(
                    ['nama_produk' => $item['nama']],
                    [
                        'kategori' => $item['kategori'],
                        'deskripsi' => $item['deskripsi'],
                        'alamat' => $item['alamat'],
                        'whatsapp' => $item['whatsapp'],
                        'maps_url' => $item['maps_url'],
                        'harga' => null,
                        'nama_penjual' => null,
                    ]
                );
            }
        });

        $this->command?->info('Direktori UMKM: '.count($usaha).' usaha dimuat.');
    }
}
