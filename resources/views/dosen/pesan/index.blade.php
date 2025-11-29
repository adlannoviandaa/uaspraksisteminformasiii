@extends('layouts.main')

@section('content')
<div class="p-5" style="background-color:#f0f0f0; min-height:100vh;">

    {{-- HEADER HALAMAN PESAN --}}
    {{-- Tambahkan margin-top besar (mt-5) untuk memberikan ruang dari sidebar/header jika ada --}}
    <h1 class="display-5 fw-bold text-dark mb-1 d-flex align-items-center mt-5">
        Pesan Masuk
    </h1>

    <p class="text-secondary mb-4">Kelola semua komunikasi Anda dengan Mahasiswa Bimbingan atau Admin.</p>

    {{-- TOMBOL AKSI ATAS --}}
    <div class="mb-4">
        {{-- Tombol ini bisa digunakan untuk membuat pesan baru ke admin/mahasiswa tertentu --}}
        <button class="btn btn-success btn-sm rounded-pill px-3 py-1 fw-bold shadow-sm">
            <i class="bi bi-chat-dots me-1"></i> Kirim Pesan Baru
        </button>
    </div>

    {{-- DAFTAR PESAN/KOTAK INBOX --}}
    <div class="row g-4">

        {{-- Dummy Data untuk Daftar Pesan (Chat Threads) --}}
        @php
            $dataPesan = [
                ['pengirim' => 'Naja Nayla (21011234)', 'subjek' => 'Revisi Bab 3. Judul Tugas Akhir: Pengembangan Aplikasi...', 'waktu' => '21 Okt', 'baru' => 2, 'unread' => true],
                ['pengirim' => 'Admin SITAMA', 'subjek' => 'Pemberitahuan: Batas akhir nilai Tugas Akhir', 'waktu' => '19 Okt', 'baru' => 0, 'unread' => false],
                ['pengirim' => 'Di Adlan Novianda (21011253)', 'subjek' => 'Pertanyaan: Metode yang digunakan di bab 2', 'waktu' => '17 Okt', 'baru' => 1, 'unread' => true],
                ['pengirim' => 'Risa Putri (21011887)', 'subjek' => 'Laporan Kemajuan Minggu ke-4', 'waktu' => '10 Okt', 'baru' => 0, 'unread' => false],
            ];
        @endphp
        
        @foreach ($dataPesan as $pesan)
            <div class="col-md-12">
                {{-- Kotak pesan (card) yang dapat diklik --}}
                <div class="card shadow-sm border-0 rounded-lg p-3 {{ $pesan['unread'] ? 'bg-white' : 'bg-light' }}" 
                     style="cursor: pointer;">
                    <div class="card-body p-0 d-flex justify-content-between align-items-start">
                        
                        {{-- Kiri: Nama dan Isi Pesan --}}
                        <div class="flex-grow-1 me-3">
                            {{-- Nama Pengirim/Thread --}}
                            <h6 class="fw-bold mb-1 {{ $pesan['unread'] ? 'text-dark' : 'text-secondary' }}">
                                {{ $pesan['pengirim'] }}
                            </h6>
                            {{-- Preview Isi Pesan (Subjek/Pesan Terakhir) --}}
                            <p class="mb-0 text-truncate {{ $pesan['unread'] ? 'text-dark' : 'text-muted' }}" style="max-width: 90%;">
                                {{ $pesan['subjek'] }}
                            </p>
                        </div>

                        {{-- Kanan: Waktu dan Jumlah Pesan Baru --}}
                        <div class="d-flex flex-column align-items-end flex-shrink-0">
                            {{-- Waktu --}}
                            <small class="text-muted mb-1">{{ $pesan['waktu'] }}</small>
                            
                            {{-- Badge Pesan Baru --}}
                            @if ($pesan['baru'] > 0)
                                <span class="badge bg-primary text-white rounded-pill px-2 py-1">
                                    {{ $pesan['baru'] }} baru
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    {{-- End Daftar Pesan --}}

</div>
@endsection