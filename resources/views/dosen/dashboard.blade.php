@extends('layouts.main')

@section('content')
<div class="p-5" style="background-color:#f0f0f0; min-height:100vh;">
    
    <h1 class="display-5 fw-bold text-dark mb-1 d-flex align-items-center">
        Selamat Datang, Dosen <span class="ms-2">👋</span>
    </h1>

    <p class="text-secondary mb-4">Berikut ringkasan aktivitas Anda</p>

    {{-- CARDS --}}
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card shadow p-3 border-0">
                <div class="card-body">
                    <p class="h5 card-title text-secondary">Tugas Akhir</p>
                    <div class="display-3 fw-bold text-dark">4</div>
                    <p class="card-text text-muted">Jumlah Tugas Akhir</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow p-3 border-0">
                <div class="card-body">
                    <p class="h5 card-title text-secondary">Pesan</p>
                    <div class="display-3 fw-bold text-dark">1</div>
                    <p class="card-text text-muted">Jumlah Pesan</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow p-3 border-0">
                <div class="card-body">
                    <p class="h5 card-title text-secondary opacity-0">Mahasiswa</p>
                    <div class="display-3 fw-bold text-dark">4</div>
                    <p class="card-text text-muted">Mahasiswa bimbingan</p>
                </div>
            </div>
        </div>
    </div>

    {{-- TABLE --}}
    <div class="card shadow border-0">
        <div class="card-body">
            <table class="table table-striped table-hover align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Tugas Akhir</th>
                        <th>Nama Dosen</th>
                        <th>Persentase</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $dataDummy = [
                            ['judul' => 'Pengembangan Aplikasi Manajemen Data', 'dosen' => 'Siti Nuraini, S.Kom., M.Sc.', 'status' => 'Sedang Diproses'],
                            ['judul' => 'Analisi Pengaruh Media Sosial Terhadap Produktivitas', 'dosen' => 'Ir. Rina Marlina, M.T.', 'status' => 'Disetujui'],
                            ['judul' => 'Rancang Bangun Aplikasi Reservasi Hotel...', 'dosen' => 'Dewi Kartika, S.E., M.M.', 'status' => 'Disetujui'],
                            ['judul' => 'Implementasi Algoritma K-Means untuk Pengelompokan Data...', 'dosen' => 'Dr. Rahmat Hidayat, S.T., M.T', 'status' => 'Sedang Diproses'],
                        ];
                    @endphp

                    @foreach($dataDummy as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item['judul'] }}</td>
                            <td>{{ $item['dosen'] }}</td>
                            <td>
                                <span class="badge 
                                    {{ $item['status'] == 'Disetujui' ? 'bg-success' : 'bg-primary' }} text-white">
                                    {{ $item['status'] }}
                                </span>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
