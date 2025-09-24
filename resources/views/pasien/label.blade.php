<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Label Pasien</title>
    <style>
        @page { size: 44.5mm 28mm; margin: 0.25rem; }
        body { margin: 0; padding:0; font-family: Arial, sans-serif; font-size: 9pt; }
        .label {
            width: 10rem;
            height: 6.1rem;
            /* border:1px solid #000; */ /* aktifkan untuk debug ukuran */
            padding:2px 4px;
            box-sizing:border-box;
            display:flex;
            flex-direction:column;
            gap: 0.15rem;
        }
        .nama {
            font-weight:bold; 
            font-size:9pt; 
            line-height:1.1;
            max-height: 2.2em;       /* maksimal 2 baris */
            overflow: hidden;        /* sembunyikan teks lebih */
            text-overflow: ellipsis; /* kasih ... kalau panjang */
            white-space: normal;     /* biar bisa pindah baris */

        }
        .info { margin:0; font-size:8pt; line-height:1.2; }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.2rem;
        }
        .image {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 0.3rem;
        }
        .img-name {
            font-size: 8pt;
        }
        .image img { width: 7mm; height:auto; }
    </style>
</head>
<body onload="window.print()">
    <div class="label">
        <!-- Header: Logo + Nama Lab + Tanggal Cetak -->
        <div class="header">
            <div class="image">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Kantor">
                <div class="img-name">LABKESDA Kapuas</div>
            </div>
            <div class="info">
                {{ \Carbon\Carbon::now()->format('d/m/y') }}
            </div>
        </div>

        <!-- Data Pasien -->
        <div class="info">No. Reg: {{ $pasien->no_registrasi }}</div>
        <div class="nama">
            {{ $pasien->nama }}
            ({{ $pasien->jenis_kelamin == 'Perempuan' ? 'P' : 'L' }})
        </div>
        <div class="info">
            {{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d-m-Y') }}
            ({{ $usia }})
        </div>
    </div>
</body>
</html>
