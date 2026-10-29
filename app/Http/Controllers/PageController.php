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
        // plus hitungan nyata usaha UMKM agar hero tidak menampilkan klaim statis.
        $statistik = [
            'total_penduduk' => 3218,
            'kepala_keluarga' => 860,
        ];
        $jumlah_umkm = \App\Models\Umkm::count();

        return view('welcome', compact('berita_terbaru', 'statistik', 'jumlah_umkm'));
    }

    // 2. Halaman Profil Desa
    public function profil()
    {
        return view('profil');
    }

    // 3. Halaman Direktori UMKM Desa (Dinamis)
    public function umkm(Request $request)
    {
        $kategori = $request->query('kategori');

        // Urutkan per kategori agar direktori mudah dipindai.
        $semua_umkm = Umkm::query()
            ->when($kategori, fn ($query) => $query->where('kategori', $kategori))
            ->orderBy('kategori')
            ->orderBy('nama_produk')
            ->get();

        $daftar_kategori = Umkm::query()
            ->select('kategori')
            ->whereNotNull('kategori')
            ->distinct()
            ->orderBy('kategori')
            ->pluck('kategori');

        $total_umkm = Umkm::count();

        return view('umkm', compact('semua_umkm', 'daftar_kategori', 'total_umkm', 'kategori'));
    }

    // 4. Halaman Data Demografi Penduduk Desa
    public function penduduk()
    {
        // Menyusun data statistik demografi Desa Rantau Jaya
        // Sumber: Monografi Desa Rantau Jaya, rekapitulasi akhir Desember 2024.
        $statistik = [
            'total_penduduk' => 3218,
            'kepala_keluarga' => 860,
            'wajib_ktp' => 2865,
            'pria' => 1595,
            'wanita' => 1623,
            'dusun_1' => 566,
            'dusun_2' => 1009,
            'dusun_3' => 917,
            'dusun_4' => 762,
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