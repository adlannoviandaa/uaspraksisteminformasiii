@extends('layouts.main')

@section('content')
<div class="settings-wrapper">

    <h2 class="page-title mb-2">⚙️ Pengaturan Akun</h2>
    <p class="subtitle mb-4">Perbarui informasi akun dan keamanan kamu.</p>

    <div class="settings-card">

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <form action="{{ route('mahasiswa.pengaturan.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- FOTO PROFIL -->
            <div class="text-center mb-4">
                <img src="{{ auth()->user()->photo ? asset('storage/'.auth()->user()->photo) : 'https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png' }}"
                     class="profile-photo" alt="Foto Profil">

                <div class="mt-2">
                    <input type="file" name="photo" class="form-control" style="max-width: 280px; margin:auto;">
                    <small class="text-muted d-block mt-1">Format: JPG/PNG - Max 2MB</small>
                </div>
            </div>

            <!-- NAMA -->
            <div class="mb-3">
                <label class="form-label fw-bold">👤 Nama Lengkap</label>
                <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
            </div>

            <!-- EMAIL -->
            <div class="mb-3">
                <label class="form-label fw-bold">📧 Email</label>
                <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}" required>
            </div>

            <!-- PASSWORD -->
            <div class="mb-3">
                <label class="form-label fw-bold">🔒 Password Baru</label>
                <input type="password" name="password" class="form-control" placeholder="Isi jika ingin mengubah">
            </div>

            <!-- KONFIRMASI PASSWORD -->
            <div class="mb-4">
                <label class="form-label fw-bold">🔒 Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password">
            </div>

            <!-- BUTTON -->
            <button type="submit" class="btn btn-success rounded-pill px-4">
                💾 Simpan Perubahan
            </button>
        </form>
    </div>
</div>


<style>
    .settings-wrapper {
        background: #e8f5e9;
        padding: 30px;
        border-radius: 12px;
    }

    .settings-card {
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        max-width: 650px;
        margin: auto;
        box-shadow: 0 4px 12px rgba(0,0,0,0.06);
    }

    .profile-photo {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 3px solid #4CAF50;
        object-fit: cover;
    }

    .alert {
        border-radius: 10px;
        font-weight: bold;
    }

    .subtitle {
        color: #666;
        font-size: 14px;
    }
</style>

@endsection
