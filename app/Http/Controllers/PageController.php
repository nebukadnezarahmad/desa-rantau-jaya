<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Berita;
use Illuminate\Support\Facades\Auth;
use App\Models\Umkm;

class PageController extends Controller
{
    // 1. Halaman Beranda (Ambil data dari Database)
    public function beranda()
    {
        // Mengambil 3 berita terbaru dari database
        $berita_terbaru = \App\Models\Berita::latest()->take(3)->get();

        // Statistik ringkas dari sumber yang sama dengan halaman Data Penduduk,
        // plus hitungan nyata produk UMKM agar hero tidak menampilkan klaim statis.
        $statistik = [
            'total_penduduk' => 3450,
            'kepala_keluarga' => 980,
        ];
        $jumlah_umkm = \App\Models\Umkm::count();

        return view('welcome', compact('berita_terbaru', 'statistik', 'jumlah_umkm'));
    }

    // 2. Halaman Profil Desa
    public function profil()
    {
        return view('profil');
    }

    // 3. Halaman Lapak UMKM Desa (Dinamis MySQL)
    public function umkm()
    {
        // Mengambil semua data produk UMKM warga dari database
        $semua_umkm = \App\Models\Umkm::latest()->get();
        
        return view('umkm', compact('semua_umkm'));
    }

    // 4. Halaman Data Demografi Penduduk Desa
    public function penduduk()
    {
        // Menyusun data statistik demografi Desa Rantau Jaya
        $statistik = [
            'total_penduduk' => 3450,
            'kepala_keluarga' => 980,
            'wajib_pilih' => 2100,
            'pria' => 1780,
            'wanita' => 1670,
            'dusun_1' => 1200,
            'dusun_2' => 1150,
            'dusun_3' => 1100,
        ];

        return view('penduduk', compact('statistik'));
    }

    // 5. Halaman Kontak & Form Pengaduan Warga (Dinamis)
    public function kontak()
    {
        // Ambil semua laporan warga untuk pelacakan transparansi publik
        $laporan_warga = \App\Models\Pengaduan::latest()->get();

        return view('kontak', compact('laporan_warga'));
    }

    // 6. Memproses Pengiriman Data Pengaduan ke MySQL Database
    public function simpanPengaduan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'kategori' => 'required',
            'isi_laporan' => 'required|string|min:10',
        ]);

        \App\Models\Pengaduan::create([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'isi_laporan' => $request->isi_laporan,
        ]);

        return redirect()->back()->with('sukses', 'Terima kasih! Laporan Anda resmi tersimpan di database Desa Rantau Jaya.');
    }

    // Fungsi untuk menampilkan halaman seluruh berita desa
    public function semuaBerita()
    {
        $semua_berita = Berita::latest()->get();
        return view('berita', compact('semua_berita'));
    }

    // Halaman Form Login
    public function halamanLogin()
    {
        return view('login');
    }

    // Memproses Verifikasi Login
    public function prosesLogin(Request $request)
    {
        $kredensial = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Maaf, alamat email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // Memproses Logout Kembali
    public function prosesLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('beranda');
    }

}