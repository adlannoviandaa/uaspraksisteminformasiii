@extends('layouts.main')

@section('content')
<div class="container-fluid p-4">

    <div class="card shadow-sm p-4" style="background: #f5f7f4;">
        <h4 class="fw-bold mb-4">📝 Kirim Pesan</h4>

        <!-- Action tanpa route name (langsung URL) -->
        <form method="POST" action="/mahasiswa/pesan">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" value="{{ auth()->user()->name }}" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">NPM Mahasiswa</label>
                <input type="text" class="form-control" value="{{ auth()->user()->npm }}" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Kepada Dosen</label>
                <select class="form-control" name="penerima_id" required>
                    <option value="" disabled selected>-- Pilih Dosen --</option>
                    @foreach ($users as $user)
                        @if($user->role === 'dosen')
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Isi Pesan</label>
                <textarea name="isi" class="form-control" rows="4" required></textarea>
            </div>

            <button class="btn btn-primary">Kirim</button>
        </form>
    </div>
</div>
@endsection
