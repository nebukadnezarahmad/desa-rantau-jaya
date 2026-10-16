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
    <div class="absolute -top-20 left-1/4 w-[600px] h-[600px] bg-emerald-500/20 blur-[100px] pointer-events-none animate-blob"></div>
    <div class="absolute -bottom-20 right-1/4 w-[500px] h-[500px] bg-yellow-500/10 blur-[100px] pointer-events-none animate-blob" style="animation-delay: -5s; animation-direction: reverse;"></div>

    <div class="relative max-w-5xl mx-auto px-4 text-center z-10 animate-entrance" style="animation-delay: 0.1s;">
        <div class="inline-flex items-center justify-center bg-white/5 backdrop-blur-md border border-white/10 text-yellow-400 text-[10px] font-black uppercase tracking-[0.2em] px-4 py-1.5 rounded-full mb-6 shadow-xl cursor-default smooth-spring hover:scale-105 hover:bg-white/10">
            <span class="w-1.5 h-1.5 rounded-full bg-yellow-400 mr-2 animate-pulse"></span>
            Pusat Ekonomi Warga
        </div>
        <h1 class="text-4xl md:text-6xl font-black tracking-tight leading-tight mb-4 transition-all duration-500 hover:tracking-normal">
            Lapak UMKM <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-yellow-500">Rantau Jaya</span>
        </h1>
        <p class="text-base md:text-lg text-emerald-100/70 max-w-2xl mx-auto font-medium leading-relaxed">Dukung usaha lokal dengan membeli langsung produk unggulan asli dari hasil kreativitas masyarakat desa kami.</p>
    </div>
</div>

<!-- ================= GRID DAFTAR PRODUK ================= -->
<div class="bg-gray-50 py-16 relative border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 -mt-24">
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            @forelse($semua_umkm as $produk)
                <!-- Kartu Produk dengan Animasi Entrance Staggered -->
                <div class="bg-white rounded-[2rem] shadow-[0_4px_20px_rgb(0,0,0,0.03)] border border-gray-100 overflow-hidden flex flex-col group smooth-spring hover:shadow-[0_25px_50px_rgb(0,0,0,0.1)] hover:-translate-y-4 hover:border-emerald-100 animate-entrance" style="animation-delay: {{ 0.2 + ($loop->index * 0.1) }}s;">
                    
                    <!-- Area Placeholder Gambar Produk -->
                    <div class="h-56 bg-emerald-900 relative overflow-hidden flex items-center justify-center">
                        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvc3ZnPg==')] bg-repeat opacity-50 smooth-spring group-hover:scale-125 group-hover:rotate-6"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-emerald-950/90 via-emerald-950/40 to-transparent"></div>
                        
                        <!-- Ikon Shopping Bag Modern -->
                        <svg class="w-16 h-16 text-emerald-500/50 relative z-10 smooth-spring group-hover:scale-110 group-hover:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>

                        <!-- Badge Nama Pemilik Lapak -->
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1.5 rounded-xl text-center shadow-lg smooth-spring group-hover:scale-105 group-hover:bg-yellow-400 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-emerald-600 group-hover:text-emerald-950" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            <span class="text-[10px] font-black text-emerald-950 uppercase tracking-widest">{{ $produk->nama_penjual }}</span>
                        </div>
                    </div>
                    
                    <!-- Detail Konten Produk -->
                    <div class="p-8 flex flex-col flex-grow relative bg-white">
                        <div class="absolute -top-6 left-8 bg-yellow-400 text-emerald-950 text-[10px] font-black tracking-widest uppercase px-4 py-2 rounded-xl shadow-md smooth-spring group-hover:-translate-y-1">
                            Produk Lokal
                        </div>
                        
                        <h3 class="font-black text-2xl text-emerald-950 mb-2 mt-2 line-clamp-2 smooth-spring group-hover:text-emerald-600 leading-snug">
                            {{ $produk->nama_produk }}
                        </h3>
                        
                        <div class="text-xl font-black text-emerald-600 mb-4 smooth-spring group-hover:text-emerald-500">
                            Rp {{ number_format($produk->harga, 0, ',', '.') }}
                        </div>
                        
                        <p class="text-gray-500 text-sm mb-8 line-clamp-3 leading-relaxed font-medium flex-1">
                            {{ $produk->deskripsi }}
                        </p>
                        
                        <!-- Tombol Hubungi Via WhatsApp -->
                        <div class="mt-auto">
                            <a href="https://wa.me/{{ $produk->whatsapp }}?text=Halo%20{{ urlencode($produk->nama_penjual) }},%20saya%20tertarik%20dengan%20produk%20*{{ urlencode($produk->nama_produk) }}*%20di%20Lapak%20Desa%20Rantau%20Jaya." 
                               target="_blank"
                               class="w-full flex items-center justify-center gap-2 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white font-black py-3.5 rounded-xl smooth-spring hover:shadow-[0_8px_20px_rgb(5,150,105,0.3)] hover:-translate-y-1 text-sm tracking-wide">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                Pesan via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Tampilan Menarik jika Lapak Masih Kosong -->
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-32 bg-white rounded-[2rem] border border-dashed border-gray-300 shadow-sm smooth-spring hover:scale-[1.01] animate-entrance" style="animation-delay: 0.3s;">
                    <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6 text-gray-300">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black text-emerald-950 mb-2">Lapak UMKM Belum Tersedia</h3>
                    <p class="text-sm text-gray-500 font-medium max-w-md mx-auto leading-relaxed">Saat ini perangkat desa belum mendaftarkan produk usaha warga. Hubungi kantor desa untuk mempromosikan dagangan Anda di sini secara gratis!</p>
                </div>
            @endforelse

        </div>
    </div>
</div>
@endsection