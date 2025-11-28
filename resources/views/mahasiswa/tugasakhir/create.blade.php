@extends('layouts.main')

@section('content')

<h2 class="fw-bold mb-4">Tambah Tugas Akhir</h2>

<div class="card p-4">

    <form action="{{ route('mahasiswa.tugasakhir.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Judul Tugas Akhir</label>
            <input type="text" name="judul" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi Singkat</label>
            <textarea name="deskripsi" class="form-control" rows="4"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>

    </form>

</div>

@endsection
