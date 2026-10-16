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
    
    /* 4. Kustomisasi Scrollbar untuk Modal */
    .custom-scrollbar::-webkit-scrollbar { width: 6px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 20px; }
</style>

<div class="relative bg-emerald-950 text-white py-24 md:py-32 overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&q=80&w=2000')] bg-cover bg-center opacity-10 mix-blend-screen"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-emerald-900/80 to-transparent"></div>
    
    <div class="absolute -top-20 left-1/4 w-[600px] h-[600px] bg-emerald-500/20 blur-[100px] pointer-events-none animate-blob"></div>
    <div class="absolute -bottom-20 right-1/4 w-[500px] h-[500px] bg-yellow-500/10 blur-[100px] pointer-events-none animate-blob" style="animation-delay: -5s; animation-direction: reverse;"></div>

    <div class="relative max-w-5xl mx-auto px-4 text-center z-10 animate-entrance" style="animation-delay: 0.1s;">
        <div class="inline-flex items-center justify-center bg-white/5 backdrop-blur-md border border-white/10 text-yellow-400 text-[10px] font-black uppercase tracking-[0.2em] px-4 py-1.5 rounded-full mb-6 shadow-xl cursor-default smooth-spring hover:scale-105 hover:bg-white/10">
            <span class="w-1.5 h-1.5 rounded-full bg-yellow-400 mr-2 animate-pulse"></span>
            Pusat Informasi
        </div>
        <h1 class="text-4xl md:text-6xl font-black tracking-tight leading-tight mb-4 transition-all duration-500 hover:tracking-normal">
            Arsip Kabar <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-yellow-500">Desa</span>
        </h1>
        <p class="text-base md:text-lg text-emerald-100/70 max-w-2xl mx-auto font-medium leading-relaxed">Kumpulan informasi resmi, liputan kegiatan, dan transparansi perkembangan terbaru di Desa Rantau Jaya.</p>
    </div>
</div>

<div class="bg-gray-50 py-16 relative border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 -mt-24">
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($semua_berita as $berita)
                <div class="bg-white rounded-[2rem] shadow-[0_4px_20px_rgb(0,0,0,0.03)] border border-gray-100 overflow-hidden flex flex-col group smooth-spring hover:shadow-[0_25px_50px_rgb(0,0,0,0.1)] hover:-translate-y-4 hover:border-emerald-100 animate-entrance"
                     style="animation-delay: {{ 0.2 + ($loop->index * 0.1) }}s;">
                    
                    <div class="h-56 bg-emerald-900 relative overflow-hidden flex items-center justify-center">
                        @if($berita->gambar)
                            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="absolute inset-0 w-full h-full object-cover smooth-spring group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-emerald-950/90 via-emerald-950/20 to-transparent"></div>
                        @else
                            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvc3ZnPg==')] bg-repeat opacity-50 smooth-spring group-hover:scale-125 group-hover:rotate-6"></div>
                            <div class="absolute inset-0 bg-gradient-to-t from-emerald-950/90 via-emerald-950/20 to-transparent"></div>
                        @endif

                        <div class="absolute top-5 right-5 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-xl text-center shadow-lg smooth-spring group-hover:scale-110 group-hover:bg-yellow-400 group-hover:rotate-3 z-10">
                            <div class="text-[11px] font-bold text-emerald-700 uppercase smooth-spring group-hover:text-emerald-950">{{ $berita->created_at->format('M') }}</div>
                            <div class="text-xl font-black text-emerald-950 leading-none smooth-spring group-hover:scale-110">{{ $berita->created_at->format('d') }}</div>
                        </div>

                        @if(!$berita->gambar)
                            <svg class="w-16 h-16 text-emerald-500/50 relative z-10 smooth-spring group-hover:scale-110 group-hover:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                        @endif
                    </div>
                    
                    <div class="p-8 flex flex-col flex-grow relative bg-white">
                        <div class="absolute -top-6 left-8 bg-yellow-400 text-emerald-950 text-[10px] font-black tracking-widest uppercase px-4 py-2 rounded-xl shadow-md smooth-spring group-hover:-translate-y-1">
                            Kabar Desa
                        </div>
                        
                        <h3 class="font-black text-xl text-emerald-950 mb-3 mt-2 line-clamp-2 smooth-spring group-hover:text-emerald-600 leading-snug">
                            {{ $berita->judul }}
                        </h3>
                        <p class="text-gray-500 text-sm mb-8 line-clamp-3 leading-relaxed font-medium flex-1">
                            {{ $berita->ringkasan }}
                        </p>
                        
                        <div class="mt-auto pt-5 border-t border-gray-100 flex justify-between items-center">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Desa Rantau Jaya</span>
                            
                            <button type="button" 
                                class="btn-baca-berita text-xs font-black text-emerald-600 flex items-center gap-1.5 smooth-spring group-hover:text-emerald-500"
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
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-32 bg-white rounded-[2rem] border border-dashed border-gray-300 shadow-sm smooth-spring hover:scale-[1.01] animate-entrance" style="animation-delay: 0.3s;">
                    <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6 text-gray-300 transition-all duration-700 group-hover:rotate-180">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black text-emerald-950 mb-2">Belum Ada Arsip Berita</h3>
                    <p class="text-sm text-gray-500 font-medium max-w-md mx-auto leading-relaxed">Saat ini belum ada informasi atau pengumuman resmi terbaru yang diterbitkan oleh Pemerintah Desa.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-16 text-center animate-entrance" style="animation-delay: 0.8s;">
            <a href="{{ route('beranda') }}" class="inline-flex items-center gap-3 bg-white text-emerald-950 font-black py-4 px-8 rounded-2xl border border-gray-200 shadow-sm smooth-spring hover:border-emerald-600 hover:text-emerald-700 hover:shadow-lg hover:-translate-y-1 group">
                <svg class="w-5 h-5 smooth-spring group-hover:-translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Beranda Utama
            </a>
        </div>

    </div>
</div>

<div id="beritaModal" class="fixed inset-0 z-[100] flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
    <div class="absolute inset-0 bg-emerald-950/70 backdrop-blur-sm modal-tutup cursor-pointer"></div>

    <div id="beritaModalBox" class="relative bg-white rounded-[2rem] w-full max-w-3xl mx-4 overflow-hidden shadow-2xl transform scale-95 opacity-0 transition-all duration-300 flex flex-col max-h-[90vh]">

        <div class="bg-emerald-900 px-6 py-5 sm:px-8 flex justify-between items-start shrink-0">
            <div class="pr-4">
                <span class="bg-yellow-400 text-emerald-950 text-[10px] font-black px-3 py-1 rounded-lg uppercase tracking-widest mb-3 inline-block shadow-sm">
                    Kabar Desa
                </span>
                <h3 id="modalJudulBerita" class="text-xl sm:text-2xl font-black text-white leading-tight">
                    </h3>
                <p class="text-emerald-300 text-[10px] uppercase tracking-widest font-bold mt-2 flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span id="modalTanggalBerita"></span>
                </p>
            </div>
            
            <button type="button" class="text-emerald-300 hover:text-white bg-white/10 hover:bg-red-500 hover:rotate-90 p-2 rounded-full smooth-spring modal-tutup shrink-0 shadow-sm">
                <svg class="w-5 h-5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <div class="px-6 py-8 sm:px-10 overflow-y-auto bg-gray-50 flex-grow custom-scrollbar">
            <p id="modalIsiBerita" class="text-sm sm:text-base text-gray-600 font-medium leading-relaxed sm:leading-loose whitespace-pre-line">
                </p>
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
            
            // 1. KETIKA TOMBOL "BACA LANJUT" DIKLIK (Membuka Modal)
            let btnBaca = e.target.closest('.btn-baca-berita');
            if (btnBaca) {
                e.preventDefault();

                // Ambil data dari atribut HTML tombol
                let judul = btnBaca.getAttribute('data-judul');
                let tanggal = btnBaca.getAttribute('data-tanggal');
                let isi = btnBaca.getAttribute('data-isi');

                // Tembakkan data tersebut ke dalam kerangka ID Modal
                document.getElementById('modalJudulBerita').textContent = judul;
                document.getElementById('modalTanggalBerita').textContent = tanggal;
                document.getElementById('modalIsiBerita').textContent = isi;

                // Tampilkan Modal & Kunci Scroll Latar
                document.body.style.overflow = 'hidden';
                modal.classList.remove('hidden');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    modalBox.classList.remove('scale-95', 'opacity-0');
                    modalBox.classList.add('scale-100', 'opacity-100');
                }, 10); 
            }

            // 2. KETIKA TOMBOL "X", "TUTUP BACAAN", ATAU AREA BLUR DIKLIK (Menutup Modal)
            if (e.target.closest('.modal-tutup') || e.target.classList.contains('modal-tutup')) {
                
                // Jalankan animasi keluar & Buka Kunci Scroll Latar
                document.body.style.overflow = 'auto';
                modalBox.classList.remove('scale-100', 'opacity-100');
                modalBox.classList.add('scale-95', 'opacity-0');
                modal.classList.add('opacity-0');

                // Sembunyikan div total setelah animasi selesai (300ms)
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300); 
            }
        });
    });
</script>

@endsection