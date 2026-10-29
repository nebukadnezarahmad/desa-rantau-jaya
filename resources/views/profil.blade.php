@extends('layouts.app')

@section('content')

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

<div class="relative bg-emerald-950 text-white py-24 md:py-32 overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&q=80&w=2000')] bg-cover bg-center opacity-10 mix-blend-screen"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-emerald-900/80 to-transparent"></div>
    
    <div class="absolute -top-20 left-1/4 w-[600px] h-[600px] bg-emerald-500/20 blur-[100px] pointer-events-none"></div>
    <div class="absolute -bottom-20 right-1/4 w-[500px] h-[500px] bg-yellow-500/10 blur-[100px] pointer-events-none" style="animation-delay: -5s; animation-direction: reverse;"></div>

    <div class="relative max-w-5xl mx-auto px-4 text-center z-10 animate-entrance" style="animation-delay: 0.1s;">
        <h1 class="text-4xl md:text-6xl font-black tracking-tight leading-tight mb-4">
            Profil Desa <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-yellow-500">Rantau Jaya</span>
        </h1>
        <p class="text-base md:text-lg text-emerald-100/70 max-w-2xl mx-auto font-medium leading-relaxed">Mengenal lebih dekat sejarah, struktur kepengurusan, dan cakupan wilayah administrasi kebanggaan masyarakat Rantau Jaya.</p>
    </div>
</div>

<div class="bg-gray-50 py-16 relative border-t border-gray-100 reveal">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 -mt-24">
        
        <div class="grid lg:grid-cols-12 gap-8 items-stretch">
            <div class="lg:col-span-7 bg-white/90 backdrop-blur-xl p-8 lg:p-12 rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white smooth-spring hover:shadow-[0_20px_50px_rgb(0,0,0,0.08)] animate-entrance" style="animation-delay: 0.2s;">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-2 h-8 bg-emerald-600 rounded-full"></div>
                    <h2 class="text-3xl font-black text-emerald-950">Sejarah & Identitas Desa</h2>
                </div>
                
                <div class="text-gray-500 space-y-5 leading-relaxed text-sm md:text-base font-medium ml-5">
                    <p>
                        Desa Rantau Jaya merupakan salah satu desa yang terletak di kawasan strategis yang terus berkembang. Berdiri sejak bertahun-tahun lalu, desa ini kental akan nilai gotong-royong, adat istiadat, dan keramahan warganya yang mayoritas bergerak di sektor pertanian, perkebunan, dan UMKM mandiri.
                    </p>
                    <p>
                        Dengan luas wilayah yang subur, Pemerintah Desa Rantau Jaya berkomitmen penuh untuk terus memajukan taraf hidup masyarakat melalui pemerataan infrastruktur, transparansi anggaran, serta adaptasi teknologi digital guna mempermudah birokrasi dan pelayanan publik bagi seluruh warga.
                    </p>
                </div>
            </div>

            <!-- TODO: ganti dengan foto asli Balai Desa Rantau Jaya -->
            <div class="lg:col-span-5 min-h-[300px] lg:h-auto bg-emerald-900 rounded-[2rem] overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.04)] relative group flex flex-col items-center justify-center text-center p-10">
                <div class="w-20 h-20 rounded-full bg-yellow-400 text-emerald-950 flex items-center justify-center font-black text-2xl mb-4">RJ</div>
                <span class="inline-block bg-white/10 border border-white/20 text-emerald-100 text-[10px] font-black tracking-widest uppercase px-3 py-1.5 rounded-lg mb-2">[FOTO MENYUSUL]</span>
                <h3 class="text-white font-bold text-lg">Balai Desa Rantau Jaya</h3>
                <p class="text-emerald-100/60 text-xs font-medium mt-1">Foto asli gedung balai desa belum tersedia.</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-white py-20 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-14 animate-entrance" style="animation-delay: 0.4s;">
            <div class="inline-flex items-center justify-center w-12 h-12 bg-emerald-50 rounded-2xl text-emerald-600 mb-4 border border-emerald-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <h2 class="text-3xl md:text-4xl font-black text-emerald-950 tracking-tight">Struktur Pemerintahan Desa</h2>
            <p class="text-sm font-medium text-gray-500 mt-3 max-w-2xl mx-auto">Susunan lengkap pimpinan, sekretariat, kasi dan kaur, kepala dusun, ketua RT, serta lembaga desa Rantau Jaya.</p>
        </div>

        @php
            $pimpinan = collect($perangkat)->whereIn('kelompok', ['Pimpinan', 'Sekretariat']);
            $kasiKaur = collect($perangkat)->where('kelompok', 'Kasi & Kaur');
        @endphp

        <!-- Pimpinan dan Sekretariat -->
        <div class="grid sm:grid-cols-2 gap-6 max-w-4xl mx-auto mb-14">
            @foreach ($pimpinan as $orang)
                <article class="relative overflow-hidden rounded-[2rem] border p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] smooth-spring hover:-translate-y-1 hover:shadow-[0_20px_50px_rgb(0,0,0,0.08)] {{ $orang['kelompok'] === 'Pimpinan' ? 'bg-emerald-950 border-emerald-900 text-white' : 'bg-white border-gray-100' }}">
                    @if ($orang['kelompok'] === 'Pimpinan')
                        <div class="absolute -top-16 -right-16 w-48 h-48 bg-yellow-400/10 rounded-full blur-2xl pointer-events-none"></div>
                    @endif
                    <div class="relative flex items-start justify-between gap-4 mb-6">
                        <div class="w-16 h-16 rounded-2xl flex items-center justify-center font-black text-xl border {{ $orang['kelompok'] === 'Pimpinan' ? 'bg-yellow-400 text-emerald-950 border-yellow-300' : 'bg-emerald-50 text-emerald-700 border-emerald-100' }}">
                            {{ $orang['inisial'] }}
                        </div>
                        <span class="inline-block text-[10px] font-black uppercase tracking-widest px-3 py-1.5 rounded-full border {{ $orang['kelompok'] === 'Pimpinan' ? 'bg-white/10 text-yellow-300 border-white/20' : 'bg-gray-100 text-gray-600 border-gray-200' }}">
                            {{ $orang['kelompok'] === 'Pimpinan' ? 'Pimpinan' : 'Sekretariat' }}
                        </span>
                    </div>
                    <h3 class="relative font-black text-2xl leading-snug mb-1 {{ $orang['kelompok'] === 'Pimpinan' ? 'text-white' : 'text-emerald-950' }}">{{ $orang['nama'] }}</h3>
                    <p class="relative text-sm font-bold {{ $orang['kelompok'] === 'Pimpinan' ? 'text-emerald-200' : 'text-emerald-700' }}">{{ $orang['jabatan'] }}</p>
                    @if ($orang['masa_bakti'])
                        <p class="relative text-[10px] font-bold uppercase tracking-widest mt-4 {{ $orang['kelompok'] === 'Pimpinan' ? 'text-emerald-300/70' : 'text-gray-400' }}">Masa bakti {{ $orang['masa_bakti'] }}</p>
                    @endif
                </article>
            @endforeach
        </div>

        <!-- Kasi dan Kaur -->
        <div class="mb-14">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-1.5 h-6 bg-emerald-600 rounded-full"></div>
                <h3 class="font-bold text-xl text-gray-800">Kasi dan Kaur</h3>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($kasiKaur as $orang)
                    <article class="bg-gray-50/70 border border-gray-100 rounded-2xl p-6 smooth-spring hover:bg-white hover:shadow-md hover:-translate-y-1">
                        <div class="w-11 h-11 rounded-xl bg-white border border-gray-200 text-emerald-700 flex items-center justify-center font-black text-sm mb-5">
                            {{ $orang['inisial'] }}
                        </div>
                        <h4 class="font-black text-emerald-950 leading-snug mb-1">{{ $orang['nama'] }}</h4>
                        <p class="text-xs font-bold text-gray-500 leading-relaxed">{{ $orang['jabatan'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>

        <!-- Kepala Dusun dan Ketua RT -->
        <div class="mb-14">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-1.5 h-6 bg-yellow-500 rounded-full"></div>
                <h3 class="font-bold text-xl text-gray-800">Kepala Dusun dan Ketua RT</h3>
            </div>
            <div class="grid md:grid-cols-2 gap-6">
                @foreach ($kewilayahan as $wilayah)
                    <article class="bg-white rounded-[2rem] border border-gray-100 overflow-hidden shadow-[0_4px_20px_rgb(0,0,0,0.03)] smooth-spring hover:shadow-[0_20px_50px_rgb(0,0,0,0.06)]">
                        <div class="bg-emerald-950 px-7 py-5 flex items-center justify-between gap-4">
                            <div>
                                <div class="text-[10px] font-black uppercase tracking-widest text-emerald-300">{{ $wilayah['rw'] }}</div>
                                <h4 class="text-xl font-black text-white mt-0.5">{{ $wilayah['dusun'] }}</h4>
                            </div>
                            <span class="text-[10px] font-black uppercase tracking-widest text-emerald-950 bg-yellow-400 px-3 py-1.5 rounded-full">Kadus</span>
                        </div>
                        <div class="p-7">
                            <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-1">Kepala Dusun</p>
                            <p class="text-lg font-black text-emerald-950 mb-5">{{ $wilayah['kadus'] }}</p>

                            <div class="border-t border-gray-100 pt-5">
                                <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-3">Ketua RT</p>
                                <ul class="space-y-2.5">
                                    @foreach ($wilayah['rt'] as $namaRt)
                                        <li class="flex items-center justify-between gap-4">
                                            <span class="inline-flex items-center justify-center min-w-[3.25rem] text-[10px] font-black uppercase tracking-widest text-emerald-700 bg-emerald-50 border border-emerald-100 rounded-lg px-2 py-1">RT {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                            <span class="text-sm font-bold text-gray-700 text-right">{{ $namaRt }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>

        <!-- Lembaga Desa -->
        <div>
            <div class="flex items-center gap-3 mb-6">
                <div class="w-1.5 h-6 bg-blue-600 rounded-full"></div>
                <h3 class="font-bold text-xl text-gray-800">Lembaga Desa</h3>
            </div>
            <div class="grid md:grid-cols-2 gap-6">
                @foreach ($lembaga as $badan)
                    <article class="bg-gray-50/70 border border-gray-100 rounded-[2rem] p-7">
                        <div class="flex items-start justify-between gap-4 mb-4">
                            <h4 class="font-black text-emerald-950 leading-snug">{{ $badan['nama'] }}</h4>
                            <span class="flex-shrink-0 text-[10px] font-black uppercase tracking-widest text-gray-500 bg-white border border-gray-200 rounded-full px-3 py-1.5">{{ $badan['masa_bakti'] }}</span>
                        </div>
                        <ul class="divide-y divide-gray-200/70">
                            @foreach ($badan['anggota'] as $anggota)
                                <li class="flex items-baseline justify-between gap-4 py-2.5">
                                    <span class="text-[10px] font-black uppercase tracking-widest text-gray-400">{{ $anggota['jabatan'] }}</span>
                                    <span class="text-sm font-bold text-gray-700 text-right">{{ $anggota['nama'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </article>
                @endforeach
            </div>
            <p class="mt-6 text-xs text-gray-500 leading-relaxed">
                Sumber: Monografi Desa Rantau Jaya 2025, daftar perangkat per 12 Januari 2025. Masa bakti MPD 2021–2026 sudah berakhir dan menunggu pembaruan.
            </p>
        </div>
    </div>
</div>

<div class="bg-gray-50 py-20 border-t border-gray-100 reveal">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-6 animate-entrance" style="animation-delay: 0.8s;">
            <div>
                <h2 class="text-3xl md:text-4xl font-black text-emerald-950 tracking-tight">Peta Wilayah Desa</h2>
                <p class="text-sm font-medium text-gray-500 mt-2">Cakupan geografis dan batas wilayah administrasi Pemerintah Desa Rantau Jaya.</p>
            </div>
        </div>

        <div class="w-full min-h-[400px] md:min-h-[500px] rounded-[2rem] overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.05)] border border-gray-200 relative animate-entrance" style="animation-delay: 0.9s;">
            <iframe
                title="Peta Desa Rantau Jaya, Belitang Madang Raya, OKU Timur"
                src="https://www.google.com/maps?q=Desa+Rantau+Jaya,+Belitang+Madang+Raya,+Ogan+Komering+Ulu+Timur,+Sumatera+Selatan&amp;output=embed"
                class="absolute inset-0 w-full h-full border-0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            <div class="absolute bottom-6 right-6 bg-white/90 backdrop-blur-md px-5 py-3 rounded-2xl shadow-lg border border-white">
                <div class="flex items-center gap-3">
                    <span class="inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                    <span class="text-xs font-bold text-emerald-950 uppercase tracking-wider">Rantau Jaya, OKU Timur</span>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection