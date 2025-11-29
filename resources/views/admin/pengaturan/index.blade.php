@extends('layouts.main')

@section('content')
<div class="settings-container">
    <div class="settings-title fw-bold fs-4">Pengaturan Akun</div>
    <div class="settings-subtitle text-muted mb-4">
        Kelola pengaturan akun dan aplikasi Anda.
    </div>

    <div class="settings-card p-4 shadow-sm rounded bg-white" style="max-width: 600px;">

        {{-- FORM UPDATE PROFIL --}}
        <form method="POST" action="{{ route('mahasiswa.pengaturan.updateProfil') }}">
            @csrf

            <div class="settings-card-title fw-semibold fs-5 mb-3">Profil Pengguna</div>

            <div class="mb-2">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" placeholder="Nama" value="{{ auth()->user()->name }}">
            </div>

            <div class="mb-2">
                <label class="form-label">Alamat Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ auth()->user()->email }}">
            </div>

            <button class="btn btn-primary w-100 mt-3">💾 Simpan Perubahan</button>
        </form>

        <hr class="my-4">

        {{-- FORM GANTI PASSWORD --}}
        <form method="POST" action="{{ route('mahasiswa.pengaturan.updatePassword') }}">
            @csrf

            <div class="settings-card-title fw-semibold fs-5 mb-3">Keamanan</div>

            <div class="mb-2">
                <label class="form-label">Password Lama</label>
                <input type="password" name="old_password" class="form-control" placeholder="Masukkan password lama">
            </div>

            <div class="mb-2">
                <label class="form-label">Password Baru</label>
                <input type="password" name="new_password" class="form-control" placeholder="Masukkan password baru">
            </div>

            <div class="mb-2">
                <label class="form-label">Konfirmasi Password Baru</label>
                <input type="password" name="confirm_password" class="form-control" placeholder="Ulangi password baru">
            </div>

            <button class="btn btn-success w-100 mt-3">🔐 Ubah Password</button>
        </form>

        <hr class="my-4">

        {{-- TOMBOL LOGOUT --}}
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger w-100">🚪 Logout</button>
        </form>

    </div>
</div>
@endsection
