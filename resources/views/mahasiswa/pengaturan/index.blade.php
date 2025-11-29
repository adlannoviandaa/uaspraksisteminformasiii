@extends('layouts.main')

@section('content')
<div class="container mt-4">

    <h3>Pengaturan Akun</h3>
    <p class="text-muted">Atur profil dan keamanan akun anda</p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row mt-4">

        <!-- ========== PROFIL ========== -->
        <div class="col-md-6">
            <div class="card p-3">
                <h5 class="fw-bold">Profil</h5>

                <form action="{{ route('mahasiswa.pengaturan.index') }}" method="POST">
                    @csrf

                    <label class="mt-2">Nama</label>
                    <input name="name" class="form-control" value="{{ $user->name }}">

                    <label class="mt-2">NPM</label>
                    <input name="npm" class="form-control" value="{{ $user->npm }}" readonly>

                    <label class="mt-2">Program Studi</label>
                    <input class="form-control" value="{{ $user->prodi }}" readonly>

                    <label class="mt-2">Fakultas</label>
                    <input class="form-control" value="{{ $user->fakultas }}" readonly>

                    <label class="mt-2">Nomor HP</label>
                    <input name="no_hp" class="form-control" value="{{ $user->no_hp }}">

                    <label class="mt-2">Alamat</label>
                    <textarea name="alamat" class="form-control">{{ $user->alamat }}</textarea>

                    <button class="btn btn-success w-100 mt-3">Simpan</button>
                </form>
            </div>
        </div>


        <!-- ========== UBAH PASSWORD ========== -->
        <div class="col-md-6">
            <div class="card p-3">
                <h5 class="fw-bold">Keamanan</h5>

                <form action="{{ route('mahasiswa.pengaturan.updatePassword') }}" method="POST">
                    @csrf

                    <label class="mt-3">Password Lama</label>
                    <input type="password" name="password_lama" class="form-control">

                    <label class="mt-3">Password Baru</label>
                    <input type="password" name="password_baru" class="form-control">

                    <label class="mt-3">Konfirmasi Password Baru</label>
                    <input type="password" name="password_baru_confirmation" class="form-control">

                    <button class="btn btn-primary w-100 mt-3">Ubah Password</button>
                </form>
            </div>

            <button class="btn btn-outline-danger w-100 mt-3" data-bs-toggle="modal" data-bs-target="#logoutModal">
                Logout
            </button>
        </div>

    </div>
</div>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal">
    <div class="modal-dialog">
        <div class="modal-content p-4 text-center">
            <h5>Yakin keluar?</h5>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-success mt-3 me-2">Ya</button>
                <button class="btn btn-secondary mt-3" data-bs-dismiss="modal">Tidak</button>
            </form>
        </div>
    </div>
</div>
@endsection
