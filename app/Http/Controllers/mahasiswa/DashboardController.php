<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Data statis (contoh). Bisa diganti dari database nanti.
        $progress = [
            [
                'tahap' => 'Proposal',
                'status' => 'Disetujui',
                'persentase' => 100,
                'icon' => '✅'
            ],
            [
                'tahap' => 'Bab I–III',
                'status' => 'Sedang Diperiksa',
                'persentase' => 70,
                'icon' => '⏳'
            ],
            [
                'tahap' => 'Sidang',
                'status' => 'Belum',
                'persentase' => 0,
                'icon' => '⬜'
            ],
        ];

        // Kirim data ke view
        return view('mahasiswa.dashboard', [
            'title' => 'Dashboard Mahasiswa',
            'progress' => $progress
        ]);
    }
}
