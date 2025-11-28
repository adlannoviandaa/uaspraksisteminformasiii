<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PilihanDosen;
use Illuminate\Support\Facades\Auth;

class PilihanDosenController extends Controller
{
    public function index()
    {
        // ambil semua dosen
        $dosen = User::where('role', 'dosen')->get();

        // ambil pilihan dosen mahasiswa ini
        $pilihan = PilihanDosen::where('mahasiswa_id', Auth::user()->id)->first();

        return view('mahasiswa.pilihandosen.index', compact('dosen', 'pilihan'));
    }

    public function cari(Request $request)
    {
        $query = $request->input('q');

        $dosen = User::where('role', 'dosen')
            ->where('name', 'LIKE', '%' . $query . '%')
            ->get();

        return view('mahasiswa.pilihandosen.index', compact('dosen', 'query'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dosen_id' => 'required|exists:users,id',
        ]);

        // Cek apakah mahasiswa sudah memilih sebelumnya
        $cek = PilihanDosen::where('mahasiswa_id', Auth::user()->id)->first();

        if ($cek) {
            return redirect()->back()->with('error', 'Kamu sudah memilih dosen pembimbing.');
        }

        // Simpan pilihan dosen
        PilihanDosen::create([
            'mahasiswa_id' => Auth::user()->id,  // FIX
            'dosen1_id' => $request->dosen_id,   // FIX
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Dosen pembimbing berhasil dipilih.');
    }
}
