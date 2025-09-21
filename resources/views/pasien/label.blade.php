<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Label Pasien</title>
    <style>
        @page { size: 44.5mm 28mm; margin: 0.25rem; }
        body { margin: 0rem; padding:0; font-family: Arial; font-size: 9pt; }
        .label {
            width: 10rem;
            height: 6.1rem;
            //border:1px solid #000;
            padding:1px;
            box-sizing:border-box;
            display:flex;
            flex-direction:column;
            gap: 0.1rem;
            padding-left: 0.5rem;
        }
        .nama {
            font-weight:bold; 
            font-size:9pt; 
        }
        .info { margin-top:0; font-size:9pt; line-height:1.2; }
        .image {
            display: flex;
            flex-direction: row;
            align-items: center;
            width: 100%;
            gap: 0.4rem;
            margin-bottom: 0.2rem;  
        }
        .img-name {
            font-size: 8pt;
            //font-weight: bold;
        }
        .image img { width: 7mm; height:auto; margin-top:1px; }
    </style>
</head>
<body onload="window.print()">
    <div class="label">
        <div class="image">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Kantor">
            <div class="img-name">LABKESDA Kapuas</div>
        </div>
        <div class="info">No. Reg: {{ $pasien->no_registrasi }}</div>
        <div class="nama">{{ $pasien->nama }}</div>
        <div class="info">
            <!-- TTL: {{ $pasien->tempat_lahir }},
            {{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d-m-Y') }} -->
            Tgl Lahir: {{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d-m-Y') }}
        </div>
        <div class="info">JK: {{ $pasien->jenis_kelamin }}</div>
    </div>
</body>
</html>
