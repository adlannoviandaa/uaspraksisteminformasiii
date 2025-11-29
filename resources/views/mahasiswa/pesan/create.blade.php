@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <div class="card p-4 shadow-sm">
        <h4>Kirim Pesan</h4>

        <form action="{{ route('mahasiswa.pesan.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Kirim ke</label>
                <select name="penerima_id" class="form-control">
                    @foreach($dosen as $d)
                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <textarea name="isi" class="form-control" rows="4" placeholder="Tulis pesan..." required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
</div>
@endsection
