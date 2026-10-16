<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pengaduan Masyarakat</title>
    <style>
        /* CSS Khusus untuk Dokumen Cetak */
        body {
            font-family: 'Times New Roman', Times, serif;
            color: #000;
            line-height: 1.5;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }
        /* Kop Surat */
        .kop-surat {
            text-align: center;
            border-bottom: 3px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .kop-surat h1, .kop-surat h2, .kop-surat p {
            margin: 0;
        }
        .kop-surat h1 {
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .kop-surat h2 {
            font-size: 22px;
            text-transform: uppercase;
            font-weight: bold;
        }
        .kop-surat p {
            font-size: 12px;
            font-style: italic;
        }
        .garis-tipis {
            border-top: 1px solid #000;
            margin-top: 2px;
        }
        /* Judul Laporan */
        .judul-laporan {
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
            text-decoration: underline;
            margin-bottom: 15px;
        }
        /* Tabel Data */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #f2f2f2;
            text-align: center;
            font-weight: bold;
        }
        .text-center { text-align: center; }
        /* Kolom Tanda Tangan */
        .ttd-container {
            width: 100%;
            margin-top: 50px;
        }
        .ttd-box {
            float: right;
            width: 250px;
            text-align: center;
        }
        .ttd-box p { margin: 0 0 70px 0; }
        .ttd-nama {
            font-weight: bold;
            text-decoration: underline;
            margin: 0;
        }
    </style>
</head>
<body>

    <!-- KOP SURAT RESMI -->
    <div class="kop-surat">
        <h1>Pemerintah Kabupaten Makmur</h1>
        <h1>Kecamatan Makmur</h1>
        <h2>Desa Rantau Jaya</h2>
        <p>Jl. Lintas Desa No. 01, Rantau Jaya, Kode Pos: 30123. Email: pemdes@rantaujaya.id</p>
        <div class="garis-tipis"></div>
    </div>

    <div class="judul-laporan">
        Rekapitulasi Laporan Aspirasi & Pengaduan Warga
    </div>

    <!-- TABEL DATA -->
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Tanggal</th>
                <th width="20%">Nama Pelapor</th>
                <th width="15%">Kategori</th>
                <th width="35%">Isi Laporan</th>
                <th width="10%">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($semua_pengaduan as $index => $item)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                <td>{{ $item->nama }}</td>
                <td class="text-center">{{ $item->kategori }}</td>
                <td>{{ $item->isi_laporan }}</td>
                <td class="text-center">{{ $item->status }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada laporan pengaduan yang masuk.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- KOLOM TANDA TANGAN -->
    <div class="ttd-container">
        <div class="ttd-box">
            <p>Rantau Jaya, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}<br>Kepala Desa Rantau Jaya</p>
            <p class="ttd-nama">Ahmad Junaidi, S.E.</p>
            NIP. 19800512 201001 1 003
        </div>
        <div style="clear: both;"></div>
    </div>

</body>
</html>