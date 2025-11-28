@extends('layouts.main')

@section('title', 'Edit Pesan')

@section('content')

<div class="container mt-4">

    <h3>🛠 Edit Pesan</h3>

    <div class="card p-4 mt-3">
        <form action="{{ route('mahasiswa.pesan.update', $pesan->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Isi Pesan</label>
                <textarea name="isi" class="form-control" rows="5" required>{{ $pesan->isi }}</textarea>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('mahasiswa.pesan.index') }}" class="btn btn-secondary">Kembali</a>

        </form>
    </div>

</div>

@endsection
