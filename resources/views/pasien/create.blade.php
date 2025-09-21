@extends('layouts.app')

@section('content')
<h3 class="mb-4">➕ Tambah Pasien</h3>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('pasien.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="no_registrasi" class="form-label">No. Registrasi</label>
        <input type="text" name="no_registrasi" id="no_registrasi" class="form-control" 
            value="{{ old('no_registrasi', isset($pasien) ? $pasien->no_registrasi : '') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" 
            value="{{ old('nama', isset($pasien) ? $pasien->nama : '') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Tempat Lahir</label>
        <input type="text" name="tempat_lahir" class="form-control" 
            value="{{ old('tempat_lahir', isset($pasien) ? $pasien->tempat_lahir : '') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control" 
            value="{{ old('tanggal_lahir', isset($pasien) ? $pasien->tanggal_lahir : '') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control" required>
            <option value="Laki-laki" {{ old('jenis_kelamin', isset($pasien) ? $pasien->jenis_kelamin : '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ old('jenis_kelamin', isset($pasien) ? $pasien->jenis_kelamin : '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>

    <button class="btn btn-primary">💾 Simpan</button>
    <a href="{{ route('pasien.index') }}" class="btn btn-secondary">⬅ Kembali</a>
</form>
@endsection
