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

<div class="bg-white py-20 border-t border-gray-100 reveal">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16 animate-entrance" style="animation-delay: 0.4s;">
            <div class="inline-flex items-center justify-center w-12 h-12 bg-emerald-50 rounded-2xl text-emerald-600 mb-4 border border-emerald-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <h2 class="text-3xl md:text-4xl font-black text-emerald-950 tracking-tight">Struktur Perangkat Desa</h2>
            <p class="text-sm font-medium text-gray-500 mt-3 max-w-2xl mx-auto">Pamong desa yang siap mengabdi dan melayani kebutuhan administrasi maupun sosial masyarakat.</p>
        </div>

        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            
            <div class="bg-gray-50/50 p-8 rounded-[2rem] border border-gray-100 text-center group smooth-spring hover:-translate-y-3 hover:bg-white hover:shadow-[0_20px_50px_rgb(0,0,0,0.06)] animate-entrance" style="animation-delay: 0.5s;">
                <!-- TODO: ganti dengan foto resmi Kepala Desa -->
                <div class="w-32 h-32 mx-auto mb-6 rounded-full bg-emerald-700 text-white flex items-center justify-center font-black text-4xl border-4 border-white shadow-lg">AJ</div>
                <span class="inline-block bg-emerald-100 text-emerald-700 text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full mb-3 border border-emerald-200">Pimpinan</span>
                <h3 class="font-black text-emerald-950 text-xl mb-1">Bapak Ahmad Junaidi</h3>
                <p class="text-sm text-gray-500 font-medium">Kepala Desa</p>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-2">[Foto resmi menyusul]</p>
            </div>

            <div class="bg-gray-50/50 p-8 rounded-[2rem] border border-gray-100 text-center group smooth-spring hover:-translate-y-3 hover:bg-white hover:shadow-[0_20px_50px_rgb(0,0,0,0.06)] animate-entrance" style="animation-delay: 0.6s;">
                <!-- TODO: ganti dengan foto resmi Sekretaris Desa -->
                <div class="w-32 h-32 mx-auto mb-6 rounded-full bg-emerald-700 text-white flex items-center justify-center font-black text-4xl border-4 border-white shadow-lg">SR</div>
                <span class="inline-block bg-gray-200 text-gray-700 text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full mb-3 border border-gray-300">Administrasi</span>
                <h3 class="font-black text-emerald-950 text-xl mb-1">Ibu Siti Rahma</h3>
                <p class="text-sm text-gray-500 font-medium">Sekretaris Desa</p>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-2">[Foto resmi menyusul]</p>
            </div>

            <div class="bg-gray-50/50 p-8 rounded-[2rem] border border-gray-100 text-center group smooth-spring hover:-translate-y-3 hover:bg-white hover:shadow-[0_20px_50px_rgb(0,0,0,0.06)] animate-entrance" style="animation-delay: 0.7s;">
                <!-- TODO: ganti dengan foto resmi Kaur Keuangan -->
                <div class="w-32 h-32 mx-auto mb-6 rounded-full bg-emerald-700 text-white flex items-center justify-center font-black text-4xl border-4 border-white shadow-lg">BS</div>
                <span class="inline-block bg-gray-200 text-gray-700 text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full mb-3 border border-gray-300">Bendahara</span>
                <h3 class="font-black text-emerald-950 text-xl mb-1">Bapak Budi Santoso</h3>
                <p class="text-sm text-gray-500 font-medium">Kaur Keuangan</p>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-2">[Foto resmi menyusul]</p>
            </div>

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