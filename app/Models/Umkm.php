<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $fillable = ['nama_produk', 'harga', 'nama_penjual', 'whatsapp', 'deskripsi'];
}