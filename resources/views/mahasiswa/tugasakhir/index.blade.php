@extends('layouts.main')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<style>
    body {
        background: #e9f5ee !important;
    }

    .page-title {
        font-size: 26px;
        font-weight: 700;
    }

    .subtitle {
        font-size: 14px;
        color: #6c757d;
    }

    .card-custom {
        border-radius: 14px;
        padding: 25px;
        border: none;
        background: #fff;
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.06);
    }

    table th {
        background: #f2f7f3;
        font-weight: 600;
        font-size: 14px;
    }

    table td {
        vertical-align: middle;
        font-size: 14px;
    }

    /* tombol tambah */
    .btn-primary {
        background-color: #088a5e;
        border: none;
        padding: 9px 16px;
        font-weight: 600;
        border-radius: 8px;
    }
    .btn-primary:hover {
        background-color: #066a48;
    }

    /* container tombol di tiap row */
    .action-container {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .btn-action {
        padding: 7px 14px;
        border-radius: 25px;
        font-size: 13px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border: none;
        cursor: pointer;
        transition: .25s ease;
        text-decoration: none;
    }

    /* EDIT */
    .btn-action.edit {
        background: #e6f0ff;
        color: #0b57d0;
    }
    .btn-action.edit:hover {
        background: #0b57d0;
        color: #fff;
    }

    /* DELETE */
    .btn-action.delete {
        background: #ffebeb;
        color: #d10000;
    }
    .btn-action.delete:hover {
        background: #d10000;
        color: #fff;
    }
</style>

<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12 p-5">

            <h2 class="page-title">📄 Tugas Akhir</h2>
            <p class="subtitle mb-4">Daftar tugas akhir yang telah kamu upload.</p>

            <div class="card-custom">

                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('mahasiswa.tugasakhir.create') }}" class="btn btn-primary">
                        + Tambah Tugas Akhir
                    </a>
                </div>

                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th width="50px">No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>File</th>
                            <th width="180px">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($data as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->deskripsi ?? '-' }}</td>
                            <td>
                                @if($item->file_proposal)
                                    <a href="{{ asset('storage/' . $item->file_proposal) }}"
                                       target="_blank"
                                       class="btn btn-outline-success btn-sm">
                                        <i class="bi bi-file-earmark-arrow-down"></i> Lihat
                                    </a>
                                @else
                                    <span class="text-muted">Tidak ada file</span>
                                @endif
                            </td>

                            <td>
                                <div class="action-container">

                                    <a href="{{ route('mahasiswa.tugasakhir.edit', $item->id) }}"
                                       class="btn-action edit">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>

                                    <form action="{{ route('mahasiswa.tugasakhir.destroy', $item->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Hapus tugas akhir ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-action delete">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-muted py-4">
                                <i class="bi bi-folder-x"></i> Tidak ada tugas akhir yang diunggah.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection
