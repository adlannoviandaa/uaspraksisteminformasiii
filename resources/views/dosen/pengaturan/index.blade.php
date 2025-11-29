@extends('layouts.main')

@section('content')
<div class="p-5" style="background-color:#f0f0f0; min-height:100vh;">

    {{-- HEADER HALAMAN PENGATURAN --}}
    <h1 class="display-5 fw-bold text-dark mb-2 d-flex align-items-center">
        Pengaturan
    </h1>

    <p class="text-secondary mb-5 fs-6">Atur informasi akun, kata sandi, dan preferensi Anda.</p>

    {{-- CARD FORM PENGATURAN --}}
    {{-- Card dibuat lebih lebar dan shadow yang lebih soft --}}
    <div class="card shadow-lg border-0 rounded-xl p-5" style="max-width: 800px; margin: auto;">
        <div class="card-body p-0">

            <form action="#" method="POST">
                @csrf
                
                {{-- Nama --}}
                <div class="mb-5">
                    <label for="nama" class="form-label fw-semibold text-dark fs-5 mb-3">Nama</label>
                    {{-- Input dibuat sangat lebar dan ringan --}}
                    <input type="text" class="form-control form-control-lg bg-light border-0 py-4 px-4 fs-6" id="nama" 
                           value="Dr. Rahmat Hidayat, S.T., M.T" disabled readonly style="border-radius: 12px; box-shadow: inset 0 1px 3px rgba(0,0,0,0.05);">
                    <small class="form-text text-muted mt-2 d-block">Nama tidak dapat diubah, silakan hubungi Admin jika ada perubahan.</small>
                </div>

                {{-- Email --}}
                <div class="mb-5">
                    <label for="email" class="form-label fw-semibold text-dark fs-5 mb-3">Email</label>
                    <input type="email" class="form-control form-control-lg bg-light border-0 py-4 px-4 fs-6" id="email" 
                           value="rahmat.hidayat@email.com" style="border-radius: 12px; box-shadow: inset 0 1px 3px rgba(0,0,0,0.05);">
                </div>

                {{-- Kata Sandi --}}
                <div class="mb-5">
                    <label for="password" class="form-label fw-semibold text-dark fs-5 mb-3">Kata Sandi</label>
                    <div class="input-group input-group-lg" style="height: auto;">
                        <input type="text" class="form-control bg-light border-0 py-4 px-4 fs-6" placeholder="Ubah kata sandi" disabled readonly style="border-radius: 12px 0 0 12px; box-shadow: inset 0 1px 3px rgba(0,0,0,0.05);">
                        {{-- Tombol dibuat lebih besar dan rounded --}}
                        <button class="btn btn-primary fw-medium text-white px-4 py-3" type="button" data-bs-toggle="modal" data-bs-target="#changePasswordModal" style="border-radius: 0 12px 12px 0;">
                            <i class="bi bi-key me-2"></i> Ubah
                        </button>
                    </div>
                </div>

                {{-- Bahasa (Dropdown sederhana) --}}
                <div class="mb-5">
                    <label for="bahasa" class="form-label fw-semibold text-dark fs-5 mb-3">Bahasa</label>
                    <select class="form-select form-select-lg bg-light border-0 py-4 px-4 fs-6" id="bahasa" style="border-radius: 12px; box-shadow: inset 0 1px 3px rgba(0,0,0,0.05);">
                        <option value="id" selected>Bahasa Indonesia</option>
                        <option value="en">English</option>
                    </select>
                </div>

                {{-- Tombol Simpan --}}
                <div class="d-flex justify-content-end pt-4">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-5 py-2 fw-bold me-3 shadow-sm">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-success rounded-pill px-5 py-2 fw-bold shadow-lg">
                        Simpan
                    </button>
                </div>

            </form>
        </div>
    </div>
    {{-- End Card Form --}}
    
    {{-- Bagian Keluar (ditaruh terpisah di bawah card) --}}
    <div class="d-flex justify-content-center mt-5">
         <a href="/logout" class="text-danger fw-bold text-decoration-none d-flex align-items-center opacity-75 hover:opacity-100 transition-all">
            <i class="bi bi-box-arrow-right me-2 fs-5"></i> Keluar
        </a>
    </div>

    {{-- MODAL UBAH KATA SANDI --}}
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-xl shadow-lg border-0">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold" id="changePasswordModalLabel">Ubah Kata Sandi Anda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-2">
                    <form>
                        <div class="mb-3">
                            <label for="current-password" class="form-label fw-medium">Kata Sandi Saat Ini</label>
                            <input type="password" class="form-control bg-light rounded-lg" id="current-password" required>
                        </div>
                        <div class="mb-3">
                            <label for="new-password" class="form-label fw-medium">Kata Sandi Baru</label>
                            <input type="password" class="form-control bg-light rounded-lg" id="new-password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm-password" class="form-label fw-medium">Konfirmasi Kata Sandi Baru</label>
                            <input type="password" class="form-control bg-light rounded-lg" id="confirm-password" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary rounded-pill">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection