<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Resmi Desa Rantau Jaya</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        desaGreen: '#064e3b', // Hijau tua khas referensi
                        desaGold: '#eab308',  // Kuning emas untuk aksen & CTA
                    }
                }
            }
        }
    </script>

    <style>
        /* Efek Ilusi Kedalaman 3D pada Konten Utama */
        .content-depth-morph {
            transition: transform 0.7s cubic-bezier(0.16, 1, 0.3, 1),
                        filter 0.7s cubic-bezier(0.16, 1, 0.3, 1),
                        opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1);
            transform-origin: center 20%;
        }
        .content-depth-morph.morph-out {
            transform: scale(0.92) translateY(20px);
            filter: blur(10px);
            opacity: 0.3;
        }

        /* ================= KONTAINER PEMBATAS ANIMASI (Rata Air) ================= */
        /* RAHASIA UTAMA: Potong paksa semua yang melewati garis ini dengan overflow: hidden */
        #liquid-container {
            position: fixed;
            top: 80px; /* Mulai persis di bawah garis navbar (tinggi h-20 = 80px) */
            left: 0;
            width: 100%;
            height: calc(100vh - 80px); /* Sisa tinggi layar ke bawah */
            z-index: 998; /* Aman di bawah kasta navbar (999) */
            pointer-events: none;
            overflow: hidden; 
        }

        /* CAIRAN GELOMBANGNYA (z-998 agar mengalah dari navbar z-999) */
        #liquid-overlay {
            position: absolute;
            top: 100%; /* Mulai bersembunyi di bawah layar */
            left: -10%; /* Dilebarkan sedikit agar lengkungan pinggirnya tidak bocor */
            width: 120%;
            height: 100%;
            background-color: #022c22;
            border-radius: 100% 100% 0 0;
            transition: top 0.8s cubic-bezier(0.7, 0, 0.2, 1),
                        border-radius 0.8s cubic-bezier(0.7, 0, 0.2, 1);
        }
        
        /* Fase 1: Menyapu Naik & Rata Air */
        #liquid-overlay.sweep-up {
            top: 0; /* Mentok sempurna di atap kontainer (garis batas bawah navbar) */
            border-radius: 0; /* Hilangkan lengkungan menjadi garis lurus */
        }

        /* Fase 2: Menyedot Keluar ke Atas */
        #liquid-overlay.sweep-out {
            top: -120%; /* Ditarik ke atas menghilang "ditelan" oleh navbar */
            border-radius: 0 0 100% 100%; /* Buntutnya melengkung natural */
        }
        
        /* Animasi Transisi Halus (Pegas) untuk Elemen Selain Kapsul */
        .smooth-spring {
            transition-property: all;
            transition-duration: 500ms;
            transition-timing-function: cubic-bezier(0.16, 1, 0.3, 1);
        }
    </style>

    <style>
        @keyframes toast-enter {
            0% { transform: translate(100%, 0) scale(0.9); opacity: 0; }
            100% { transform: translate(0, 0) scale(1); opacity: 1; }
        }
        @keyframes toast-leave {
            0% { transform: translate(0, 0) scale(1); opacity: 1; }
            100% { transform: translate(100%, -20px) scale(0.9); opacity: 0; }
        }
        @keyframes toast-progress {
            0% { width: 100%; }
            100% { width: 0%; }
        }
        .animate-toast-enter {
            animation: toast-enter 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        .animate-toast-leave {
            animation: toast-leave 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        .toast-progress-bar {
            animation: toast-progress 4s linear forwards;
        }
    </style>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">

    <nav class="fixed top-0 inset-x-0 z-[999] bg-emerald-950/85 backdrop-blur-lg backdrop-saturate-150 border-b border-emerald-800/50 transition-all duration-500" id="main-navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                <a href="{{ route('beranda') }}" class="flex-shrink-0 flex items-center gap-3 group smooth-spring hover:-translate-y-0.5" aria-label="Beranda Desa Rantau Jaya">
                    <div class="w-10 h-10 bg-gradient-to-br from-yellow-300 to-yellow-500 text-emerald-950 flex items-center justify-center rounded-full font-black text-sm shadow-[0_4px_15px_rgb(250,204,21,0.4)] smooth-spring group-hover:rotate-12 group-hover:scale-110">
                        DRJ
                    </div>
                    <div class="flex flex-col">
                        <span class="text-white font-black text-lg tracking-wide leading-none group-hover:text-yellow-400 transition-colors">Desa Rantau Jaya</span>
                        <span class="text-emerald-300 text-[10px] uppercase tracking-widest font-bold mt-0.5">Kecamatan Makmur</span>
                    </div>
                </a>

                <div class="hidden md:flex relative items-center py-2" id="nav-menu">
                    
                    <div id="nav-indicator" class="absolute h-10 bg-white/10 border border-white/20 rounded-full pointer-events-none opacity-0 shadow-[inset_0_1px_1px_rgba(255,255,255,0.2),0_4px_12px_rgba(0,0,0,0.1)] backdrop-blur-md" 
                    style="transition: transform 0.6s cubic-bezier(0.25, 1, 0.3, 1), width 0.6s cubic-bezier(0.25, 1, 0.3, 1), opacity 0.3s ease;">
                    </div>

                    <a href="{{ route('beranda') }}" class="nav-item relative z-10 px-5 py-2.5 flex items-center justify-center smooth-spring {{ request()->routeIs('beranda') ? 'text-yellow-400 font-black scale-[1.05] active-nav drop-shadow-sm' : 'text-emerald-50/80 hover:text-white font-semibold hover:scale-105' }}">
                        Beranda
                    </a>
                    
                    <a href="{{ route('profil') }}" class="nav-item relative z-10 px-5 py-2.5 flex items-center justify-center smooth-spring {{ request()->routeIs('profil') ? 'text-yellow-400 font-black scale-[1.05] active-nav drop-shadow-sm' : 'text-emerald-50/80 hover:text-white font-semibold hover:scale-105' }}">
                        Profil
                    </a>
                    
                    <a href="{{ route('umkm') }}" class="nav-item relative z-10 px-5 py-2.5 flex items-center justify-center smooth-spring {{ request()->routeIs('umkm') ? 'text-yellow-400 font-black scale-[1.05] active-nav drop-shadow-sm' : 'text-emerald-50/80 hover:text-white font-semibold hover:scale-105' }}">
                        UMKM
                    </a>
                    
                    <a href="{{ route('penduduk') }}" class="nav-item relative z-10 px-5 py-2.5 flex items-center justify-center smooth-spring {{ request()->routeIs('penduduk') ? 'text-yellow-400 font-black scale-[1.05] active-nav drop-shadow-sm' : 'text-emerald-50/80 hover:text-white font-semibold hover:scale-105' }}">
                        Data Penduduk
                    </a>
                </div>

                <div class="hidden md:block">
                    <a href="{{ route('kontak') }}" id="btn-pengaduan" class="smooth-spring hover:-translate-y-1 hover:scale-105 text-sm flex items-center gap-2 font-bold px-6 py-2.5 rounded-full shadow-[0_4px_15px_rgba(0,0,0,0.1)] 
                        {{ request()->routeIs('kontak') 
                            ? 'bg-gradient-to-r from-yellow-400 to-yellow-500 text-emerald-950 shadow-[0_4px_15px_rgb(250,204,21,0.3)]' 
                            : 'bg-white/10 backdrop-blur-md border border-white/20 text-white hover:bg-yellow-400 hover:text-emerald-950 hover:border-yellow-400' }}">
                        Layanan Pengaduan
                    </a>
                </div>

                <div class="md:hidden">
                    <button type="button" id="btn-mobile-menu" aria-expanded="false" aria-controls="mobile-menu" aria-label="Buka menu navigasi"
                        class="text-white p-2.5 rounded-xl border border-white/20 bg-white/10">
                        <svg id="icon-menu-open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                        <svg id="icon-menu-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden border-t border-emerald-800/50 bg-emerald-950/95 backdrop-blur-lg px-4 pt-2 pb-6">
            <a href="{{ route('beranda') }}" class="block px-4 py-3 rounded-xl font-bold {{ request()->routeIs('beranda') ? 'text-yellow-400 bg-white/10' : 'text-emerald-50/90' }}">Beranda</a>
            <a href="{{ route('profil') }}" class="block px-4 py-3 rounded-xl font-bold {{ request()->routeIs('profil') ? 'text-yellow-400 bg-white/10' : 'text-emerald-50/90' }}">Profil</a>
            <a href="{{ route('umkm') }}" class="block px-4 py-3 rounded-xl font-bold {{ request()->routeIs('umkm') ? 'text-yellow-400 bg-white/10' : 'text-emerald-50/90' }}">UMKM</a>
            <a href="{{ route('penduduk') }}" class="block px-4 py-3 rounded-xl font-bold {{ request()->routeIs('penduduk') ? 'text-yellow-400 bg-white/10' : 'text-emerald-50/90' }}">Data Penduduk</a>
            <a href="{{ route('berita.semua') }}" class="block px-4 py-3 rounded-xl font-bold {{ request()->routeIs('berita.semua') ? 'text-yellow-400 bg-white/10' : 'text-emerald-50/90' }}">Berita</a>
            <a href="{{ route('kontak') }}" class="block px-4 py-3 mt-2 rounded-xl font-bold text-center bg-yellow-400 text-emerald-950">Layanan Pengaduan</a>
        </div>
    </nav>

    <div class="h-20"></div>

    <main class="flex-grow">
        <div id="page-content" class="content-depth-morph">
            @yield('content')
        </div>
    </main>

    <footer class="bg-gray-900 text-gray-400 py-6 text-center text-sm border-t-4 border-desaGold">
        <p>&copy; 2026 Pemerintah Desa Rantau Jaya. All Rights Reserved.</p>
    </footer>

    <div id="liquid-container">
        <div id="liquid-overlay"></div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            
            // --- 1. LOGIKA KAPSUL MELUNCUR ---
            const navMenu = document.getElementById('nav-menu');
            const indicator = document.getElementById('nav-indicator');
            const navItems = document.querySelectorAll('.nav-item');

            function getActiveNav() {
                return document.querySelector('.active-nav');
            }

            // Fungsi memindahkan kapsul (Luncuran Pegas Mulus)
            function moveIndicator(element) {
                if(!element) return;
                indicator.style.width = `${element.offsetWidth}px`;
                indicator.style.transform = `translateX(${element.offsetLeft}px)`;
                indicator.style.opacity = '1';
            }

            // Posisi awal saat web dibuka
            if (getActiveNav()) {
                setTimeout(() => moveIndicator(getActiveNav()), 100);
            } else {
                indicator.style.opacity = '0';
            }

            // Kapsul ngikutin kursor
            navItems.forEach(item => {
                item.addEventListener('mouseenter', (e) => {
                    moveIndicator(e.target);
                });
            });

            navMenu.addEventListener('mouseleave', () => {
                const active = getActiveNav();
                if (active) {
                    moveIndicator(active);
                } else {
                    indicator.style.opacity = '0';
                }
            });

            // --- 1.2 MENU MOBILE (R-03/R-32): tombol sungguhan, bisa keyboard + Escape ---
            const btnMobile = document.getElementById('btn-mobile-menu');
            const mobileMenu = document.getElementById('mobile-menu');
            const iconOpen = document.getElementById('icon-menu-open');
            const iconClose = document.getElementById('icon-menu-close');

            function setMobileMenu(open) {
                if (!btnMobile || !mobileMenu) return;
                mobileMenu.classList.toggle('hidden', !open);
                btnMobile.setAttribute('aria-expanded', open ? 'true' : 'false');
                btnMobile.setAttribute('aria-label', open ? 'Tutup menu navigasi' : 'Buka menu navigasi');
                if (iconOpen) iconOpen.classList.toggle('hidden', open);
                if (iconClose) iconClose.classList.toggle('hidden', !open);
            }

            if (btnMobile) {
                btnMobile.addEventListener('click', () => {
                    setMobileMenu(mobileMenu.classList.contains('hidden'));
                });
            }

            // Escape menutup modal berita dan menu mobile (R-32)
            document.addEventListener('keydown', (e) => {
                if (e.key !== 'Escape') return;
                const modal = document.getElementById('beritaModal');
                if (modal && !modal.classList.contains('hidden')) {
                    const closeBtn = modal.querySelector('.modal-tutup');
                    if (closeBtn) closeBtn.click();
                }
                setMobileMenu(false);
            });


            // ================================================================
            // --- 1.5 GLOBAL MODAL HANDLER ANTI-MACET ---
            // ================================================================
            document.body.addEventListener('click', function(e) {
                
                // A. Logika BUKA Modal Berita
                let btnBaca = e.target.closest('.btn-baca-berita');
                if (btnBaca) {
                    e.preventDefault();
                    const modal = document.getElementById('beritaModal');
                    const modalBox = document.getElementById('beritaModalBox');
                    
                    if (modal && modalBox) {
                        // Tembakkan data ke modal
                        document.getElementById('modalJudulBerita').textContent = btnBaca.getAttribute('data-judul');
                        document.getElementById('modalTanggalBerita').textContent = btnBaca.getAttribute('data-tanggal');
                        document.getElementById('modalIsiBerita').textContent = btnBaca.getAttribute('data-isi');

                        // Munculkan Modal & Kunci Scroll Layar Utama
                        document.body.style.overflow = 'hidden';
                        modal.classList.remove('hidden');
                        setTimeout(() => {
                            modal.classList.remove('opacity-0');
                            modalBox.classList.remove('scale-95', 'opacity-0');
                            modalBox.classList.add('scale-100', 'opacity-100');
                        }, 10); 
                    }
                }

                // B. Logika TUTUP Modal Berita
                if (e.target.closest('.modal-tutup') || e.target.classList.contains('modal-tutup')) {
                    const modal = document.getElementById('beritaModal');
                    const modalBox = document.getElementById('beritaModalBox');
                    
                    if (modal && modalBox) {
                        // Kembalikan Scroll Layar Utama
                        document.body.style.overflow = 'auto';
                        
                        // Mainkan Animasi Keluar
                        modalBox.classList.remove('scale-100', 'opacity-100');
                        modalBox.classList.add('scale-95', 'opacity-0');
                        modal.classList.add('opacity-0');
                        
                        // Sembunyikan Elemen
                        setTimeout(() => { modal.classList.add('hidden'); }, 300); 
                    }
                }
            });
            // ================================================================


            // --- 2. LOGIKA PERPINDAHAN HALAMAN ANTI-GLITCH (SPA) ---
            const contentContainer = document.getElementById("page-content");
            const liquidOverlay = document.getElementById("liquid-overlay");

            const loadPage = async (url) => {
                // Animasi Keluar
                contentContainer.classList.add("morph-out");
                liquidOverlay.classList.add("sweep-up");

                // Tunggu cairan menutupi layar sepenuhnya sebelum menukar data
                await new Promise(resolve => setTimeout(resolve, 500));

                try {
                    const response = await fetch(url);
                    const htmlText = await response.text();
                    
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(htmlText, "text/html");
                    
                    const newContent = doc.getElementById("page-content").innerHTML;
                    const newTitle = doc.querySelector("title")?.innerText;

                    // Terapkan Konten Baru (KITA TIDAK MENGHANCURKAN NAVBAR LAGI)
                    contentContainer.innerHTML = newContent;
                    if (newTitle) document.title = newTitle;
                    window.scrollTo({ top: 0, behavior: 'instant' });

                    // --- MAGIC-NYA DI SINI: Update Kelas Menu Secara Manual Agar Kapsul Bisa Meluncur ---
                    const absoluteUrl = new URL(url, window.location.origin).href; 
                    
                    // 1. Urus teks menu utama
                    navItems.forEach(item => {
                        item.className = 'nav-item relative z-10 px-5 py-2.5 flex items-center justify-center smooth-spring text-emerald-50/80 hover:text-white font-semibold hover:scale-105';
                        if (item.href === absoluteUrl) {
                            item.className = 'nav-item relative z-10 px-5 py-2.5 flex items-center justify-center smooth-spring text-yellow-400 font-black scale-[1.05] active-nav drop-shadow-sm';
                        }
                    });

                    // 2. Perintahkan kapsul bereaksi
                    const activeNow = getActiveNav();
                    if(activeNow) {
                        moveIndicator(activeNow);
                    } else {
                        indicator.style.opacity = '0'; // Hilangkan kapsul jika tidak ada menu teks yang cocok
                    }

                    // 3. Urus tombol "Layanan Pengaduan"
                    const btnPengaduan = document.getElementById('btn-pengaduan');
                    if(btnPengaduan) {
                        if (btnPengaduan.href === absoluteUrl) {
                            btnPengaduan.className = 'smooth-spring hover:-translate-y-1 hover:scale-105 text-sm flex items-center gap-2 font-bold px-6 py-2.5 rounded-full bg-gradient-to-r from-yellow-400 to-yellow-500 text-emerald-950 shadow-[0_4px_15px_rgb(250,204,21,0.3)]';
                        } else {
                            btnPengaduan.className = 'smooth-spring hover:-translate-y-1 hover:scale-105 text-sm flex items-center gap-2 font-bold px-6 py-2.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white shadow-[0_4px_15px_rgba(0,0,0,0.1)] hover:bg-yellow-400 hover:text-emerald-950 hover:border-yellow-400';
                        }
                    }
                    // ------------------------------------------------

                    // Animasi Masuk
                    liquidOverlay.classList.remove("sweep-up");
                    liquidOverlay.classList.add("sweep-out");
                    contentContainer.classList.remove("morph-out");

                    setTimeout(() => {
                        // Reset cairan ke bawah secara diam-diam
                        liquidOverlay.style.transition = "none";
                        liquidOverlay.classList.remove("sweep-out");
                        void liquidOverlay.offsetWidth; // Reflow
                        liquidOverlay.style.transition = ""; 
                    }, 800);

                } catch (error) {
                    // Fallback aman jika koneksi error (Reload halaman konvensional)
                    window.location.href = url; 
                }
            };

            // Cegat klik navigasi internal agar tidak reload
            document.addEventListener("click", (e) => {
                const link = e.target.closest("a");
                if (link && link.href && link.host === window.location.host) {
                    // Jangan cegat link logout, download, tab baru, atau tombol modal pop-up (Baca Lanjut)
                    if (link.href.includes("logout") || link.getAttribute("target") === "_blank" || link.hasAttribute("download") || link.classList.contains("btn-baca-berita")) return;

                    e.preventDefault();
                    try {
                        setMobileMenu(false);
                        window.history.pushState(null, null, link.href);
                        loadPage(link.href);
                    } catch (err) {
                        // Fallback: navigasi biasa jika pushState/SPA gagal
                        // (mis. beda skema http vs https)
                        window.location.href = link.href;
                    }
                }
            });

            // Tangani tombol back/forward browser
            window.addEventListener("popstate", () => {
                loadPage(window.location.href);
            });
        });
    </script>

    @php
        $toastMessage = session('sukses') ?? session('sukses_berita') ?? session('sukses_umkm') ?? session('sukses_aksi') ?? null;
        $toastType = 'success';

        if (!$toastMessage && $errors->any()) {
            $toastMessage = $errors->first();
            $toastType = 'error';
        }
    @endphp

    @if($toastMessage)
        <div id="global-toast" class="fixed top-8 right-8 z-[99999] w-full max-w-sm animate-toast-enter">
            <div class="relative bg-white/95 backdrop-blur-xl border border-gray-100 p-5 rounded-2xl shadow-[0_20px_50px_rgb(0,0,0,0.15)] overflow-hidden">
                <div class="flex items-start gap-4">
                    @if($toastType === 'success')
                    <div class="w-10 h-10 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-500 flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    @else
                    <div class="w-10 h-10 rounded-xl bg-red-50 border border-red-100 flex items-center justify-center text-red-500 flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </div>
                    @endif
                    
                    <div class="flex-1 pt-0.5">
                        <h4 class="text-sm font-black text-gray-900 mb-0.5">
                            {{ $toastType === 'success' ? 'Sistem Terkonfirmasi!' : 'Terjadi Kesalahan' }}
                        </h4>
                        <p class="text-xs font-medium text-gray-500 leading-relaxed pr-2">{{ $toastMessage }}</p>
                    </div>

                    <button onclick="closeToast()" class="text-gray-500 hover:text-gray-800 transition p-1 bg-gray-50 hover:bg-gray-100 rounded-lg">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
                <div class="absolute bottom-0 left-0 h-1 {{ $toastType === 'success' ? 'bg-gradient-to-r from-emerald-400 to-emerald-600' : 'bg-gradient-to-r from-red-400 to-red-600' }} toast-progress-bar"></div>
            </div>
        </div>

        <script>
            function closeToast() {
                const toast = document.getElementById('global-toast');
                if (toast) {
                    toast.classList.remove('animate-toast-enter');
                    toast.classList.add('animate-toast-leave');
                    setTimeout(() => toast.remove(), 500);
                }
            }
            // Auto close setelah 4 detik
            setTimeout(() => closeToast(), 4000);
        </script>
    @endif

</body>
</html>