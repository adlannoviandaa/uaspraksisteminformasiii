@extends('layouts.main')

@section('content')
<div class="container-fluid p-4">

    <div class="card shadow-sm p-4" style="background: #f5f7f4;">
        <h4 class="fw-bold mb-3">📨 Pesan Masuk</h4>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="mb-3 text-end">
            <a href="{{ route('mahasiswa.pesan.create') }}" class="btn btn-success btn-sm">+ Kirim Pesan</a>
        </div>

        @forelse ($pesan as $p)
        <div class="border rounded p-3 mb-2 d-flex justify-content-between align-items-center bg-white">
            <div>
                <strong>
                    {{ $p->pengirim->id == auth()->id() ? 'Anda → '.$p->penerima->name : $p->pengirim->name }}
                </strong>
                <p class="m-0 text-secondary">{{ $p->isi }}</p>
            </div>

            <small class="text-muted">{{ $p->created_at->format('d M Y, H:i') }}</small>
        </div>
        @empty
            <p class="text-muted text-center">Belum ada pesan.</p>
        @endforelse
    </div>
</div>
@endsection
