<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Berita;
use App\Models\Umkm;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        $semua_pengaduan = Pengaduan::orderBy('created_at', 'desc')->get();

        return view('admin', compact('semua_pengaduan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:Pending,Diproses,Selesai',
        ]);

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->status = $validated['status'];
        $pengaduan->save();

        return redirect()->route('admin.dashboard')->with('sukses_aksi', 'Status laporan berhasil diperbarui menjadi ' . $validated['status']);
    }

    public function hapusPengaduan($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->delete();

        return back()->with('sukses_aksi', 'Laporan berhasil dihapus secara permanen.');
    }

    public function cetakPdf(Request $request)
    {
        $pengaduan = Pengaduan::orderBy('created_at', 'desc')->get();
        $pdf = Pdf::loadView('laporan-pdf', ['semua_pengaduan' => $pengaduan]);
        $pdf->setPaper('A4', 'portrait');

        if ($request->has('download')) {
            return $pdf->download('Laporan_Aspirasi_Desa_Rantau_Jaya.pdf');
        }

        return $pdf->stream('Laporan_Aspirasi_Desa_Rantau_Jaya.pdf');
    }

    public function simpanBerita(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'ringkasan' => 'required|string',
            'isi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $pathGambar = null;
        if ($request->hasFile('gambar')) {
            $pathGambar = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'ringkasan' => $request->ringkasan,
            'isi' => $request->isi,
            'gambar' => $pathGambar,
        ]);

        return back()->with('sukses_berita', 'Berita & Gambar berhasil diterbitkan!');
    }

    public function simpanUmkm(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|integer',
            'nama_penjual' => 'required|string|max:100',
            'whatsapp' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        Umkm::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'nama_penjual' => $request->nama_penjual,
            'whatsapp' => $request->whatsapp,
            'deskripsi' => $request->deskripsi,
        ]);

        return back()->with('sukses_umkm', 'Produk UMKM warga berhasil didaftarkan ke sistem Lapak Desa!');
    }
}
