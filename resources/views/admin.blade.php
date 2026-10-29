@extends('layouts.app')

@section('content')

<style>
    .smooth-spring {
        transition-property: all;
        transition-duration: 500ms;
        transition-timing-function: cubic-bezier(0.16, 1, 0.3, 1);
    }
</style>

<div class="relative bg-emerald-950 text-white pb-20 pt-32 lg:pt-40 -mt-20 overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&q=80&w=2000')] bg-cover bg-center opacity-10 mix-blend-screen"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-emerald-900/80 to-transparent"></div>
    
    <div class="absolute top-0 right-0 w-96 h-96 bg-emerald-500/20 rounded-full blur-[80px]"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-yellow-500/10 rounded-full blur-[80px]"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
        
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            
            <div class="flex items-center gap-3 py-2">
                <span class="inline-flex rounded-full h-3 w-3 bg-yellow-500"></span>
                <span class="text-xs font-black text-emerald-200 uppercase tracking-widest drop-shadow-md">Sistem Admin Berjalan</span>
            </div>

            <form action="{{ route('logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="group bg-white/5 hover:bg-red-500/90 backdrop-blur-md border border-white/10 hover:border-red-400 text-emerald-100 hover:text-white text-xs font-bold py-2.5 px-5 rounded-xl shadow-sm smooth-spring flex items-center gap-2 hover:-translate-y-0.5 transition-all">
                    <span>Keluar Sistem</span>
                    <svg class="w-4 h-4 text-emerald-400 group-hover:text-white smooth-spring" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                </button>
            </form>
        </div>
        
        <h1 class="text-4xl md:text-5xl font-black tracking-tight leading-tight">
            Dashboard Panel <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-yellow-500">Perangkat Desa</span>
        </h1>
        <p class="text-sm md:text-base text-emerald-100/70 mt-4 max-w-xl font-medium leading-relaxed">
            Pusat kontrol manajemen aspirasi masyarakat, pengelolaan berita, dan pendaftaran lapak UMKM warga Rantau Jaya.
        </p>
    </div>
</div>

<div class="bg-gray-50 py-12 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-12 gap-8 relative z-10 -mt-24">
        
        <div class="lg:col-span-4 space-y-8">
            <div class="bg-white/90 backdrop-blur-xl p-8 rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white smooth-spring hover:shadow-[0_20px_50px_rgb(0,0,0,0.08)]">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-black text-emerald-950">Publikasi Berita</h3>
                        <p class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">Tulis Kabar Desa</p>
                    </div>
                </div>

                @if(session('sukses_berita'))
                    <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-2xl mb-6 text-xs font-semibold flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        {{ session('sukses_berita') }}
                    </div>
                @endif

                <form action="{{ route('berita.simpan') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-2">Judul Berita</label>
                        <input type="text" name="judul" required value="{{ old('judul') }}" placeholder="Contoh: Kerja Bakti Bersama..."
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:outline-none text-sm bg-gray-50/50 smooth-spring">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-2">Foto / Gambar Berita</label>
                        <input type="file" name="gambar" accept="image/*" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:outline-none text-sm bg-gray-50/50 smooth-spring 
                                    file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-black file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 cursor-pointer">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-2">Ringkasan (Di Depan)</label>
                        <textarea name="ringkasan" rows="2" required placeholder="Tulis ringkasan pendek..."
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:outline-none text-sm bg-gray-50/50 smooth-spring">{{ old('ringkasan') }}</textarea>
                    </div>
                    
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-2">Isi Lengkap Berita</label>
                        <textarea name="isi" rows="4" required placeholder="Tuliskan berita lengkap di sini..."
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:outline-none text-sm bg-gray-50/50 smooth-spring">{{ old('isi') }}</textarea>
                    </div>
                    
                    <button type="submit" class="w-full bg-gradient-to-r from-emerald-600 to-emerald-700 text-white font-black py-3.5 rounded-xl smooth-spring hover:shadow-[0_8px_20px_rgb(5,150,105,0.3)] hover:-translate-y-1 text-sm tracking-wide">
                        Terbitkan Berita
                    </button>
                </form>
            </div>

            <div class="bg-white/90 backdrop-blur-xl p-8 rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white smooth-spring hover:shadow-[0_20px_50px_rgb(0,0,0,0.08)]">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 rounded-xl bg-yellow-50 border border-yellow-100 flex items-center justify-center text-yellow-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-black text-emerald-950">Pendaftaran UMKM</h3>
                        <p class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">Daftar Usaha Warga</p>
                    </div>
                </div>

                @if(session('sukses_umkm'))
                    <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 px-4 py-3 rounded-2xl mb-6 text-xs font-semibold flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        {{ session('sukses_umkm') }}
                    </div>
                @endif

                <form action="{{ route('umkm.simpan') }}" method="POST" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-2">Nama Usaha</label>
                        <input type="text" name="nama_produk" required value="{{ old('nama_produk') }}" placeholder="Contoh: Bengkel Las Mas Mul"
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 focus:outline-none text-sm bg-gray-50/50 smooth-spring">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-2">Kategori</label>
                        <select name="kategori" required
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 focus:outline-none text-sm bg-gray-50/50 smooth-spring">
                            <option value="" disabled {{ old('kategori') ? '' : 'selected' }}>Pilih kategori usaha</option>
                            @foreach([
                                'Bengkel dan Jasa Perbaikan',
                                'Kuliner dan Usaha Rumahan',
                                'Usaha Teknologi dan Layanan Digital',
                                'Perdagangan dan Kebutuhan Rumah Tangga',
                                'Jasa Profesional dan Perawatan diri',
                                'Jasa untuk acara dan kebutuhan masyarakat',
                                'Pertanian',
                                'Jasa Pendidikan dan Pelatihan',
                                'Layanan Kesehatan',
                            ] as $kategori)
                                <option value="{{ $kategori }}" {{ old('kategori') === $kategori ? 'selected' : '' }}>{{ $kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-2">Alamat Usaha</label>
                        <input type="text" name="alamat" value="{{ old('alamat') }}" placeholder="Jl. Swadaya, Rantau Jaya"
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 focus:outline-none text-sm bg-gray-50/50 smooth-spring">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-600 mb-2">WhatsApp (opsional)</label>
                            <input type="text" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="62812345678"
                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 focus:outline-none text-sm bg-gray-50/50 smooth-spring">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-600 mb-2">Link Maps (opsional)</label>
                            <input type="url" name="maps_url" value="{{ old('maps_url') }}" placeholder="https://maps.app.goo.gl/..."
                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 focus:outline-none text-sm bg-gray-50/50 smooth-spring">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-2">Deskripsi (opsional)</label>
                        <textarea name="deskripsi" rows="3" placeholder="Tulis layanan atau keunggulan usaha..."
                                  class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 focus:outline-none text-sm bg-gray-50/50 smooth-spring">{{ old('deskripsi') }}</textarea>
                    </div>
                    <button type="submit" class="w-full bg-gradient-to-r from-yellow-400 to-yellow-500 text-emerald-950 font-black py-3.5 rounded-xl smooth-spring hover:shadow-[0_8px_20px_rgb(250,204,21,0.3)] hover:-translate-y-1 text-sm tracking-wide">
                        Daftarkan UMKM
                    </button>
                </form>
            </div>
        </div>

        <div class="lg:col-span-8">
            <div class="bg-white p-8 rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 overflow-hidden h-full">
                
                <div class="mb-8 flex flex-col xl:flex-row justify-between items-start xl:items-end gap-4">
                    <div>
                        <h2 class="text-2xl font-black text-emerald-950">Aspirasi & Laporan Warga</h2>
                        <p class="text-sm font-medium text-gray-500 mt-1">Total <span class="font-bold text-emerald-600">{{ $semua_pengaduan->count() }}</span> berkas aspirasi warga tercatat dalam sistem.</p>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2 w-full xl:w-auto">
                        <button type="button" onclick="bukaPreviewPdf('{{ route('admin.pengaduan.pdf') }}')" class="inline-flex justify-center items-center gap-2 text-xs font-black text-emerald-700 bg-emerald-50 border border-emerald-200 py-3 px-4 rounded-xl shadow-sm smooth-spring hover:shadow-md hover:-translate-y-0.5 hover:bg-emerald-100 whitespace-nowrap">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            PREVIEW PDF
                        </button>

                        <a href="{{ route('admin.pengaduan.pdf', ['download' => 1]) }}" download target="_blank" class="inline-flex justify-center items-center gap-2 text-xs font-black text-white bg-gradient-to-r from-emerald-600 to-emerald-700 py-3 px-4 rounded-xl shadow-md smooth-spring hover:shadow-lg hover:-translate-y-0.5 hover:from-emerald-700 hover:to-emerald-800 whitespace-nowrap">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            UNDUH PDF
                        </a>
                        
                        <a href="{{ route('beranda') }}" class="inline-flex justify-center items-center gap-2 text-xs font-bold text-gray-600 hover:text-emerald-700 transition smooth-spring group bg-gray-50 hover:bg-emerald-50 py-3 px-4 rounded-xl border border-gray-200 whitespace-nowrap">
                            <svg class="w-4 h-4 smooth-spring group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            <span>Beranda</span>
                        </a>
                    </div>
                </div>

                <div class="overflow-x-auto rounded-2xl border border-gray-100 bg-white">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/80 border-b border-gray-100 text-[11px] font-black uppercase tracking-widest text-gray-500">
                                <th class="px-5 py-4 text-center w-12 rounded-tl-2xl">No</th>
                                <th class="px-5 py-4">Data Pelapor</th>
                                <th class="px-6 py-4">Isi Aspirasi</th>
                                <th class="px-5 py-4 text-center">Status</th>
                                <th class="px-5 py-4 text-center rounded-tr-2xl">Manajemen</th>
                            </tr>
                        </thead>
                            <tbody class="divide-y divide-gray-50 text-sm text-gray-600">
                                @forelse($semua_pengaduan as $index => $item)
                                    <tr id="row-{{ $item->id }}" class="hover:bg-gray-50/50 transition-colors duration-200 group">
                                        <td class="px-5 py-5 text-center font-bold text-gray-500">{{ $index + 1 }}</td>
                                        <td class="px-5 py-5">
                                            <div class="font-black text-emerald-950">{{ $item->nama }}</div>
                                            <div class="text-[11px] font-bold text-gray-500 mt-1 uppercase tracking-wider">{{ $item->created_at->format('d M Y') }}</div>
                                        </td>
                                        
                                        <td class="px-6 py-5 max-w-xs md:max-w-md cursor-pointer group/detail btn-detail relative"
                                            data-nama="{{ $item->nama }}"
                                            data-tanggal="{{ $item->created_at->format('d M Y') }}"
                                            data-kategori="{{ $item->kategori }}"
                                            data-isi="{{ $item->isi_laporan }}">
                                            
                                            <div class="transition-all duration-200 group-hover/detail:opacity-0">
                                                <span class="px-2.5 py-1 text-[10px] font-black rounded-lg uppercase tracking-wider inline-block mb-2
                                                    {{ $item->kategori == 'Infrastruktur' ? 'bg-blue-50 text-blue-600 border border-blue-100' : '' }}
                                                    {{ $item->kategori == 'Bansos' ? 'bg-orange-50 text-orange-600 border border-orange-100' : '' }}
                                                    {{ $item->kategori == 'Pelayanan' ? 'bg-purple-50 text-purple-600 border border-purple-100' : '' }}
                                                    {{ $item->kategori == 'Lainnya' ? 'bg-gray-50 text-gray-600 border border-gray-200' : '' }}">
                                                    {{ $item->kategori }}
                                                </span>
                                                
                                                <p class="text-gray-500 font-medium leading-relaxed text-xs whitespace-pre-line overflow-hidden" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $item->isi_laporan }}</p>
                                            </div>
                                            
                                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover/detail:opacity-100 transition-opacity duration-200 bg-white/95 backdrop-blur-xs rounded-xl">
                                                <span class="bg-emerald-600 text-white text-[10px] font-black px-4 py-2 rounded-xl shadow-md flex items-center gap-1.5 border border-emerald-700 transform scale-95 group-hover/detail:scale-100 transition-all duration-200">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                                    BACA PENUH
                                                </span>
                                            </div>
                                        </td>

                                        <td class="px-5 py-5 text-center whitespace-nowrap">
                                            <span class="px-3 py-1.5 text-[11px] font-black rounded-xl border inline-flex items-center gap-1.5 transition-colors duration-300
                                                {{ $item->status == 'Pending' ? 'bg-yellow-50 text-yellow-700 border-yellow-200' : '' }}
                                                {{ $item->status == 'Diproses' ? 'bg-blue-50 text-blue-700 border-blue-200' : '' }}
                                                {{ $item->status == 'Selesai' ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : '' }}">
                                                <span class="w-1.5 h-1.5 rounded-full transition-colors duration-300
                                                    {{ $item->status == 'Pending' ? 'bg-yellow-500' : '' }}
                                                    {{ $item->status == 'Diproses' ? 'bg-blue-500' : '' }}
                                                    {{ $item->status == 'Selesai' ? 'bg-emerald-500' : '' }}"></span>
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                        <td class="px-5 py-5 text-center whitespace-nowrap">
                                            <div class="flex gap-2 justify-center items-center opacity-70 group-hover:opacity-100 transition-opacity duration-200">
                                                
                                                @if($item->status == 'Pending')
                                                    <form action="{{ route('admin.pengaduan.status', $item->id) }}" method="POST" class="form-status m-0">
                                                        @csrf
                                                        <input type="hidden" name="status" value="Diproses">
                                                        <button type="submit" class="bg-blue-50 hover:bg-blue-600 text-blue-600 hover:text-white border border-blue-200 text-[10px] font-black py-1.5 px-3 rounded-lg hover:-translate-y-0.5 transition-all">
                                                            Proses
                                                        </button>
                                                    </form>
                                                @elseif($item->status == 'Diproses')
                                                    <form action="{{ route('admin.pengaduan.status', $item->id) }}" method="POST" class="form-status m-0">
                                                        @csrf
                                                        <input type="hidden" name="status" value="Selesai">
                                                        <button type="submit" class="bg-emerald-50 hover:bg-emerald-600 text-emerald-600 hover:text-white border border-emerald-200 text-[10px] font-black py-1.5 px-3 rounded-lg hover:-translate-y-0.5 transition-all">
                                                            Selesai
                                                        </button>
                                                    </form>
                                                @endif

                                                <form action="{{ route('admin.pengaduan.hapus', $item->id) }}" method="POST" class="form-hapus m-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-50 hover:bg-red-600 text-red-500 hover:text-white border border-red-100 hover:border-red-500 text-[10px] font-black py-1.5 px-3 rounded-lg hover:-translate-y-0.5 transition-all">
                                                        Hapus
                                                    </button>
                                                </form>
                                                
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-16 text-center bg-gray-50/30">
                                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-500">
                                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                            </div>
                                            <h3 class="text-sm font-black text-gray-500 uppercase tracking-widest">Kosong</h3>
                                            <p class="text-xs font-medium text-gray-500 mt-1">Belum ada laporan pengaduan yang masuk dari warga.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                    </table>
                </div>
            </div>
        </div> 

    </div>
</div>

<div id="detailModal" class="fixed inset-0 z-50 flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
    <div class="absolute inset-0 bg-emerald-950/40 backdrop-blur-sm modal-close-bg cursor-pointer"></div>

    <div id="modalBox" class="relative bg-white rounded-3xl w-full max-w-lg mx-4 overflow-hidden shadow-2xl transform scale-95 opacity-0 transition-all duration-300 flex flex-col max-h-[90vh]">
        
        <div class="bg-gray-50/80 px-6 py-4 border-b border-gray-100 flex justify-between items-center backdrop-blur-md">
            <h3 class="text-lg font-black text-emerald-950 flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Detail Laporan Warga
            </h3>
            <button type="button" class="text-gray-500 hover:text-red-500 hover:bg-red-50 p-2 rounded-xl transition-colors modal-close-btn">
                <svg class="w-5 h-5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <div class="px-6 py-5 overflow-y-auto">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <p class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">Identitas Pelapor</p>
                    <p class="font-black text-emerald-950 text-base" id="modalNama">-</p>
                    <p class="text-xs font-bold text-gray-500 mt-0.5" id="modalTanggal">-</p>
                </div>
                <div class="text-right">
                    <span id="modalKategori" class="px-2.5 py-1 text-[10px] font-black rounded-lg uppercase tracking-wider inline-block bg-gray-50 text-gray-600 border border-gray-200">
                        -
                    </span>
                </div>
            </div>

            <div>
                <p class="text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Isi Aspirasi Lengkap</p>
                <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100">
                    <p class="text-sm text-gray-700 leading-relaxed whitespace-pre-line" id="modalIsi">-</p>
                </div>
            </div>
        </div>

        <div class="bg-gray-50/50 px-6 py-4 border-t border-gray-100 flex justify-end">
            <button type="button" class="modal-close-btn bg-white border border-gray-200 text-gray-600 font-bold py-2.5 px-6 rounded-xl hover:bg-gray-50 hover:text-emerald-700 transition-colors text-sm shadow-sm smooth-spring">
                Tutup Jendela
            </button>
        </div>
    </div>
</div>

<div id="pdfModal" class="fixed inset-0 z-[9999] flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
    <div class="absolute inset-0 bg-emerald-950/80 backdrop-blur-sm modal-tutup-pdf cursor-pointer"></div>

    <div id="pdfModalBox" class="relative bg-white rounded-[2rem] w-full max-w-5xl mx-4 overflow-hidden shadow-2xl transform scale-95 opacity-0 transition-all duration-300 flex flex-col h-[90vh]">
        
        <div class="bg-gray-50/90 px-6 py-4 border-b border-gray-200 flex justify-between items-center backdrop-blur-md">
            <h3 class="text-lg font-black text-emerald-950 flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Preview Laporan PDF
            </h3>
            <button type="button" class="text-gray-500 hover:text-red-500 hover:bg-red-50 p-2 rounded-xl transition-colors modal-tutup-pdf smooth-spring">
                <svg class="w-6 h-6 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <div class="flex-grow bg-gray-200 p-2 sm:p-4">
            <iframe id="pdfIframe" src="" class="w-full h-full rounded-xl border border-gray-300 bg-white shadow-inner"></iframe>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        // ----------------------------------------------------
        // 1. LOGIKA MODAL POP-OUT (BACA PENUH)
        // ----------------------------------------------------
        const modal = document.getElementById('detailModal');
        const modalBox = document.getElementById('modalBox');

        document.body.addEventListener('click', function(e) {
            
            // A. KETIKA KOLOM 'ISI ASPIRASI' DI KLIK
            let detailBtn = e.target.closest('.btn-detail');
            if (detailBtn) {
                let nama = detailBtn.getAttribute('data-nama');
                let tanggal = detailBtn.getAttribute('data-tanggal');
                let kategori = detailBtn.getAttribute('data-kategori');
                let isi = detailBtn.getAttribute('data-isi');
                
                document.getElementById('modalNama').textContent = nama;
                document.getElementById('modalTanggal').textContent = tanggal;
                document.getElementById('modalIsi').textContent = isi;
                
                let elKategori = document.getElementById('modalKategori');
                elKategori.textContent = kategori;
                elKategori.className = 'px-2.5 py-1 text-[10px] font-black rounded-lg uppercase tracking-wider inline-block border';
                if(kategori === 'Infrastruktur') elKategori.classList.add('bg-blue-50', 'text-blue-600', 'border-blue-100');
                else if(kategori === 'Bansos') elKategori.classList.add('bg-orange-50', 'text-orange-600', 'border-orange-100');
                else if(kategori === 'Pelayanan') elKategori.classList.add('bg-purple-50', 'text-purple-600', 'border-purple-100');
                else elKategori.classList.add('bg-gray-50', 'text-gray-600', 'border-gray-200');

                modal.classList.remove('hidden');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    modalBox.classList.remove('scale-95', 'opacity-0');
                    modalBox.classList.add('scale-100', 'opacity-100');
                }, 10);
            }

            // B. KETIKA TOMBOL "X", TOMBOL TUTUP, ATAU AREA LUAR DIKLIK (TUTUP MODAL)
            if (e.target.closest('.modal-close-btn') || e.target.classList.contains('modal-close-bg')) {
                modalBox.classList.remove('scale-100', 'opacity-100');
                modalBox.classList.add('scale-95', 'opacity-0');
                modal.classList.add('opacity-0');
                
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }
        });


        // ----------------------------------------------------
        // 2. AJAX UNTUK UBAH STATUS (PROSES & SELESAI)
        // ----------------------------------------------------
        document.body.addEventListener('submit', function(e) {
            let form = e.target.closest('.form-status');
            if (!form) return;

            e.preventDefault();

            let row = form.closest('tr');
            let btn = form.querySelector('button[type="submit"]');
            let originalText = btn.innerHTML;

            row.style.transition = 'all 0.3s ease';
            row.style.opacity = '0.5';
            btn.innerHTML = 'Memproses...';
            btn.style.pointerEvents = 'none';

            let formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(response => {
                if (!response.ok) throw new Error('Server gagal memproses');
                return response.text();
            })
            .then(html => {
                let parser = new DOMParser();
                let doc = parser.parseFromString(html, 'text/html');
                let newRow = doc.getElementById(row.id);

                if (newRow) {
                    row.innerHTML = newRow.innerHTML;
                    row.style.opacity = '1';
                } else {
                    window.location.reload();
                }
            })
            .catch(error => {
                console.error(error);
                row.style.opacity = '1';
                btn.innerHTML = originalText;
                btn.style.pointerEvents = 'auto';
            });
        });


        // ----------------------------------------------------
        // 3. AJAX UNTUK HAPUS DATA DENGAN ANIMASI MORPH HALUS
        // ----------------------------------------------------
        document.body.addEventListener('submit', function(e) {
            let form = e.target.closest('.form-hapus');
            if (!form) return;

            e.preventDefault(); 
            
            if (!confirm('Yakin hapus permanen laporan ini?')) return;

            let row = form.closest('tr');
            let btn = form.querySelector('button');
            let originalText = btn.innerHTML;
            
            btn.innerHTML = 'Hapus...';
            btn.style.pointerEvents = 'none';
            
            let formData = new FormData(form);

            fetch(form.action, {
                method: 'POST', 
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(response => {
                if(response.ok) {
                    row.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                    row.style.opacity = '0';
                    row.style.transform = 'translateX(-20px) scale(0.98)';
                    
                    setTimeout(() => {
                        let cells = row.querySelectorAll('td');
                        cells.forEach(td => {
                            td.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                            td.style.paddingTop = '0';
                            td.style.paddingBottom = '0';
                            td.style.borderWidth = '0';
                        });

                        let contents = row.querySelectorAll('div, span, p, a, button, form');
                        contents.forEach(el => {
                            el.style.transition = 'all 0.3s ease';
                            el.style.maxHeight = '0';
                            el.style.margin = '0';
                            el.style.padding = '0';
                            el.style.overflow = 'hidden';
                            el.style.opacity = '0';
                        });

                        setTimeout(() => {
                            row.remove(); 
                            
                            let tableRows = document.querySelectorAll('tbody tr');
                            let validCount = 0;
                            tableRows.forEach((tr) => {
                                let cellNomor = tr.querySelector('td:first-child');
                                if(cellNomor && !cellNomor.hasAttribute('colspan')) {
                                    validCount++;
                                    cellNomor.textContent = validCount;
                                }
                            });

                            let totalSpan = document.querySelector('h2.text-2xl + p span.text-emerald-600');
                            if (totalSpan) {
                                let currentTotal = parseInt(totalSpan.textContent);
                                if(!isNaN(currentTotal) && currentTotal > 0) {
                                    totalSpan.textContent = currentTotal - 1;
                                }
                            }

                        }, 300); 

                    }, 300); 

                } else {
                    throw new Error('Gagal di sisi server');
                }
            })
            .catch(error => {
                console.error(error);
                row.style.opacity = '1';
                row.style.transform = 'scale(1) translateX(0)';
                btn.innerHTML = originalText;
                btn.style.pointerEvents = 'auto';
                alert('Gagal menghapus data. Periksa server/koneksi Anda.');
            });
        });

    });
</script>

<script>
    function bukaPreviewPdf(url) {
        const modal = document.getElementById('pdfModal');
        const modalBox = document.getElementById('pdfModalBox');
        const iframe = document.getElementById('pdfIframe');

        iframe.src = url;

        document.body.style.overflow = 'hidden';
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modalBox.classList.remove('scale-95', 'opacity-0');
            modalBox.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    document.body.addEventListener('click', function(e) {
        if (e.target.closest('.modal-tutup-pdf') || e.target.classList.contains('modal-tutup-pdf')) {
            const modal = document.getElementById('pdfModal');
            const modalBox = document.getElementById('pdfModalBox');
            const iframe = document.getElementById('pdfIframe');

            if (modal && modalBox) {
                document.body.style.overflow = 'auto';
                modalBox.classList.remove('scale-100', 'opacity-100');
                modalBox.classList.add('scale-95', 'opacity-0');
                modal.classList.add('opacity-0');
                
                setTimeout(() => { 
                    modal.classList.add('hidden'); 
                    iframe.src = ''; 
                }, 300); 
            }
        }
    });
</script>

@endsection