<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pesan;
use Auth;

class PesanController extends Controller
{
    public function index()
    {
        $pesan = Pesan::where('pengirim_id', Auth::id())
                      ->orWhere('penerima_id', Auth::id())
                      ->orderBy('created_at', 'desc')
                      ->get();

        return view('mahasiswa.pesan.index', compact('pesan'));
    }

    public function create()
    {
        $users = User::where('role', 'dosen')->orderBy('name')->get();
        return view('mahasiswa.pesan.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penerima_id' => 'required|exists:users,id',
            'pesan' => 'required|min:3',
        ]);

        Pesan::create([
            'pengirim_id' => Auth::id(),
            'penerima_id' => $request->penerima_id,
            'pesan' => $request->pesan,
        ]);

        return redirect()->route('mahasiswa.pesan.index')
                         ->with('success', 'Pesan berhasil dikirim!');
    }
}
