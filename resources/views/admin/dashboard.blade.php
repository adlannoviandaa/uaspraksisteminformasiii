@extends('layouts.admin')

@section('content')
<h2 class="fw-bold">Dashboard Admin</h2>
<p class="text-muted mb-4">Selamat datang, Admin!</p>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="stat-card">
            <small class="text-muted">Total Mahasiswa</small>
            <h3 class="fw-bold">{{ $totalMahasiswa }}</h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card">
            <small class="text-muted">Tugas Akhir</small>
            <h3 class="fw-bold">{{ $totalTA }}</h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card">
            <small class="text-muted">Pesan</small>
            <h3 class="fw-bold">{{ $totalPesan }}</h3>
        </div>
    </div>
</div>

<h5 class="fw-bold mb-3">Daftar Pengajuan Tugas Akhir</h5>

<table class="table table-bordered">
    <thead class="table-success">
        <tr>
            <th>#</th>
            <th>Nama Mahasiswa</th>
            <th>Judul</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pengajuan as $p)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->mahasiswa->name ?? '-' }}</td>
            <td>{{ $p->judul }}</td>
            <td>
                @if($p->status == 'pending')
                    <span class="badge bg-warning">Sedang Diproses</span>
                @elseif($p->status == 'ditolak')
                    <span class="badge bg-danger">Ditolak</span>
                @else
                    <span class="badge bg-success">Diterima</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
