@extends('layouts.main')

@section('content')
<div class="p-5" style="background-color:#f0f0f0; min-height:100vh;">

    {{-- HEADER HALAMAN UTAMA --}}
    {{-- Mengubah judul menjadi "Tugas Akhir" saja --}}
    <h1 class="display-5 fw-bold text-dark mb-1 d-flex align-items-center">
        Tugas Akhir
    </h1>

    {{-- Sub-judul untuk Daftar Tugas Akhir Mahasiswa --}}
    <p class="text-secondary mb-5">Daftar Tugas Akhir Mahasiswa</p>

    {{-- TABLE TUGAS AKHIR MAHASISWA --}}
    {{-- Card dengan shadow halus dan border-radius yang sesuai --}}
    <div class="card shadow border-0 rounded-2xl" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <div class="card-body p-4">

            {{-- Dummy Data untuk Tabel (Mahasiswa Bimbingan) --}}
            @php
                $dataTugasAkhirMahasiswa = [
                    ['no' => 1, 'nama' => 'Naja Nayla', 'nim' => '21011234', 'judul' => 'Pengembangan Aplikasi Manajemen Data', 'status' => 'Disetujui'],
                    ['no' => 2, 'nama' => 'Di Adlan Novianda', 'nim' => '21011253', 'judul' => 'Analisis Pengaruh Media Sosial terhadap Produktivitas', 'status' => 'Sedang di proses'],
                ];
            @endphp

            <div class="table-responsive">
                <table class="table table-borderless align-middle mb-0"> {{-- Menghilangkan border default tabel --}}
                    <thead>
                        <tr class="text-secondary text-uppercase fs-6"> {{-- Font size dan uppercase untuk header --}}
                            <th scope="col" style="width: 5%;">NO</th>
                            <th scope="col" style="width: 20%;">Nama</th>
                            <th scope="col" style="width: 15%;">NIM</th>
                            <th scope="col" style="width: 40%;">Judul</th>
                            <th scope="col" style="width: 10%;">Status</th>
                            <th scope="col" style="width: 10%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataTugasAkhirMahasiswa as $item)
                            <tr>
                                <td class="text-secondary">{{ $item['no'] }}</td>
                                <td class="fw-medium text-dark">{{ $item['nama'] }}</td>
                                <td class="text-muted">{{ $item['nim'] }}</td>
                                <td class="text-dark">{{ $item['judul'] }}</td>
                                <td>
                                    @php
                                        $badgeClass = '';
                                        if ($item['status'] == 'Disetujui') {
                                            $badgeClass = 'bg-primary'; // Warna biru Figma
                                        } elseif ($item['status'] == 'Sedang di proses') {
                                            $badgeClass = 'bg-secondary'; // Warna abu-abu Figma
                                        }
                                    @endphp
                                    {{-- Badge dengan radius penuh dan warna sesuai Figma --}}
                                    <span class="badge {{ $badgeClass }} text-white py-2 px-3 rounded-pill text-uppercase" style="font-size: 0.75rem; min-width: 90px;">
                                        {{ $item['status'] }}
                                    </span>
                                </td>
                                <td>
                                    {{-- Tombol Lihat Detail dengan gaya Figma (abu-abu muda, border, radius penuh) --}}
                                    <button class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-2 text-dark fw-medium" 
                                            style="background-color: #e0e0e0; border-color: #e0e0e0; color: #333; font-size: 0.85rem;">
                                        Lihat detail
                                    </button>
                                </td>
                            </tr>
                            {{-- Tambahkan border bawah manual untuk setiap baris, kecuali yang terakhir --}}
                            @if(!$loop->last)
                                <tr>
                                    <td colspan="6" class="p-0">
                                        <hr class="my-0 border-top border-secondary opacity-25">
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
@endsection