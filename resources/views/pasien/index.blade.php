@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>📋 Daftar Pasien</h3>
    <a href="{{ route('pasien.create') }}" class="btn btn-success">+ Tambah Pasien</a>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="card shadow-sm">
    <div class="card-body p-0">
        <!-- Form Search -->
        <div class="mb-3 p-3">
            <form method="GET" action="{{ route('pasien.index') }}">
                <input type="text" name="search" class="form-control" placeholder="Cari pasien..." value="{{ request('search') }}">
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>TTL</th>
                        <th>Jenis Kelamin</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pasien as $index => $p)
                    <tr>
                        <td>{{ ($pasien->currentPage() - 1) * $pasien->perPage() + $index + 1 }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->ttl }}</td>
                        <td>
                            @php $jk = strtolower($p->jenis_kelamin); @endphp
                            @if($jk == 'laki-laki' || $jk == 'l')
                                <span class="badge bg-primary">Laki-laki</span>
                            @elseif($jk == 'perempuan' || $jk == 'p')
                                <span class="badge bg-warning text-dark">Perempuan</span>
                            @else
                                <span class="badge bg-secondary">-</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('pasien.edit', $p->id) }}" class="btn btn-sm btn-outline-warning me-1">✏ Edit</a>
                            <a href="{{ route('pasien.label', $p->id) }}" target="_blank" class="btn btn-sm btn-outline-primary me-1">🖨 Cetak</a>
                            <form action="{{ route('pasien.destroy', $p->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Yakin ingin hapus data pasien ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">🗑 Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data pasien</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-3 px-3">
            {{ $pasien->links() }}
        </div>
    </div>
</div>
@endsection
