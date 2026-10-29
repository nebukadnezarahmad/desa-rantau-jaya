<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $fillable = [
        'nama_produk',
        'kategori',
        'harga',
        'nama_penjual',
        'whatsapp',
        'alamat',
        'maps_url',
        'deskripsi',
    ];
}
