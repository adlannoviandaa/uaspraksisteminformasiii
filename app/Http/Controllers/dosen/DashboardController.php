<?php

namespace App\Http\Controllers\Dosen; // <-- PERHATIKAN: Menambahkan \Dosen

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Import Model-model yang Anda butuhkan
use App\Models\TugasAkhir; 
use App\Models\Pesan; 

class DashboardController extends Controller // Nama kelas cukup DashboardController
{
    public function index()
    {
        $dosenId = auth()->id(); 

        // 1. Ambil data ringkasan
        $jumlahTugasAkhir = TugasAkhir::where('dosen_id', $dosenId)->count();
        $jumlahPesan = Pesan::where('penerima_id', $dosenId)->where('is_read', false)->count();
        $mahasiswaBimbingan = TugasAkhir::where('dosen_id', $dosenId)->distinct('mahasiswa_id')->count('mahasiswa_id');

        // 2. Ambil data tabel
        // Relasi `with('mahasiswa')` digunakan untuk mengambil data mahasiswa yang dibimbing
        $tugasAkhirList = TugasAkhir::with('mahasiswa')->where('dosen_id', $dosenId)->get();

        // 3. Mengirim data ke View (Asumsi View masih di resources/views/dosen/dashboard.blade.php)
        return view('dosen.dashboard', compact(
            'jumlahTugasAkhir', 
            'jumlahPesan', 
            'mahasiswaBimbingan', 
            'tugasAkhirList'
        ));
    }
}