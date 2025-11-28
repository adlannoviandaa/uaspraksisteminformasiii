@extends('layouts.main')

@section('content')

<style>
    .page-title { font-size: 26px; font-weight: 700; }
    .card-custom {
        border-radius: 12px;
        border: none;
        background: #fff;
        box-shadow:
            0px 2px 3px rgba(0,0,0,0.02),
            0px 4px 8px rgba(0,0,0,0.04);
    }
</style>

<h2 class="page-title mb-3">Pilih Dosen Pembimbing</h2>

<div class="card card-custom p-4">

    <form action="{{ route('mahasiswa.pilihandosen.store') }}" method="POST">
        @csrf

        {{-- DOSEN 1 --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Pilihan Dosen 1 (Wajib)</label>
            <select name="dosen1_id" class="form-select" required>
                <option value="">-- Pilih Dosen Pertama --</option>

                @foreach ($dosens as $d)
                    <option value="{{ $d->id }}">
                        {{ $d->nama }} ({{ $d->nidn }})
                    </option>
                @endforeach
            </select>
        </div>

        {{-- DOSEN 2 --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Pilihan Dosen 2 (Opsional)</label>
            <select name="dosen2_id" class="form-select">
                <option value="">-- Pilih Dosen Kedua --</option>

                @foreach ($dosens as $d)
                    <option value="{{ $d->id }}">
                        {{ $d->nama }} ({{ $d->nidn }})
                    </option>
                @endforeach
            </select>
        </div>

        {{-- DOSEN 3 --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Pilihan Dosen 3 (Opsional)</label>
            <select name="dosen3_id" class="form-select">
                <option value="">-- Pilih Dosen Ketiga --</option>

                @foreach ($dosens as $d)
                    <option value="{{ $d->id }}">
                        {{ $d->nama }} ({{ $d->nidn }})
                    </option>
                @endforeach
            </select>
        </div>

        {{-- ALASAN --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Alasan Memilih Dosen</label>
            <textarea name="alasan" class="form-control" rows="3" required></textarea>
        </div>

        <button class="btn btn-success mt-3">Simpan Pilihan</button>

    </form>

</div>

@endsection
