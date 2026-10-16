@extends('layouts.app')

@section('content')

<!-- INJEKSI CSS CUSTOM UNTUK ANIMASI MORPH & STAGGERED ENTRANCE -->
<style>
    /* 1. Transisi Halus Bawaan (Smooth Spring) */
    .smooth-spring {
        transition-property: all;
        transition-duration: 500ms;
        transition-timing-function: cubic-bezier(0.16, 1, 0.3, 1);
    }

    /* 2. Animasi Morphing Latar Belakang (Blob) di Hero */
    @keyframes morph-blob {
        0% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; transform: rotate(0deg) scale(1); }
        50% { border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%; transform: rotate(10deg) scale(1.05); }
        100% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; transform: rotate(0deg) scale(1); }
    }
    .animate-blob {
        animation: morph-blob 15s ease-in-out infinite;
    }

    /* 3. Animasi Muncul Berurutan (Fade Up Spring) untuk Kartu */
    @keyframes fade-up-spring {
        0% { opacity: 0; transform: translateY(40px) scale(0.95); }
        100% { opacity: 1; transform: translateY(0) scale(1); }
    }
    .animate-entrance {
        opacity: 0;
        animation: fade-up-spring 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
</style>

<!-- ================= BANNER HALAMAN PREMIUM ================= -->
<div class="relative bg-emerald-950 text-white py-24 md:py-32 overflow-hidden">
    <!-- Ambient Background & Overlay -->
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&q=80&w=2000')] bg-cover bg-center opacity-10 mix-blend-screen"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-emerald-900/80 to-transparent"></div>
    
    <!-- Ornamen Glow Estetik Latar Belakang dengan Animasi Morph Murni CSS -->
    <div class="absolute -top-20 right-1/4 w-[600px] h-[600px] bg-emerald-500/20 blur-[100px] pointer-events-none animate-blob"></div>
    <div class="absolute -bottom-20 left-1/4 w-[500px] h-[500px] bg-yellow-500/10 blur-[100px] pointer-events-none animate-blob" style="animation-delay: -5s; animation-direction: reverse;"></div>

    <div class="relative max-w-5xl mx-auto px-4 text-center z-10 animate-entrance" style="animation-delay: 0.1s;">
        <h1 class="text-4xl md:text-6xl font-black tracking-tight leading-tight mb-4 transition-all duration-500 hover:tracking-normal">
            Pusat Pengaduan <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-yellow-500">Warga</span>
        </h1>
        <p class="text-base md:text-lg text-emerald-100/70 max-w-2xl mx-auto font-medium leading-relaxed">Sampaikan aspirasi, keluhan, atau kritik membangun secara aman dan transparan demi kemajuan bersama Desa Rantau Jaya.</p>
    </div>
</div>

<!-- ================= GRID KONTEN UTAMA (BENTO STYLE) ================= -->
<div class="bg-gray-50 py-12 relative border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-12 gap-8 relative z-10 -mt-24">
        
        <!-- === SEBELAH KIRI (4 KOLOM): WIDGET KONTAK KANTOR === -->
        <div class="lg:col-span-4 space-y-6">
            <div class="bg-white/90 backdrop-blur-xl p-8 rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white smooth-spring hover:shadow-[0_20px_50px_rgb(0,0,0,0.08)] animate-entrance" style="animation-delay: 0.2s;">
                <h3 class="text-2xl font-black text-emerald-950 mb-1">Hubungi Kami</h3>
                <p class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-8">Informasi Kontak Resmi</p>
                
                <div class="space-y-6">
                    <!-- Widget Alamat -->
                    <div class="flex items-start gap-4 group smooth-spring">
                        <div class="w-12 h-12 rounded-2xl bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-600 flex-shrink-0 group-hover:scale-110 group-hover:bg-emerald-600 group-hover:text-white smooth-spring">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div>
                            <span class="block text-[10px] font-black text-gray-500 uppercase tracking-widest">Alamat Kantor Desa</span>
                            <p class="text-sm font-semibold text-gray-700 mt-1">Jl. Lintas Desa No. 01, Rantau Jaya, Kecamatan Makmur</p>
                        </div>
                    </div>

                    <!-- Widget Email -->
                    <div class="flex items-start gap-4 group smooth-spring">
                        <div class="w-12 h-12 rounded-2xl bg-yellow-50 border border-yellow-100 flex items-center justify-center text-yellow-600 flex-shrink-0 group-hover:scale-110 group-hover:bg-yellow-400 group-hover:text-emerald-950 smooth-spring">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <span class="block text-[10px] font-black text-gray-500 uppercase tracking-widest">Surat Elektronik (Email)</span>
                            <p class="text-sm font-bold text-emerald-600 mt-1">pemdes@rantaujaya.id</p>
                        </div>
                    </div>

                    <!-- Widget Telepon -->
                    <div class="flex items-start gap-4 group smooth-spring">
                        <div class="w-12 h-12 rounded-2xl bg-blue-50 border border-blue-100 flex items-center justify-center text-blue-600 flex-shrink-0 group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white smooth-spring">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <div>
                            <span class="block text-[10px] font-black text-gray-500 uppercase tracking-widest">Hotline / WhatsApp</span>
                            <p class="text-sm font-bold text-gray-700 mt-1">021-12345678</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Info Keamanan Data -->
            <div class="bg-gradient-to-br from-emerald-900 to-emerald-950 p-6 rounded-[2rem] text-center shadow-lg smooth-spring hover:-translate-y-1 animate-entrance" style="animation-delay: 0.3s;">
                <svg class="w-8 h-8 text-yellow-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                <h4 class="text-white font-bold text-sm mb-1">Privasi Dijamin Aman</h4>
                <p class="text-emerald-200/60 text-xs font-medium leading-relaxed">Identitas Anda akan disamarkan pada tabel publikasi demi melindungi privasi dan keamanan pelapor.</p>
            </div>
        </div>

        <!-- === SEBELAH KANAN (8 KOLOM): FORMULIR PENGADUAN DIGITAL === -->
        <div class="lg:col-span-8">
            <div class="bg-white/90 backdrop-blur-xl p-8 lg:p-10 rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white smooth-spring hover:shadow-[0_20px_50px_rgb(0,0,0,0.08)] animate-entrance" style="animation-delay: 0.4s;">
                
                <div class="mb-8">
                    <h3 class="text-2xl font-black text-emerald-950">Formulir Laporan Digital</h3>
                    <p class="text-sm font-medium text-gray-500 mt-1">Mohon isi data dengan jujur dan detail agar mudah ditindaklanjuti.</p>
                </div>

                <!-- Notifikasi Sukses Kirim Data -->
                @if(session('sukses'))
                    <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-5 py-4 rounded-2xl mb-8 text-sm font-semibold flex items-center gap-3 shadow-sm smooth-spring">
                        <div class="bg-emerald-500 text-white p-1 rounded-full">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <div>
                            <span class="block font-black">Laporan Terkirim!</span>
                            <span class="font-medium text-emerald-600 text-xs">{{ session('sukses') }}</span>
                        </div>
                    </div>
                @endif

                <form action="{{ route('pengaduan.kirim') }}" method="POST" class="space-y-6">
                    @csrf 

                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-2">Nama Lengkap / NIK</label>
                        <input type="text" name="nama" required placeholder="Masukkan nama atau ketik 'Anonim' jika ingin dirahasiakan..." 
                               class="w-full px-5 py-3.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:outline-none text-sm bg-gray-50/50 smooth-spring transition-shadow hover:shadow-sm">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-2">Kategori Pengaduan</label>
                        <select name="kategori" required 
                                class="w-full px-5 py-3.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:outline-none text-sm bg-gray-50/50 smooth-spring cursor-pointer hover:shadow-sm">
                            <option value="" disabled selected>-- Pilih Kategori yang Sesuai --</option>
                            <option value="Infrastruktur">Infrastruktur (Jalan, Lampu, Saluran Air, dll.)</option>
                            <option value="Bansos">Bantuan Sosial (PKH, BLT, Subsidi)</option>
                            <option value="Pelayanan">Pelayanan Administrasi Desa</option>
                            <option value="Lainnya">Lainnya / Aspirasi Umum</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-2">Detail Isi Laporan Pengaduan</label>
                        <textarea name="isi_laporan" rows="6" required placeholder="Tuliskan secara detail mengenai kronologi laporan, lokasi, atau saran Anda..." 
                                  class="w-full px-5 py-3.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:outline-none text-sm bg-gray-50/50 smooth-spring resize-y hover:shadow-sm">{{ old('isi_laporan') }}</textarea>
                        
                        @error('isi_laporan')
                            <p class="text-red-500 text-xs font-bold mt-2 flex items-center gap-1.5 bg-red-50 p-2 rounded-lg border border-red-100">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                Peringatan: Isi laporan terlalu pendek! Harap ketik minimal 10 karakter.
                            </p>
                        @enderror
                    </div>

                    <div class="pt-2">
                        <button type="submit" 
                                class="w-full flex items-center justify-center gap-2 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white font-black py-4 rounded-xl smooth-spring hover:shadow-[0_8px_20px_rgb(5,150,105,0.3)] hover:-translate-y-1 text-sm tracking-wide">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                            Kirim Laporan Pengaduan
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- ================= SECTION TRACKING PROGRES ADUAN ================= -->
<div class="bg-white py-20 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-12 animate-entrance" style="animation-delay: 0.5s;">
            <h3 class="text-3xl md:text-4xl font-black text-emerald-950">Pantau Progres Aduan</h3>
            <p class="text-sm font-medium text-gray-500 mt-3 max-w-2xl mx-auto">Kami berkomitmen untuk menindaklanjuti setiap laporan yang masuk. Berikut adalah status riwayat aspirasi yang telah diajukan warga.</p>
        </div>

        <div class="bg-white rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.03)] border border-gray-100 overflow-hidden animate-entrance" style="animation-delay: 0.6s;">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/80 border-b border-gray-100 text-[11px] font-black uppercase tracking-widest text-gray-500">
                            <th class="px-6 py-5 text-center w-16 rounded-tl-2xl">No</th>
                            <th class="px-6 py-5">Identitas Pelapor</th>
                            <th class="px-6 py-5">Kategori</th>
                            <th class="px-6 py-5">Isi Aspirasi / Keluhan</th>
                            <th class="px-6 py-5 text-center rounded-tr-2xl">Status Penanganan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 text-sm text-gray-600">
                        @forelse($laporan_warga as $index => $laporan)
                            <!-- Baris Tabel dengan Animasi Staggered yang Dihitung Otomatis Berdasarkan Index -->
                            <tr class="hover:bg-gray-50/50 smooth-spring group animate-entrance" style="animation-delay: {{ 0.7 + ($index * 0.1) }}s;">
                                <td class="px-6 py-6 text-center font-bold text-gray-500">{{ $index + 1 }}</td>
                                <td class="px-6 py-6">
                                    <div class="font-black text-emerald-950 flex items-center gap-2">
                                        <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                        {{ Str::words($laporan->nama, 1, ' ***') }}
                                    </div>
                                    <div class="text-[10px] font-bold text-gray-500 mt-1.5 uppercase tracking-wider pl-6">{{ $laporan->created_at->format('d M Y') }}</div>
                                </td>
                                <td class="px-6 py-6">
                                    <span class="px-2.5 py-1 text-[10px] font-black rounded-lg uppercase tracking-wider inline-block
                                        {{ $laporan->kategori == 'Infrastruktur' ? 'bg-blue-50 text-blue-600 border border-blue-100' : '' }}
                                        {{ $laporan->kategori == 'Bansos' ? 'bg-orange-50 text-orange-600 border border-orange-100' : '' }}
                                        {{ $laporan->kategori == 'Pelayanan' ? 'bg-purple-50 text-purple-600 border border-purple-100' : '' }}
                                        {{ $laporan->kategori == 'Lainnya' ? 'bg-gray-50 text-gray-600 border border-gray-200' : '' }}">
                                        {{ $laporan->kategori }}
                                    </span>
                                </td>
                                <td class="px-6 py-6 max-w-md">
                                    <p class="text-gray-500 font-medium leading-relaxed text-xs whitespace-pre-line line-clamp-2 group-hover:line-clamp-none smooth-spring">{{ $laporan->isi_laporan }}</p>
                                </td>
                                <td class="px-6 py-6 text-center whitespace-nowrap">
                                    <span class="px-3 py-1.5 text-[11px] font-black rounded-xl border inline-flex items-center gap-1.5
                                        {{ $laporan->status == 'Pending' ? 'bg-yellow-50 text-yellow-700 border-yellow-200' : '' }}
                                        {{ $laporan->status == 'Diproses' ? 'bg-blue-50 text-blue-700 border-blue-200' : '' }}
                                        {{ $laporan->status == 'Selesai' ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : '' }}">
                                        <span class="w-1.5 h-1.5 rounded-full 
                                            {{ $laporan->status == 'Pending' ? 'bg-yellow-500' : '' }}
                                            {{ $laporan->status == 'Diproses' ? 'bg-blue-500' : '' }}
                                            {{ $laporan->status == 'Selesai' ? 'bg-emerald-500' : '' }}"></span>
                                        {{ $laporan->status }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center bg-gray-50/30">
                                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-500">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                    </div>
                                    <h3 class="text-sm font-black text-gray-500 uppercase tracking-widest">Aman Terkendali</h3>
                                    <p class="text-xs font-medium text-gray-500 mt-1">Belum ada riwayat laporan yang masuk atau ditampilkan.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection