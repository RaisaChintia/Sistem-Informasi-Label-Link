<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Label Pasien</title>
    <style>
        @page { size: 50mm 30mm; margin: 0; }
        body { margin:0; padding:0; font-family: Arial; font-size: 9pt; }
        .label {
            width: 50mm;
            height: 30mm;
            border:1px solid #000;
            padding:2px;
            box-sizing:border-box;
            display:flex;
            flex-direction:column;
            justify-content:space-around;
            padding-left: 1rem;
        }
        .nama {
            font-weight:bold; 
            font-size:10pt; 
        }
        .info { margin-top:0; font-size:9pt; }
        .image {
            display: flex;
            flex-direction: row;
            align-items: center;
            width: 100%;
            gap: 0.3rem;
        }
        .img-name {
            font-size: xx-small;
        }
        .image img { width: 5mm; height:auto; margin-top:1px; }
    </style>
</head>
<body onload="window.print()">
<!-- <body> -->
    <div class="label">
        <div class="image">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Kantor">
            <div class="img-name">LABKESDA Kapuas</div>
        </div>
        <div class="nama">{{ $pasien->nama }}</div>
        <div class="info">TTL: {{ $pasien->ttl }}</div>
        <div class="info">JK: {{ $pasien->jenis_kelamin }}</div>
    </div>
</body>
</html>
