<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('mahasiswa.pengaturan.index', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();
        $user->name = $request->nama;
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui!');
    }

    // ===== Simpan Tema =====
    public function updateTheme(Request $request)
    {
        $user = Auth::user();
        $user->theme = $request->theme; // "light" atau "dark"
        $user->save();

        return back()->with('success', 'Tema berhasil diubah!');
    }

    // ===== Simpan Bahasa =====
    public function updateLanguage(Request $request)
    {
        $user = Auth::user();
        $user->language = $request->language; // "id" atau "en"
        $user->save();

        return back()->with('success', 'Bahasa diperbarui!');
    }
}
