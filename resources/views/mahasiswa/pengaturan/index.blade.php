@extends('layouts.main')

@section('content')
<div class="container mt-4">

    <h3>Pengaturan akun</h3>
    <p class="text-muted">Atur Profil dan Preferensi Anda</p>

    <div class="row mt-4">

        <!-- === PROFIL === -->
        <div class="col-md-4">
            <div class="card p-3">
                <h5 class="fw-bold">Profil</h5>
                <form action="{{ route('mahasiswa.pengaturan.updateProfil') }}" method="POST">
                    @csrf
                    <table class="table table-sm mt-3">
                        <tr><td><strong>Nama</strong></td><td><input name="nama" class="form-control" value="{{ $user->name }}"></td></tr>
                        <tr><td><strong>NPM</strong></td><td>{{ $user->npm }}</td></tr>
                        <tr><td><strong>Prodi</strong></td><td>{{ $user->prodi }}</td></tr>
                        <tr><td><strong>Fakultas</strong></td><td>{{ $user->fakultas }}</td></tr>
                        <tr><td><strong>Nomor Hp</strong></td><td><input name="no_hp" class="form-control" value="{{ $user->no_hp }}"></td></tr>
                        <tr><td><strong>Alamat</strong></td><td><textarea name="alamat" class="form-control">{{ $user->alamat }}</textarea></td></tr>
                    </table>
                    <button class="btn btn-success w-100">Simpan Perubahan</button>
                </form>

                <button class="btn btn-outline-danger w-100 mt-2" data-bs-toggle="modal" data-bs-target="#logoutModal">Keluar</button>
            </div>
        </div>

        <!-- === KEAMANAN & PREFERENSI === -->
        <div class="col-md-8">

            <div class="card p-3 mb-3">
                <h5>Keamanan</h5>
                <ul class="list-group mt-2">
                    <li class="list-group-item">Ubah password</li>
                    <li class="list-group-item">Autentikasi dua langkah</li>
                    <li class="list-group-item">Pertanyaan pemulihan</li>
                </ul>
            </div>

            <div class="card p-3">
                <h5>Tampilan dan preferensi</h5>


                </form>

            </div>

        </div>
    </div>
</div>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal">
    <div class="modal-dialog">
        <div class="modal-content p-4 text-center">
            <h5>INGIN KELUAR?</h5>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-success mt-3 me-2">Ya</button>
                <button class="btn btn-secondary mt-3" data-bs-dismiss="modal">Tidak</button>
            </form>
        </div>
    </div>
</div>
@endsection
