@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Data Pasien</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- ✅ No. Registrasi -->
                <div class="mb-3">
                    <label>No. Registrasi</label>
                    <input type="text" name="no_registrasi" value="{{ old('no_registrasi', $pasien->no_registrasi) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Nama Pasien</label>
                    <input type="text" name="nama" value="{{ old('nama', $pasien->nama) }}" class="form-control" required>
                </div>

                <!-- ✅ Tempat Lahir -->
                <div class="mb-3">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $pasien->tempat_lahir) }}" class="form-control" required>
                </div>

                <!-- ✅ Tanggal Lahir -->
                <div class="mb-3">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pasien->tanggal_lahir) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" required>
                        <option value="Laki-laki" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
