@extends('layouts.main')

@section('content')
<div class="content-wrapper">

    <h2 class="page-title mb-1">✏️ Edit Tugas Akhir</h2>
    <p class="subtitle mb-4">Perbarui judul, deskripsi, dan file proposal tugas akhir kamu.</p>

    <div class="card-custom">

        <form action="{{ route('mahasiswa.tugasakhir.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-bold">📌 Judul Tugas Akhir</label>
                <input type="text" name="judul" value="{{ $data->judul }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">📝 Deskripsi Singkat</label>
                <textarea name="deskripsi" class="form-control" rows="5" required>{{ $data->deskripsi }}</textarea>
            </div>



            </div>

            <button type="submit" class="btn btn-primary rounded-pill px-4"> Update</button>
        </form>

    </div>
</div>

<style>
    .content-wrapper {
        padding: 25px;
        background: #e8f5e9;
        border-radius: 12px;
    }
    .page-title {
        font-family: "Poppins", sans-serif;
        font-weight: bold;
    }
    .subtitle {
        color: #555;
    }
    .card-custom {
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }
</style>
@endsection
