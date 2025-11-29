<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PilihanDosen;
use Illuminate\Support\Facades\Auth;

class PilihanDosenController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');

        $dosen = User::where('role', 'dosen')
            ->when($query, fn($q) => $q->where('name', 'LIKE', "%$query%"))
            ->get();

        $pilihan = PilihanDosen::where('mahasiswa_id', Auth::id())->first();

        return view('mahasiswa.pilihandosen.index', compact('dosen', 'pilihan', 'query'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dosen_id' => 'required|exists:users,id',
        ]);

        // Cek apakah sudah memilih sebelumnya
        if (PilihanDosen::where('mahasiswa_id', Auth::id())->exists()) {
            return back()->with('error', 'Kamu sudah memilih dosen pembimbing.');
        }

        PilihanDosen::create([
            'mahasiswa_id' => Auth::id(),
            'dosen_id' => $request->dosen_id,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Dosen pembimbing berhasil dipilih.');
    }

    public function destroy()
    {
        $pilihan = PilihanDosen::where('mahasiswa_id', Auth::id())->first();

        if (!$pilihan) {
            return back()->with('error', 'Tidak ada data pilihan untuk dihapus.');
        }

        $pilihan->delete();

        return back()->with('success', 'Pilihan dosen berhasil dibatalkan.');
    }
}
