@extends('layouts.main')

@section('content')
<div class="container">

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <h3 class="mb-3">Pilih Dosen Pembimbing</h3>

    {{-- Tampilkan dosen yang sudah dipilih --}}
    @if(isset($pilihan) && $pilihan)
        <div class="alert alert-info">
            <b>Kamu sudah memilih dosen pembimbing:</b><br>
            <span class="text-primary" style="font-size: 18px;">
                {{ $pilihan->dosen1->name }}
            </span>
            <br>
            <small>Status: <b>{{ ucfirst($pilihan->status) }}</b></small>
        </div>
    @endif


    {{-- Form Pencarian --}}
    <form action="{{ route('mahasiswa.pilihandosen.cari') }}" method="GET" class="mb-3">
        <input
            type="text"
            name="q"
            class="form-control"
            placeholder="Cari dosen..."
            value="{{ $query ?? '' }}"
        >
    </form>

    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Nama Dosen</th>
                <th>Fakultas</th>
                <th>Kapasitas</th>
                <th>Pilih</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($dosen as $d)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $d->name }}</td>
                <td>{{ $d->fakultas ?? '-' }}</td>
                <td>{{ $d->kapasitas ?? '-' }}</td>

                <td class="text-center">
                    {{-- Jika sudah memilih dosen, tombol disable --}}
                    @if(isset($pilihan) && $pilihan)
                        @if($pilihan->dosen1_id == $d->id)
                            <span class="badge bg-success">Dipilih</span>
                        @else
                            <button class="btn btn-secondary btn-sm" disabled>
                                Pilih
                            </button>
                        @endif
                    @else
                        {{-- Belum memilih --}}
                        <form action="{{ route('mahasiswa.pilihandosen.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="dosen_id" value="{{ $d->id }}">
                            <button type="submit" class="btn btn-primary btn-sm">
                                Pilih
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center text-muted">
                    Tidak ada dosen ditemukan
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
