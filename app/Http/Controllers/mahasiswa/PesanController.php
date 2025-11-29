<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pesan;

class PesanController extends Controller
{
    public function index()
    {
        $pesan = Pesan::where('pengirim_id', auth()->id())
                    ->orWhere('penerima_id', auth()->id())
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('mahasiswa.pesan.index', compact('pesan'));
    }

    public function create()
    {
        $dosen = User::where('role', 'admin')->get();

        return view('mahasiswa.pesan.create', compact('dosen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penerima_id' => 'required|exists:users,id',
            'isi' => 'required|min:3'
        ]);

        Pesan::create([
            'pengirim_id' => auth()->id(),
            'penerima_id' => $request->penerima_id,
            'isi' => $request->isi
        ]);

        return redirect()->route('mahasiswa.pesan.index')->with('success', 'Pesan berhasil dikirim!');
    }
}
