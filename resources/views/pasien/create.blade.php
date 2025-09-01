@extends('layouts.app')

@section('content')
<h3 class="mb-4">➕ Tambah Pasien</h3>

<form action="{{ route('pasien.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Tempat/Tanggal Lahir</label>
        <input type="text" name="ttl" class="form-control" placeholder="Palangka Raya, 01-01-2000" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>
    <button class="btn btn-primary">💾 Simpan</button>
    <a href="{{ route('pasien.index') }}" class="btn btn-secondary">⬅ Kembali</a>
</form>
@endsection
