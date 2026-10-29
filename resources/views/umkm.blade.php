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

<!-- ================= BANNER HALAMAN ================= -->
<div class="relative bg-emerald-950 text-white py-24 md:py-32 overflow-hidden">
    <!-- Ambient Background & Overlay -->
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&q=80&w=2000')] bg-cover bg-center opacity-10 mix-blend-screen"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-emerald-900/80 to-transparent"></div>

    <!-- Ornamen Glow Estetik Latar Belakang dengan Animasi Morph Murni CSS -->
    <div class="absolute -top-20 left-1/4 w-[600px] h-[600px] bg-emerald-500/20 blur-[100px] pointer-events-none"></div>
    <div class="absolute -bottom-20 right-1/4 w-[500px] h-[500px] bg-yellow-500/10 blur-[100px] pointer-events-none" style="animation-delay: -5s; animation-direction: reverse;"></div>

    <div class="relative max-w-5xl mx-auto px-4 text-center z-10 animate-entrance" style="animation-delay: 0.1s;">
        <h1 class="text-4xl md:text-6xl font-black tracking-tight leading-tight mb-4">
            Direktori UMKM <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-yellow-500">Rantau Jaya</span>
        </h1>
        <p class="text-base md:text-lg text-emerald-100/70 max-w-2xl mx-auto font-medium leading-relaxed">
            {{ number_format($total_umkm, 0, ',', '.') }} usaha warga dalam sembilan kategori. Kenali layanannya, lalu hubungi langsung atau kunjungi lokasinya.
        </p>
    </div>
</div>

<!-- ================= DAFTAR USAHA ================= -->
<div class="bg-gray-50 py-16 relative border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 mt-8 md:mt-4">

        <!-- Filter Kategori -->
        <nav aria-label="Filter kategori UMKM" class="flex gap-2 mb-10 overflow-x-auto pb-2 -mx-4 px-4 md:mx-0 md:px-0 md:flex-wrap md:overflow-visible md:pb-0">
            <a href="{{ route('umkm') }}"
               @if(! $kategori) aria-current="page" @endif
               class="smooth-spring flex-shrink-0 whitespace-nowrap inline-flex items-center rounded-full px-4 py-2 text-xs font-bold border {{ ! $kategori ? 'bg-emerald-950 text-white border-emerald-950 shadow-md' : 'bg-white/90 text-emerald-900 border-gray-200 hover:border-emerald-300 hover:bg-white' }}">
                Semua <span class="ml-2 opacity-60">{{ $total_umkm }}</span>
            </a>
            @foreach($daftar_kategori as $item)
                <a href="{{ route('umkm', ['kategori' => $item]) }}"
                   @if($kategori === $item) aria-current="page" @endif
                   class="smooth-spring flex-shrink-0 whitespace-nowrap inline-flex items-center rounded-full px-4 py-2 text-xs font-bold border {{ $kategori === $item ? 'bg-emerald-950 text-white border-emerald-950 shadow-md' : 'bg-white/90 text-emerald-900 border-gray-200 hover:border-emerald-300 hover:bg-white' }}">
                    {{ $item }}
                </a>
            @endforeach
        </nav>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse($semua_umkm as $usaha)
                <!-- Kartu Usaha -->
                <article class="bg-white rounded-[2rem] shadow-[0_4px_20px_rgb(0,0,0,0.03)] border border-gray-100 overflow-hidden flex flex-col group smooth-spring hover:shadow-[0_25px_50px_rgb(0,0,0,0.1)] hover:-translate-y-2 hover:border-emerald-100 animate-entrance" style="animation-delay: {{ 0.15 + ($loop->index * 0.05) }}s;">

                    <!-- Area Visual Kategori -->
                    <div class="h-40 bg-gradient-to-br from-emerald-900 via-emerald-950 to-emerald-900 relative overflow-hidden flex items-center justify-center">
                        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvc3ZnPg==')] bg-repeat opacity-50 smooth-spring group-hover:scale-125"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-emerald-950/90 via-emerald-950/20 to-transparent"></div>

                        <!-- Inisial Nama Usaha -->
                        <span aria-hidden="true" class="relative z-10 text-7xl font-black text-white/10 select-none smooth-spring group-hover:scale-110 group-hover:text-white/15">
                            {{ mb_strtoupper(mb_substr($usaha->nama_produk, 0, 1)) }}
                        </span>

                        <!-- Badge Kategori -->
                        <div class="absolute top-4 left-4 right-4 flex">
                            <span class="bg-white/90 backdrop-blur-sm px-3 py-1.5 rounded-xl text-[10px] font-black text-emerald-950 uppercase tracking-widest shadow-lg">
                                {{ $usaha->kategori ?? 'UMKM' }}
                            </span>
                        </div>
                    </div>

                    <!-- Detail Usaha -->
                    <div class="p-7 flex flex-col flex-grow">
                        <h2 class="font-black text-xl text-emerald-950 mb-2 leading-snug smooth-spring group-hover:text-emerald-700">
                            {{ $usaha->nama_produk }}
                        </h2>

                        @if($usaha->deskripsi)
                            <p class="text-gray-500 text-sm mb-5 leading-relaxed font-medium">
                                {{ $usaha->deskripsi }}
                            </p>
                        @endif

                        @if($usaha->alamat)
                            <div class="flex items-start gap-2 text-xs text-gray-500 font-medium leading-relaxed mb-5">
                                <svg class="w-4 h-4 flex-shrink-0 text-emerald-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <span class="line-clamp-2">{{ $usaha->alamat }}</span>
                            </div>
                        @endif

                        <!-- Tombol Aksi -->
                        <div class="mt-auto pt-2 flex gap-2">
                            @if($usaha->maps_url)
                                <a href="{{ $usaha->maps_url }}" target="_blank" rel="noopener noreferrer"
                                   class="flex-1 inline-flex items-center justify-center gap-2 bg-emerald-50 text-emerald-800 border border-emerald-100 font-bold py-3 rounded-xl smooth-spring hover:bg-emerald-100 text-xs tracking-wide">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                                    Lihat Peta
                                </a>
                            @endif

                            @if($usaha->whatsapp)
                                <a href="https://wa.me/{{ $usaha->whatsapp }}?text={{ urlencode('Halo, saya menemukan usaha *'.$usaha->nama_produk.'* di Direktori UMKM Desa Rantau Jaya.') }}"
                                   target="_blank" rel="noopener noreferrer"
                                   class="flex-1 inline-flex items-center justify-center gap-2 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white font-bold py-3 rounded-xl smooth-spring hover:shadow-[0_8px_20px_rgb(5,150,105,0.3)] text-xs tracking-wide">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                    WhatsApp
                                </a>
                            @endif

                            @if(! $usaha->maps_url && ! $usaha->whatsapp)
                                <span class="flex-1 text-center text-[11px] font-bold text-gray-400 uppercase tracking-widest py-3">
                                    Hubungi kantor desa
                                </span>
                            @endif
                        </div>
                    </div>
                </article>
            @empty
                <!-- Tampilan jika direktori kosong -->
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-32 bg-white rounded-[2rem] border border-dashed border-gray-300 shadow-sm smooth-spring hover:scale-[1.01] animate-entrance" style="animation-delay: 0.3s;">
                    <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6 text-gray-500">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    </div>
                    <h2 class="text-2xl font-black text-emerald-950 mb-2">Belum Ada Usaha di Kategori Ini</h2>
                    <p class="text-sm text-gray-500 font-medium max-w-md mx-auto leading-relaxed">Direktori UMKM desa belum memuat data untuk kategori tersebut. Hubungi kantor desa untuk mendaftarkan usaha Anda secara gratis.</p>
                </div>
            @endforelse

        </div>

        <p class="mt-12 text-xs text-gray-400 leading-relaxed max-w-3xl">
            Sumber data: Profil Desa Rantau Jaya 2025 dan penelusuran Google Maps. Harga dan ketersediaan produk tidak dicantumkan karena belum ada pendataan resmi. Informasi dapat berubah; konfirmasi langsung ke pemilik usaha.
        </p>
    </div>
</div>
@endsection
