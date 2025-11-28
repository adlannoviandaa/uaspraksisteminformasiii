@extends('layouts.main')

@section('content')

<style>
    .page-title { font-size: 26px; font-weight: 700; }
    .card-custom {
        border-radius: 12px;
        border: none;
        background: #fff;
        padding: 25px;
        box-shadow:
            0px 2px 3px rgba(0,0,0,0.02),
            0px 4px 8px rgba(0,0,0,0.04);
    }
</style>

<h2 class="page-title mb-3">Ubah Pilihan Dosen Pembimbing</h2>

<div class="card-custom">

    <form action="{{ route('mahasiswa.pilihandosen.update', $pilihan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-bold">Ganti Dosen</label>
            <select name="dosen1_id" class="form-select" required>
                @foreach ($dosens as $dosen)
                    <option value="{{ $dosen->id }}"
                        {{ $pilihan->dosen1_id == $dosen->id ? 'selected' : '' }}>

                        {{ $dosen->nama }}
                        — {{ $dosen->fakultas }}
                        ({{ $dosen->jumlah_bimbingan }}/{{ $dosen->maks_bimbingan }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Alasan memilih dosen</label>
            <textarea name="alasan" class="form-control" rows="3" required>{{ $pilihan->alasan }}</textarea>
        </div>

        <button class="btn btn-primary mt-3">Perbarui</button>

    </form>

</div>

@endsection
