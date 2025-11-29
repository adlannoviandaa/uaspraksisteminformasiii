@extends('layouts.main')

@section('content')

<div class="container mt-4">
    <h3 class="mb-3">Pilihan Dosen Pembimbing</h3>

    @if ($pilihan)
        <!-- Jika mahasiswa sudah memilih -->
        <div class="alert alert-success">
            <strong>✔ Kamu sudah memilih dosen!</strong>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <h5>Dosen Terpilih:</h5>

                <p class="fs-5 fw-bold text-primary">
                    {{ $pilihan->dosen->name ?? 'Tidak ditemukan' }}
                </p>

                <span class="badge
                    {{ $pilihan->status == 'pending' ? 'bg-warning text-dark' : ($pilihan->status == 'ditolak' ? 'bg-danger' : 'bg-success') }}
                ">
                    Status: {{ ucfirst($pilihan->status) }}
                </span>

                <div class="mt-3">
                    <form action="{{ route('mahasiswa.pilihandosen.index') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin batal pilih dosen?')">
                            Batalkan Pilihan
                        </button>
                    </form>
                </div>
            </div>
        </div>

    @else
        <!-- Jika mahasiswa belum memilih -->
        <div class="alert alert-info">Silakan pilih salah satu dosen pembimbing.</div>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nama Dosen</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
               @foreach ($dosen as $d)
                <tr>
                    <td>{{ $d->name }}</td>
                    <td>
                        <form action="{{ route('mahasiswa.pilihandosen.index') }}" method="POST">
                            @csrf
                            <input type="hidden" name="dosen_id" value="{{ $d->id }}">
                            <button type="submit" class="btn btn-primary btn-sm">
                                Pilih Dosen Ini
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

@endsection
