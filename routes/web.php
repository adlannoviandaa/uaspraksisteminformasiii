<?php

use Illuminate\Support\Facades\Route;

// Auth
use App\Http\Controllers\Auth\LoginController;

// Mahasiswa Controllers
use App\Http\Controllers\Mahasiswa\DashboardController;
use App\Http\Controllers\Mahasiswa\PengaturanController;
use App\Http\Controllers\Mahasiswa\PesanController;
use App\Http\Controllers\Mahasiswa\TugasAkhirController;
use App\Http\Controllers\Mahasiswa\PilihanDosenController;

// Admin Controller
use App\Http\Controllers\Admin\DashboardAdminController;


/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
    Route::get('/login', [LoginController::class, 'showLoginForm']); // Fix GET login
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| REDIRECT AFTER LOGIN
|--------------------------------------------------------------------------
*/
Route::get('/redirect', function () {
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    return match (auth()->user()->role) {
        'admin'      => redirect()->route('admin.dashboard'),
        'mahasiswa'  => redirect()->route('mahasiswa.dashboard'),
        default      => abort(403, 'Unauthorized Access'),
    };
})->name('redirect');



/*
|--------------------------------------------------------------------------
| MAHASISWA AREA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:mahasiswa'])
    ->prefix('mahasiswa')
    ->name('mahasiswa.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Pesan
        Route::prefix('pesan')->name('pesan.')->group(function () {
            Route::get('/', [PesanController::class, 'index'])->name('index');
            Route::get('/create', [PesanController::class, 'create'])->name('create');
            Route::post('/store', [PesanController::class, 'store'])->name('store');
        });

        // Tugas Akhir
        Route::prefix('tugasakhir')->name('tugasakhir.')->group(function () {
            Route::get('/', [TugasAkhirController::class, 'index'])->name('index');
            Route::post('/submit', [TugasAkhirController::class, 'submit'])->name('submit');
        });

        // Pilihan Dosen
        Route::prefix('pilihan-dosen')->name('pilihandosen.')->group(function () {
            Route::get('/', [PilihanDosenController::class, 'index'])->name('index');
            Route::post('/pilih', [PilihanDosenController::class, 'store'])->name('store');
        });

        // Pengaturan
        Route::prefix('pengaturan')->name('pengaturan.')->group(function () {
            Route::get('/', [PengaturanController::class, 'index'])->name('index');
            Route::post('/update-profil', [PengaturanController::class, 'update'])->name('updateProfil');
            Route::post('/update-password', [PengaturanController::class, 'updatePassword'])->name('updatePassword');
        });
    });


/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');
    });


/*
|--------------------------------------------------------------------------
| Utility Hash
|--------------------------------------------------------------------------
*/
Route::get('/hash/{pass}', fn($pass) => bcrypt($pass));
