<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function index()
    {
        // Menampilkan halaman pengaturan
        return view('dosen.pengaturan.index');
    }

    public function updateProfil(Request $request)
    {
        // Logika update profil dosen
    }

    public function updatePassword(Request $request)
    {
        // Logika update password dosen
    }
}
