<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CONTROLLER IMPORT
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Auth\LoginController;

// Mahasiswa
use App\Http\Controllers\Mahasiswa\DashboardController as MahasiswaDashboardController;
use App\Http\Controllers\Mahasiswa\TugasAkhirController;
use App\Http\Controllers\Mahasiswa\PilihanDosenController;
use App\Http\Controllers\Mahasiswa\PesanController;
use App\Http\Controllers\Mahasiswa\MahasiswaProfileController;
use App\Http\Controllers\Mahasiswa\PengaturanController;

// Dosen
use App\Http\Controllers\Dosen\DashboardController as DosenDashboardController;
use App\Http\Controllers\Dosen\TugasAkhirController as DosenTugasAkhirController;
use App\Http\Controllers\Dosen\PesanController as DosenPesanController;
use App\Http\Controllers\Dosen\PengaturanController as DosenPengaturanController;

/*
|--------------------------------------------------------------------------
| REDIRECT HALAMAN UTAMA
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => redirect()->route('login'));

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.action');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| AREA MAHASISWA (Protected by Auth)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])
    ->prefix('mahasiswa')
    ->name('mahasiswa.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [MahasiswaDashboardController::class, 'index'])->name('dashboard');

        // Tugas Akhir CRUD (Resource)
        Route::resource('/tugasakhir', TugasAkhirController::class);

        // Pilihan Dosen
        Route::prefix('pilihandosen')->name('pilihandosen.')->group(function () {
            Route::get('/', [PilihanDosenController::class, 'index'])->name('index');
            Route::get('/cari', [PilihanDosenController::class, 'cari'])->name('cari');
            Route::post('/', [PilihanDosenController::class, 'store'])->name('store');
            Route::get('/{id}', [PilihanDosenController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [PilihanDosenController::class, 'edit'])->name('edit');
            Route::put('/{id}', [PilihanDosenController::class, 'update'])->name('update');
            Route::delete('/{id}', [PilihanDosenController::class, 'destroy'])->name('destroy');
        });

        // Pesan
        Route::prefix('pesan')->name('pesan.')->group(function () {
            Route::get('/', [PesanController::class, 'index'])->name('index');
            Route::get('/create', [PesanController::class, 'create'])->name('create');
        });

        // Pengaturan
        Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan.index');
        Route::post('/pengaturan/update-profil', [PengaturanController::class, 'updateProfil'])->name('pengaturan.updateProfil');
        Route::post('/pengaturan/update-password', [PengaturanController::class, 'updatePassword'])->name('pengaturan.updatePassword');
    });

/*
|--------------------------------------------------------------------------
| DOSEN AREA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])
    ->prefix('dosen')
    ->name('dosen.')
    ->group(function () {
        // Dashboard
        Route::get('/dashboard', [DosenDashboardController::class, 'index'])->name('dashboard');

        // Tugas Akhir CRUD (Resource)
        Route::resource('/tugasakhir', DosenTugasAkhirController::class);

        // Pesan CRUD (Resource)
        Route::resource('/pesan', DosenPesanController::class);

        // Pengaturan
        Route::get('/pengaturan', [DosenPengaturanController::class, 'index'])->name('pengaturan.index');
        Route::post('/pengaturan/update-profil', [DosenPengaturanController::class, 'updateProfil'])->name('pengaturan.updateProfil');
        Route::post('/pengaturan/update-password', [DosenPengaturanController::class, 'updatePassword'])->name('pengaturan.updatePassword');
    });

/*
|--------------------------------------------------------------------------
| ADMIN AREA (Coming Soon)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', fn() => "Dashboard Admin (Coming Soon)")->name('dashboard');
    });
