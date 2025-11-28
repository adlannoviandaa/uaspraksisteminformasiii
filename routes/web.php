<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CONTROLLER IMPORT
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Auth\LoginController;

// Mahasiswa
use App\Http\Controllers\Mahasiswa\DashboardController;
use App\Http\Controllers\Mahasiswa\TugasAkhirController;
use App\Http\Controllers\Mahasiswa\PilihanDosenController;
use App\Http\Controllers\Mahasiswa\PesanController;
use App\Http\Controllers\Mahasiswa\MahasiswaProfileController;
use App\Http\Controllers\Mahasiswa\PengaturanController;


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
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Tugas Akhir CRUD (Resource)
        Route::resource('/tugasakhir', TugasAkhirController::class);

        /*
        |--------------------------------------------------------------------------
        | PILIHAN DOSEN
        |--------------------------------------------------------------------------
        */
        Route::prefix('pilihandosen')->name('pilihandosen.')->group(function () {
            Route::get('/', [PilihanDosenController::class, 'index'])->name('index');
            Route::get('/cari', [PilihanDosenController::class, 'cari'])->name('cari');
            Route::post('/', [PilihanDosenController::class, 'store'])->name('store');
            Route::get('/{id}', [PilihanDosenController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [PilihanDosenController::class, 'edit'])->name('edit');
            Route::put('/{id}', [PilihanDosenController::class, 'update'])->name('update');
            Route::delete('/{id}', [PilihanDosenController::class, 'destroy'])->name('destroy');
        });


        /*
        |--------------------------------------------------------------------------
        | PESAN
        |--------------------------------------------------------------------------
        */
        Route::prefix('pesan')->name('pesan.')->group(function () {
            Route::get('/', [PesanController::class, 'index'])->name('index');
            Route::get('/create', [PesanController::class, 'create'])->name('create');
        });


        /*
        |--------------------------------------------------------------------------
        | PENGATURAN / SETTINGS
        |--------------------------------------------------------------------------
        */
 Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan.index');
Route::post('/pengaturan/update-profil', [PengaturanController::class, 'updateProfil'])->name('pengaturan.updateProfil');
Route::post('/pengaturan/update-password', [PengaturanController::class, 'updatePassword'])->name('pengaturan.updatePassword');

    });


/*
|--------------------------------------------------------------------------
| DOSEN AREA (Coming Soon)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])
    ->prefix('dosen')
    ->name('dosen.')
    ->group(function () {
        Route::get('/dashboard', fn() => "Dashboard Dosen (Coming Soon)")
            ->name('dashboard');
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
        Route::get('/dashboard', fn() => "Dashboard Admin (Coming Soon)")
            ->name('dashboard');
    });
