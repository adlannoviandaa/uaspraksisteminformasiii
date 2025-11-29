<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\TugasAkhir;
use App\Models\Pesan;
use App\Http\Controllers\Admin\DashboardAdminController;


class DashboardAdminController extends Controller
{
    public function index()
    {
        $totalMahasiswa = User::where('role', 'mahasiswa')->count();
        $totalTA = TugasAkhir::count();
        $totalPesan = Pesan::count();

        $pengajuan = TugasAkhir::with('mahasiswa')
                        ->orderBy('created_at', 'desc')
                        ->take(10)
                        ->get();

        return view('admin.dashboard', compact(
            'totalMahasiswa',
            'totalTA',
            'totalPesan',
            'pengajuan'
        ));
    }
}
