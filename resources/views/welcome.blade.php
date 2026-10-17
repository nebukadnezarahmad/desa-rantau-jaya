@extends('layouts.app')

@section('content')
<style>
    /* Animasi Morphing Fluid untuk Ornamen Background */
    @keyframes liquid-morph {
        0% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; transform: translate(0, 0) scale(1) rotate(0deg); }
        33% { border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%; transform: translate(30px, -50px) scale(1.1) rotate(15deg); }
        66% { border-radius: 100% 60% 60% 100% / 100% 100% 60% 60%; transform: translate(-20px, 20px) scale(0.9) rotate(-10deg); }
        100% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; transform: translate(0, 0) scale(1) rotate(0deg); }
    }
    .animate-morph {
        animation: liquid-morph 12s ease-in-out infinite alternate;
    }
    
    /* Custom Bezier Curve untuk efek hover ala Apple/Framer Motion (Snappy tapi lembut) */
    .smooth-spring {
        transition-property: all;
        transition-duration: 800ms;
        transition-timing-function: cubic-bezier(0.16, 1, 0.3, 1);
    }
</style>

<div class="relative bg-emerald-950 text-white pb-32 md:pb-40 pt-40 md:pt-48 -mt-20 overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&q=80&w=2000')] bg-cover bg-center opacity-40"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-emerald-950/40 to-transparent"></div>
    
    <div class="absolute -top-40 -right-20 w-[600px] h-[600px] bg-emerald-500/40 blur-[80px]" style="animation-delay: 0s;"></div>
    <div class="absolute -bottom-40 -left-20 w-[600px] h-[600px] bg-yellow-500/30 blur-[80px]" style="animation-delay: -5s;"></div>

    <div class="relative max-w-5xl mx-auto px-4 text-center z-10">
        <h1 class="text-5xl md:text-7xl font-black mb-6 tracking-tight leading-[1.1]">
            Selamat Datang di <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-yellow-100 to-white drop-shadow-sm">
                Desa Rantau Jaya
            </span>
        </h1>
        
        <p class="text-lg md:text-xl text-emerald-100/90 mb-12 max-w-2xl mx-auto font-medium leading-relaxed">
            Mewujudkan pelayanan tata kelola desa yang modern, transparan, dan akuntabel demi mendorong kesejahteraan masyarakat secara merata.
        </p>
        
        <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
            <a href="{{ route('kontak') }}" class="w-full sm:w-auto bg-gradient-to-r from-yellow-400 to-yellow-500 text-emerald-950 font-black py-4 px-8 rounded-2xl shadow-[0_8px_30px_rgb(250,204,21,0.3)] smooth-spring hover:shadow-[0_15px_40px_rgb(250,204,21,0.6)] hover:-translate-y-2 hover:scale-[1.02] text-sm tracking-wide">
                Ajukan Pengaduan Warga
            </a>
            <a href="{{ route('profil') }}" class="w-full sm:w-auto bg-white/5 backdrop-blur-md text-white font-bold py-4 px-8 rounded-2xl border border-white/10 shadow-xl smooth-spring hover:bg-white/10 hover:border-white/30 hover:-translate-y-2 hover:scale-[1.02] text-sm tracking-wide">
                Jelajahi Profil Desa
            </a>
        </div>
    </div>
</div>

<div class="relative max-w-6xl mx-auto px-4 -mt-16 z-20">
    <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white p-4 md:p-8 grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8 text-center divide-x divide-gray-100 smooth-spring hover:shadow-[0_20px_50px_rgb(0,0,0,0.08)]">
        
        <div class="p-4 group smooth-spring hover:-translate-y-2 hover:scale-105 cursor-default">
            <div class="text-3xl md:text-4xl font-black text-transparent bg-clip-text bg-gradient-to-br from-emerald-700 to-emerald-950 mb-1">{{ number_format($statistik['total_penduduk'], 0, ',', '.') }}+</div>
            <div class="text-[11px] font-bold text-gray-500 uppercase tracking-widest group-hover:text-emerald-600 smooth-spring">Total Penduduk</div>
        </div>
        
        <div class="p-4 group smooth-spring hover:-translate-y-2 hover:scale-105 cursor-default">
            <div class="text-3xl md:text-4xl font-black text-transparent bg-clip-text bg-gradient-to-br from-emerald-700 to-emerald-950 mb-1">{{ number_format($statistik['kepala_keluarga'], 0, ',', '.') }}+</div>
            <div class="text-[11px] font-bold text-gray-500 uppercase tracking-widest group-hover:text-emerald-600 smooth-spring">Kepala Keluarga</div>
        </div>
        
        <div class="p-4 group smooth-spring hover:-translate-y-2 hover:scale-105 cursor-default">
            <div class="text-3xl md:text-4xl font-black text-transparent bg-clip-text bg-gradient-to-br from-emerald-700 to-emerald-950 mb-1">3</div>
            <div class="text-[11px] font-bold text-gray-500 uppercase tracking-widest group-hover:text-emerald-600 smooth-spring">Wilayah Dusun</div>
        </div>
        
        <div class="p-4 group smooth-spring hover:-translate-y-2 hover:scale-105 cursor-default">
            <div class="text-3xl md:text-4xl font-black text-transparent bg-clip-text bg-gradient-to-br from-yellow-500 to-yellow-600 mb-1">{{ number_format($jumlah_umkm, 0, ',', '.') }}</div>
            <div class="text-[11px] font-bold text-gray-500 uppercase tracking-widest group-hover:text-yellow-600 smooth-spring">Produk UMKM</div>
        </div>

    </div>
</div>

<!-- ================= LAYANAN ADMINISTRASI (data CONTOH, ganti dengan data asli) ================= -->
<!-- TODO: ganti daftar layanan, syarat, dan jam pelayanan dengan data asli dari kantor desa -->
<div class="bg-white py-20 md:py-24 border-t border-gray-100 reveal">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-10">
            <div>
                <h2 class="text-3xl md:text-4xl font-black text-emerald-950 tracking-tight">Layanan Administrasi</h2>
                <p class="text-gray-500 font-medium text-sm md:text-base mt-2 max-w-xl">Urus surat langsung ke kantor desa pada jam pelayanan. Bawa syarat berikut agar sekali datang langsung jadi.</p>
            </div>
            <p class="text-xs font-bold text-emerald-700 bg-emerald-50 border border-emerald-100 rounded-xl px-4 py-2.5 whitespace-nowrap">Jam pelayanan: Senin–Jumat, 08.00–14.00</p>
        </div>

        <div class="grid md:grid-cols-2 gap-4 md:gap-5">
            <div class="flex gap-4 bg-gray-50/70 border border-gray-100 rounded-2xl p-5 smooth-spring hover:bg-white hover:shadow-md hover:-translate-y-0.5">
                <div class="w-11 h-11 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-black text-sm flex-shrink-0">1</div>
                <div>
                    <h3 class="font-black text-emerald-950">Surat Pengantar KTP</h3>
                    <p class="text-xs text-gray-500 font-medium mt-1">Syarat: fotokopi KK, surat pengantar RT setempat.</p>
                </div>
            </div>
            <div class="flex gap-4 bg-gray-50/70 border border-gray-100 rounded-2xl p-5 smooth-spring hover:bg-white hover:shadow-md hover:-translate-y-0.5">
                <div class="w-11 h-11 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-black text-sm flex-shrink-0">2</div>
                <div>
                    <h3 class="font-black text-emerald-950">Surat Keterangan Domisili</h3>
                    <p class="text-xs text-gray-500 font-medium mt-1">Syarat: fotokopi KTP dan KK yang masih berlaku.</p>
                </div>
            </div>
            <div class="flex gap-4 bg-gray-50/70 border border-gray-100 rounded-2xl p-5 smooth-spring hover:bg-white hover:shadow-md hover:-translate-y-0.5">
                <div class="w-11 h-11 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-black text-sm flex-shrink-0">3</div>
                <div>
                    <h3 class="font-black text-emerald-950">Surat Keterangan Tidak Mampu</h3>
                    <p class="text-xs text-gray-500 font-medium mt-1">Syarat: fotokopi KK dan KTP, surat keterangan RT.</p>
                </div>
            </div>
            <div class="flex gap-4 bg-gray-50/70 border border-gray-100 rounded-2xl p-5 smooth-spring hover:bg-white hover:shadow-md hover:-translate-y-0.5">
                <div class="w-11 h-11 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-black text-sm flex-shrink-0">4</div>
                <div>
                    <h3 class="font-black text-emerald-950">Surat Keterangan Usaha</h3>
                    <p class="text-xs text-gray-500 font-medium mt-1">Syarat: fotokopi KTP, foto tempat usaha.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ================= PENGUMUMAN (data CONTOH, ganti dengan data asli) ================= -->
<!-- TODO: ganti dengan pengumuman yang sedang berlaku -->
<div class="bg-emerald-950 py-20 md:py-24 relative overflow-hidden reveal">
    <div class="absolute -top-32 right-0 w-[500px] h-[500px] bg-emerald-500/20 blur-[100px] pointer-events-none"></div>
    <div class="max-w-4xl mx-auto px-4 relative z-10">
        <h2 class="text-3xl md:text-4xl font-black text-white tracking-tight mb-2">Pengumuman Desa</h2>
        <p class="text-emerald-100/70 text-sm font-medium mb-10">Informasi resmi yang sedang berlaku untuk warga.</p>

        <div class="space-y-4">
            <div class="flex gap-5 bg-white/5 border border-white/10 rounded-2xl p-5 sm:p-6 smooth-spring hover:bg-white/10">
                <div class="flex-shrink-0 w-16 text-center bg-yellow-400 text-emerald-950 rounded-xl py-2.5 px-2">
                    <div class="text-[10px] font-black uppercase">Agu</div>
                    <div class="text-2xl font-black leading-none mt-0.5">17</div>
                </div>
                <div>
                    <h3 class="font-black text-white text-lg leading-snug">Penyaluran Bantuan Pangan Tahap III</h3>
                    <p class="text-emerald-100/70 text-sm font-medium mt-1.5 leading-relaxed">Penerima manfaat dimohon hadir ke balai desa pukul 09.00 dengan membawa KTP dan KK asli.</p>
                </div>
            </div>
            <div class="flex gap-5 bg-white/5 border border-white/10 rounded-2xl p-5 sm:p-6 smooth-spring hover:bg-white/10">
                <div class="flex-shrink-0 w-16 text-center bg-white/10 border border-white/15 text-white rounded-xl py-2.5 px-2">
                    <div class="text-[10px] font-black uppercase text-emerald-200">Agu</div>
                    <div class="text-2xl font-black leading-none mt-0.5">24</div>
                </div>
                <div>
                    <h3 class="font-black text-white text-lg leading-snug">Kerja Bakti Membersihkan Saluran Air</h3>
                    <p class="text-emerald-100/70 text-sm font-medium mt-1.5 leading-relaxed">Seluruh warga Dusun II dimohon membawa cangkul dan karung. Titik kumpul di depan musala.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-gradient-to-b from-gray-50/50 to-white py-24 overflow-hidden reveal">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-5xl font-black text-emerald-950 tracking-tight">Arah dan Tujuan</h2>
            <div class="w-20 h-1.5 bg-gradient-to-r from-emerald-600 to-yellow-400 mx-auto mt-6 rounded-full"></div>
        </div>
        
        <div class="grid md:grid-cols-2 gap-8 lg:gap-12">
            <div class="bg-white p-10 rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.03)] border border-gray-100 smooth-spring hover:-translate-y-3 hover:scale-[1.02] hover:shadow-[0_30px_60px_rgb(5,150,105,0.08)] hover:border-emerald-200 relative overflow-hidden group">
                <div class="absolute -top-10 -left-10 w-32 h-32 bg-emerald-50 rounded-full blur-2xl smooth-spring group-hover:scale-[3] group-hover:bg-emerald-100/50"></div>
                
                <div class="relative z-10 w-14 h-14 bg-emerald-50 text-emerald-700 font-black text-sm rounded-2xl flex items-center justify-center mb-8 border border-emerald-100/50 smooth-spring group-hover:bg-emerald-600 group-hover:text-white group-hover:rotate-12">
                    VISI
                </div>
                <h3 class="relative z-10 font-black text-3xl text-emerald-950 mb-4">Visi Strategis</h3>
                <p class="relative z-10 text-gray-500 leading-relaxed text-base font-medium">
                    Menjadi desa yang mandiri, maju, dan sejahtera melalui pemanfaatan optimal teknologi informasi serta mengedepankan pelayanan publik yang prima, transparan, dan berbasis asas gotong royong.
                </p>
            </div>

            <div class="bg-white p-10 rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.03)] border border-gray-100 smooth-spring hover:-translate-y-3 hover:scale-[1.02] hover:shadow-[0_30px_60px_rgb(250,204,21,0.08)] hover:border-yellow-200 relative overflow-hidden group">
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-yellow-50 rounded-full blur-2xl smooth-spring group-hover:scale-[3] group-hover:bg-yellow-100/50"></div>
                
                <div class="relative z-10 w-14 h-14 bg-yellow-50 text-yellow-700 font-black text-sm rounded-2xl flex items-center justify-center mb-8 border border-yellow-100/50 smooth-spring group-hover:bg-yellow-400 group-hover:text-emerald-950 group-hover:-rotate-12">
                    MISI
                </div>
                <h3 class="relative z-10 font-black text-3xl text-emerald-950 mb-6">Misi Pembangunan</h3>
                <ul class="relative z-10 space-y-5 text-gray-500 text-base font-medium">
                    <li class="flex items-start gap-4 smooth-spring group-hover:translate-x-2">
                        <span class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs font-bold mt-0.5 smooth-spring group-hover:bg-yellow-400 group-hover:text-emerald-950">1</span>
                        Meningkatkan kualitas mutu pelayanan administrasi desa yang cepat, ramah, dan transparan.
                    </li>
                    <li class="flex items-start gap-4 smooth-spring group-hover:translate-x-2" style="transition-delay: 50ms;">
                        <span class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs font-bold mt-0.5 smooth-spring group-hover:bg-yellow-400 group-hover:text-emerald-950">2</span>
                        Mendorong akselerasi pertumbuhan UMKM serta roda ekonomi kreatif bagi warga lokal.
                    </li>
                    <li class="flex items-start gap-4 smooth-spring group-hover:translate-x-2" style="transition-delay: 100ms;">
                        <span class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs font-bold mt-0.5 smooth-spring group-hover:bg-yellow-400 group-hover:text-emerald-950">3</span>
                        Menjamin keterbukaan transparansi data publik serta tata kelola anggaran keuangan desa.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- ================= KONTAK DARURAT + PETA (data CONTOH, ganti dengan data asli) ================= -->
<!-- TODO: ganti nomor, alamat, jam buka, dan embed peta dengan data asli -->
<div class="bg-gray-50 py-20 md:py-24 border-t border-gray-100 reveal">
    <div class="max-w-6xl mx-auto px-4 grid lg:grid-cols-2 gap-6 md:gap-8 items-stretch">
        <div class="bg-emerald-950 rounded-[2rem] p-8 md:p-10 relative overflow-hidden flex flex-col justify-center">
            <div class="absolute -bottom-24 -right-24 w-[350px] h-[350px] bg-yellow-500/20 blur-[90px] pointer-events-none"></div>
            <h2 class="text-3xl font-black text-white tracking-tight mb-2">Kontak Darurat Desa</h2>
            <p class="text-emerald-100/70 text-sm font-medium mb-8">Dihubungi pada jam pelayanan. Di luar jam kerja, datang langsung ke pos jaga.</p>
            <div class="space-y-4 relative z-10">
                <a href="tel:08000000000" class="flex items-center gap-4 bg-white/5 border border-white/10 rounded-2xl p-4 smooth-spring hover:bg-white/10">
                    <div class="w-11 h-11 rounded-xl bg-yellow-400 text-emerald-950 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    </div>
                    <div>
                        <div class="text-[10px] font-black text-emerald-300 uppercase tracking-widest">Kantor Desa</div>
                        <div class="text-white font-black text-lg">0800-000-0000</div>
                    </div>
                </a>
                <div class="flex items-center gap-4 bg-white/5 border border-white/10 rounded-2xl p-4">
                    <div class="w-11 h-11 rounded-xl bg-white/10 text-white flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <div class="text-[10px] font-black text-emerald-300 uppercase tracking-widest">Jam Pelayanan</div>
                        <div class="text-white font-black">Senin–Jumat, 08.00–14.00</div>
                    </div>
                </div>
                <div class="flex items-center gap-4 bg-white/5 border border-white/10 rounded-2xl p-4">
                    <div class="w-11 h-11 rounded-xl bg-white/10 text-white flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <div>
                        <div class="text-[10px] font-black text-emerald-300 uppercase tracking-widest">Alamat</div>
                        <div class="text-white font-bold text-sm">Jl. Lintas Desa No. 01, Rantau Jaya, Belitang Madang Raya, OKU Timur</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-[2rem] border border-gray-200 overflow-hidden relative min-h-[320px]">
            <iframe
                title="Peta Desa Rantau Jaya, Belitang Madang Raya, OKU Timur"
                src="https://www.google.com/maps?q=Desa+Rantau+Jaya,+Belitang+Madang+Raya,+Ogan+Komering+Ulu+Timur,+Sumatera+Selatan&amp;output=embed"
                class="absolute inset-0 w-full h-full border-0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            <div class="absolute bottom-5 left-5 right-5 sm:right-auto bg-white/90 backdrop-blur-md px-5 py-3 rounded-2xl shadow-lg border border-white">
                <div class="text-xs font-bold text-emerald-950 uppercase tracking-wider">Rantau Jaya, Belitang Madang Raya, OKU Timur</div>
            </div>
        </div>
    </div>
</div>

<div class="py-16 bg-white relative reveal">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-10 gap-4">
            <div>
                <h2 class="text-3xl md:text-4xl font-black text-emerald-950 mb-2">Kabar Desa Terkini</h2>
                <p class="text-gray-500 font-medium text-sm md:text-base">Ikuti terus perkembangan informasi dan agenda terbaru di Desa Rantau Jaya.</p>
            </div>
            <a href="{{ route('berita.semua') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl border border-gray-200 text-sm font-bold text-emerald-700 hover:border-emerald-500 hover:text-emerald-600 shadow-sm smooth-spring group bg-white">
                Lihat Semua Berita
                <svg class="w-4 h-4 smooth-spring group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($berita_terbaru ?? $semua_berita ?? [] as $berita)
                <div class="bg-white rounded-3xl shadow-[0_4px_20px_rgb(0,0,0,0.04)] border border-gray-100 overflow-hidden flex flex-col group smooth-spring hover:-translate-y-3 hover:shadow-[0_20px_50px_rgb(0,0,0,0.1)]">
                    
                    <div class="h-48 bg-emerald-950 relative overflow-hidden flex flex-col justify-between p-5">
                        @if($berita->gambar)
                            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="absolute inset-0 w-full h-full object-cover smooth-spring group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-emerald-950/90 via-emerald-950/20 to-transparent"></div>
                        @else
                            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvc3ZnPg==')] bg-repeat opacity-20 smooth-spring group-hover:scale-110 group-hover:rotate-3"></div>
                        @endif

                        <div class="self-end relative z-10 bg-white rounded-xl px-3 py-1.5 text-center shadow-lg">
                            <div class="text-[10px] font-black text-emerald-800 uppercase">{{ $berita->created_at->format('M') }}</div>
                            <div class="text-lg font-black text-emerald-950 leading-none mt-0.5">{{ $berita->created_at->format('d') }}</div>
                        </div>
                        </div>
                    
                    <div class="p-6 md:p-8 flex flex-col flex-grow bg-white relative">
                        
                        <div class="absolute -top-4 left-6 z-10 bg-yellow-400 text-emerald-950 text-[10px] font-black px-4 py-1.5 rounded-lg uppercase tracking-widest shadow-md smooth-spring group-hover:-translate-y-1">
                            Kabar Utama
                        </div>
                        
                        <h3 class="text-xl font-black text-emerald-600 mb-3 mt-2 line-clamp-2 smooth-spring group-hover:text-emerald-500 leading-snug">
                            {{ $berita->judul }}
                        </h3>
                        <p class="text-gray-500 text-sm mb-6 line-clamp-2 font-medium flex-1">
                            {{ $berita->ringkasan }}
                        </p>
                        
                        <div class="mt-auto pt-4 border-t border-gray-50 flex justify-between items-center">
                            <span class="text-[10px] font-bold text-emerald-500 uppercase tracking-widest">Desa Rantau Jaya</span>
                            
                            <button type="button" 
                                class="btn-baca-berita text-sm font-black text-yellow-600 flex items-center gap-1.5 smooth-spring group-hover:text-yellow-500"
                                data-judul="{{ $berita->judul }}"
                                data-tanggal="{{ $berita->created_at->translatedFormat('d F Y') }}"
                                data-isi="{{ $berita->isi }}">
                                Baca Lanjut
                                <svg class="w-4 h-4 smooth-spring group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-16 bg-gray-50 rounded-3xl border border-dashed border-gray-200">
                    <p class="text-gray-500 font-medium">Belum ada berita terbaru yang dipublikasikan.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<div id="beritaModal" class="fixed inset-0 z-[9999] flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
    <div class="absolute inset-0 bg-emerald-950/70 backdrop-blur-sm modal-tutup cursor-pointer"></div>

    <div id="beritaModalBox" class="relative bg-white rounded-[2rem] w-full max-w-3xl mx-4 overflow-hidden shadow-2xl transform scale-95 opacity-0 transition-all duration-300 flex flex-col max-h-[90vh]">
        <div class="bg-emerald-900 px-6 py-5 sm:px-8 flex justify-between items-start shrink-0">
            <div class="pr-4">
                <span class="bg-yellow-400 text-emerald-950 text-[10px] font-black px-3 py-1 rounded-lg uppercase tracking-widest mb-3 inline-block shadow-sm">Kabar Utama</span>
                <h3 id="modalJudulBerita" class="text-xl sm:text-2xl font-black text-white leading-tight"></h3>
                <p class="text-emerald-300 text-[10px] uppercase tracking-widest font-bold mt-2 flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span id="modalTanggalBerita"></span>
                </p>
            </div>
            <button type="button" class="text-emerald-300 hover:text-white bg-white/10 hover:bg-red-500 hover:rotate-90 p-2 rounded-full smooth-spring modal-tutup shrink-0 shadow-sm">
                <svg class="w-5 h-5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <style>
            .custom-scrollbar::-webkit-scrollbar { width: 6px; }
            .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
            .custom-scrollbar::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 20px; }
        </style>
        
        <div class="px-6 py-8 sm:px-10 overflow-y-auto bg-gray-50 flex-grow custom-scrollbar">
            <p id="modalIsiBerita" class="text-sm sm:text-base text-gray-600 font-medium leading-relaxed sm:leading-loose whitespace-pre-line"></p>
        </div>

        <div class="bg-white px-6 py-5 sm:px-8 border-t border-gray-100 flex justify-end shrink-0">
            <button type="button" class="modal-tutup bg-emerald-600 hover:bg-emerald-700 text-white font-black py-2.5 px-6 rounded-xl shadow-md smooth-spring text-sm hover:-translate-y-1 hover:shadow-lg flex items-center gap-2">
                <svg class="w-4 h-4 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                Tutup Bacaan
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('beritaModal');
        const modalBox = document.getElementById('beritaModalBox');

        document.body.addEventListener('click', function(e) {
            // 1. BUKA MODAL
            let btnBaca = e.target.closest('.btn-baca-berita');
            if (btnBaca) {
                e.preventDefault();
                document.getElementById('modalJudulBerita').textContent = btnBaca.getAttribute('data-judul');
                document.getElementById('modalTanggalBerita').textContent = btnBaca.getAttribute('data-tanggal');
                document.getElementById('modalIsiBerita').textContent = btnBaca.getAttribute('data-isi');

                document.body.style.overflow = 'hidden';
                modal.classList.remove('hidden');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    modalBox.classList.remove('scale-95', 'opacity-0');
                    modalBox.classList.add('scale-100', 'opacity-100');
                }, 10); 
            }

            // 2. TUTUP MODAL
            if (e.target.closest('.modal-tutup') || e.target.classList.contains('modal-tutup')) {
                document.body.style.overflow = 'auto';
                modalBox.classList.remove('scale-100', 'opacity-100');
                modalBox.classList.add('scale-95', 'opacity-0');
                modal.classList.add('opacity-0');
                setTimeout(() => { modal.classList.add('hidden'); }, 300); 
            }
        });
    });
</script>
@endsection