@extends('layouts.app')

@section('content')

<!-- INJEKSI CSS CUSTOM UNTUK SMOOTH EASING -->
<style>
    .smooth-spring {
        transition-property: all;
        transition-duration: 500ms;
        transition-timing-function: cubic-bezier(0.16, 1, 0.3, 1);
    }
</style>

<div class="relative min-h-screen flex items-center justify-center bg-emerald-950 py-12 px-4 sm:px-6 lg:px-8 overflow-hidden">
    <!-- Ambient Background & Overlay (Gelap dan Eksklusif) -->
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&q=80&w=2000')] bg-cover bg-center opacity-10 mix-blend-screen"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-emerald-950 via-emerald-900/90 to-emerald-950"></div>
    
    <!-- Ornamen Glow Estetik Animasi -->
    <div class="absolute top-1/4 left-1/4 w-[500px] h-[500px] bg-emerald-500/20 rounded-full blur-[100px] pointer-events-none animate-pulse"></div>
    <div class="absolute bottom-1/4 right-1/4 w-[400px] h-[400px] bg-yellow-500/10 rounded-full blur-[80px] pointer-events-none" style="animation-delay: 2s;"></div>

    <!-- Container Utama Login (Glassmorphism) -->
    <div class="relative z-10 max-w-md w-full bg-white/95 backdrop-blur-2xl p-8 sm:p-10 rounded-[2.5rem] shadow-[0_20px_60px_rgb(0,0,0,0.2)] border border-white smooth-spring hover:shadow-[0_30px_70px_rgb(0,0,0,0.3)]">
        
        <div class="text-center mb-10">
            <!-- Ikon Security/Gembok -->
            <div class="w-16 h-16 bg-emerald-50 rounded-2xl border border-emerald-100 flex items-center justify-center mx-auto mb-6 text-emerald-600 smooth-spring hover:scale-110 hover:bg-emerald-600 hover:text-white hover:-rotate-6 cursor-default">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
            </div>
            
            <div class="inline-flex items-center gap-2 bg-emerald-50 text-emerald-700 text-[10px] font-black uppercase tracking-widest px-3 py-1.5 rounded-lg mb-4 border border-emerald-100">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                Area Terbatas
            </div>
            
            <h2 class="text-3xl font-black text-emerald-950 tracking-tight">Otorisasi Akses</h2>
            <p class="mt-2 text-sm font-medium text-gray-500">Silakan masuk menggunakan kredensial perangkat desa yang sah.</p>
        </div>

        <!-- Notifikasi Eror Jika Salah Password/Email -->
        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-2xl mb-8 text-xs font-bold flex items-center gap-3 shadow-sm smooth-spring animate-bounce">
                <div class="bg-red-500 text-white p-1 rounded-full flex-shrink-0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                </div>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <form class="space-y-6" action="{{ route('login.proses') }}" method="POST">
            @csrf
            
            <div class="space-y-5">
                <!-- Input Email -->
                <div>
                    <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Alamat Email Resmi</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-emerald-500 smooth-spring">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                        </div>
                        <input type="email" name="email" required value="{{ old('email') }}" placeholder="admin@rantaujaya.id"
                               class="w-full pl-11 pr-4 py-3.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:outline-none text-sm bg-gray-50/50 font-medium smooth-spring hover:shadow-sm">
                    </div>
                </div>
                
                <!-- Input Password -->
                <div>
                    <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Kata Sandi (Password)</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-emerald-500 smooth-spring">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
                        </div>
                        <input type="password" name="password" required placeholder="••••••••"
                               class="w-full pl-11 pr-4 py-3.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:outline-none text-sm bg-gray-50/50 font-medium smooth-spring hover:shadow-sm">
                    </div>
                </div>
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full flex items-center justify-center gap-2 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white font-black py-4 rounded-xl smooth-spring hover:shadow-[0_8px_20px_rgb(5,150,105,0.3)] hover:-translate-y-1 text-sm tracking-wide">
                    Masuk ke Dashboard
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </div>
        </form>

        <!-- Tombol Kembali ke Beranda -->
        <div class="mt-8 text-center border-t border-gray-100 pt-6">
            <a href="{{ route('beranda') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-gray-400 hover:text-emerald-600 transition smooth-spring group">
                <svg class="w-3.5 h-3.5 smooth-spring group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Batal & Kembali ke Beranda
            </a>
        </div>
        
    </div>
</div>
@endsection