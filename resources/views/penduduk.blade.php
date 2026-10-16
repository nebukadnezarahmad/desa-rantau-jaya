@extends('layouts.app')

@section('content')

<!-- INJEKSI CSS CUSTOM UNTUK ANIMASI MORPH & STAGGERED ENTRANCE -->
<style>
    /* Transisi Halus Bawaan */
    .smooth-spring {
        transition-property: all;
        transition-duration: 500ms;
        transition-timing-function: cubic-bezier(0.16, 1, 0.3, 1);
    }

    /* Animasi Morphing Latar Belakang (Blob) */
    @keyframes morph-blob {
        0% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; transform: rotate(0deg) scale(1); }
        50% { border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%; transform: rotate(10deg) scale(1.05); }
        100% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; transform: rotate(0deg) scale(1); }
    }
    .animate-blob {
        animation: morph-blob 15s ease-in-out infinite;
    }

    /* Animasi Muncul Berurutan (Fade Up Spring) */
    @keyframes fade-up-spring {
        0% { opacity: 0; transform: translateY(40px) scale(0.95); }
        100% { opacity: 1; transform: translateY(0) scale(1); }
    }
    .animate-fade-up {
        opacity: 0;
        animation: fade-up-spring 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    /* Animasi Grafik Batang (Grow Width) */
    @keyframes grow-width {
        from { width: 0%; }
    }
    .animate-grow {
        animation: grow-width 1.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
</style>

<!-- ================= BANNER HALAMAN ================= -->
<div class="relative bg-emerald-950 text-white py-24 md:py-32 overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&q=80&w=2000')] bg-cover bg-center opacity-10 mix-blend-screen"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-emerald-900/80 to-transparent"></div>
    
    <!-- Ornamen Glow Estetik Latar Belakang dengan Animasi Morph -->
    <div class="absolute top-1/4 left-1/4 w-[500px] h-[500px] bg-emerald-500/20 blur-[100px] pointer-events-none animate-blob"></div>
    <div class="absolute bottom-0 right-1/4 w-[600px] h-[400px] bg-blue-500/10 blur-[100px] pointer-events-none animate-blob" style="animation-delay: -5s; animation-direction: reverse;"></div>

    <div class="relative max-w-5xl mx-auto px-4 text-center z-10 animate-fade-up" style="animation-delay: 0.1s;">
        <div class="inline-flex items-center justify-center bg-white/5 backdrop-blur-md border border-white/10 text-emerald-300 text-[10px] font-bold uppercase tracking-[0.2em] px-4 py-1.5 rounded-full mb-6">
            Transparansi Data Publik
        </div>
        <h1 class="text-4xl md:text-5xl font-black tracking-tight leading-tight mb-4">
            Demografi & Profil Penduduk
        </h1>
        <p class="text-base text-emerald-100/70 max-w-2xl mx-auto font-medium">Penyajian data kependudukan Desa Rantau Jaya secara akurat, terbuka, dan diperbarui berkala melalui pendataan perangkat desa.</p>
    </div>
</div>

<!-- ================= GRID KONTEN UTAMA ================= -->
<div class="bg-gray-50 py-12 relative border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 -mt-20">
        
        <!-- KARTU STATISTIK UTAMA -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-8 md:mb-10">
            <!-- Kartu 1: Total Penduduk -->
            <div class="bg-white/95 backdrop-blur-xl p-6 md:p-8 rounded-3xl shadow-sm border border-gray-100 smooth-spring hover:shadow-md hover:-translate-y-1 animate-fade-up" style="animation-delay: 0.2s;">
                <div class="w-12 h-12 bg-emerald-50 rounded-xl border border-emerald-100 flex items-center justify-center text-emerald-600 mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <div class="text-3xl md:text-4xl font-black text-gray-800 mb-1">
                    {{ number_format($statistik['total_penduduk'], 0, ',', '.') }}
                </div>
                <div class="text-[10px] md:text-xs font-bold text-gray-400 uppercase tracking-widest mt-2">
                    Total Penduduk
                </div>
            </div>

            <!-- Kartu 2: Kepala Keluarga -->
            <div class="bg-white/95 backdrop-blur-xl p-6 md:p-8 rounded-3xl shadow-sm border border-gray-100 smooth-spring hover:shadow-md hover:-translate-y-1 animate-fade-up" style="animation-delay: 0.3s;">
                <div class="w-12 h-12 bg-amber-50 rounded-xl border border-amber-100 flex items-center justify-center text-amber-600 mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </div>
                <div class="text-3xl md:text-4xl font-black text-gray-800 mb-1">
                    {{ number_format($statistik['kepala_keluarga'], 0, ',', '.') }}
                </div>
                <div class="text-[10px] md:text-xs font-bold text-gray-400 uppercase tracking-widest mt-2">
                    Kepala Keluarga
                </div>
            </div>

            <!-- Kartu 3: Pria -->
            <div class="bg-white/95 backdrop-blur-xl p-6 md:p-8 rounded-3xl shadow-sm border border-gray-100 smooth-spring hover:shadow-md hover:-translate-y-1 animate-fade-up" style="animation-delay: 0.4s;">
                <div class="w-12 h-12 bg-blue-50 rounded-xl border border-blue-100 flex items-center justify-center text-blue-600 mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                <div class="text-3xl md:text-4xl font-black text-gray-800 mb-1">
                    {{ number_format($statistik['pria'], 0, ',', '.') }}
                </div>
                <div class="text-[10px] md:text-xs font-bold text-gray-400 uppercase tracking-widest mt-2">
                    Penduduk Pria
                </div>
            </div>

            <!-- Kartu 4: Wanita -->
            <div class="bg-white/95 backdrop-blur-xl p-6 md:p-8 rounded-3xl shadow-sm border border-gray-100 smooth-spring hover:shadow-md hover:-translate-y-1 animate-fade-up" style="animation-delay: 0.5s;">
                <div class="w-12 h-12 bg-rose-50 rounded-xl border border-rose-100 flex items-center justify-center text-rose-600 mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <div class="text-3xl md:text-4xl font-black text-gray-800 mb-1">
                    {{ number_format($statistik['wanita'], 0, ',', '.') }}
                </div>
                <div class="text-[10px] md:text-xs font-bold text-gray-400 uppercase tracking-widest mt-2">
                    Penduduk Wanita
                </div>
            </div>
        </div>

        <!-- DETAIL GRAFIK SEBARAN WILAYAH -->
        <div class="grid md:grid-cols-2 gap-6 md:gap-8">
            
            <!-- Widget Wilayah Dusun -->
            <div class="bg-white p-8 md:p-10 rounded-3xl shadow-sm border border-gray-100 animate-fade-up" style="animation-delay: 0.6s;">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-1.5 h-6 bg-emerald-600 rounded-full"></div>
                    <h3 class="font-bold text-xl text-gray-800">Sebaran Wilayah Dusun</h3>
                </div>
                <p class="text-sm text-gray-500 mb-8 ml-4">Distribusi jumlah penduduk di area administrasi dusun.</p>
                
                <div class="space-y-6 ml-4">
                    <div class="group/bar">
                        <div class="flex justify-between text-sm font-semibold text-gray-700 mb-2">
                            <span>Dusun I (Pusat)</span>
                            <span>{{ $statistik['dusun_1'] }} Jiwa</span>
                        </div>
                        <div class="w-full bg-gray-100 h-3 rounded-full overflow-hidden">
                            <div class="bg-emerald-600 h-full rounded-full animate-grow" style="width: 35%; animation-delay: 0.8s;"></div>
                        </div>
                    </div>
                    
                    <div class="group/bar">
                        <div class="flex justify-between text-sm font-semibold text-gray-700 mb-2">
                            <span>Dusun II (Sari Mulyo)</span>
                            <span>{{ $statistik['dusun_2'] }} Jiwa</span>
                        </div>
                        <div class="w-full bg-gray-100 h-3 rounded-full overflow-hidden">
                            <div class="bg-emerald-500 h-full rounded-full animate-grow" style="width: 33%; animation-delay: 0.9s;"></div>
                        </div>
                    </div>
                    
                    <div class="group/bar">
                        <div class="flex justify-between text-sm font-semibold text-gray-700 mb-2">
                            <span>Dusun III (Maju Jaya)</span>
                            <span>{{ $statistik['dusun_3'] }} Jiwa</span>
                        </div>
                        <div class="w-full bg-gray-100 h-3 rounded-full overflow-hidden">
                            <div class="bg-emerald-400 h-full rounded-full animate-grow" style="width: 32%; animation-delay: 1.0s;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Tambahan Hak Pilih -->
            <div class="bg-white p-8 md:p-10 rounded-3xl shadow-sm border border-gray-100 flex flex-col justify-between animate-fade-up" style="animation-delay: 0.7s;">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-1.5 h-6 bg-blue-600 rounded-full"></div>
                        <h3 class="font-bold text-xl text-gray-800">Indikator Hak Pilih</h3>
                    </div>
                    <p class="text-sm text-gray-500 mb-8 ml-4">Data warga yang memiliki identitas kependudukan sah (Wajib KTP).</p>
                    
                    <div class="bg-blue-50/50 border border-blue-100 p-6 rounded-2xl flex items-center gap-5 ml-4 smooth-spring hover:bg-blue-50">
                        <div class="w-14 h-14 bg-white rounded-xl border border-blue-200 flex items-center justify-center text-blue-600 flex-shrink-0">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
                        </div>
                        <div>
                            <div class="text-3xl font-black text-gray-800 tracking-tight">{{ number_format($statistik['wajib_pilih'], 0, ',', '.') }}</div>
                            <div class="text-xs font-bold text-blue-700 mt-1 uppercase tracking-wide">Penduduk Sah Memilih</div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-8 pt-5 border-t border-gray-100 flex gap-3 text-xs text-gray-400 leading-relaxed ml-4">
                    <svg class="w-4 h-4 flex-shrink-0 text-gray-300 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p>Data disinkronisasikan berdasarkan pelaporan berkala dari masing-masing Ketua RT dan Kepala Dusun.</p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection