<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaturanController extends Controller
{
    /**
     * Menampilkan halaman pengaturan
     */
    public function index()
    {
        $user = Auth::user();
        return view('mahasiswa.pengaturan.index', compact('user'));
    }

    /**
     * Update data profil pengguna
     */
    public function updateProfil(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:100',
            'email'  => 'required|email|max:100',
            'no_hp'  => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();

        $user->update([
            'name'   => $request->name,
            'email'  => $request->email,
            'no_hp'  => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }

    /**
     * Update password akun
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password_lama'     => 'required',
            'password_baru'     => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();

        // Periksa password lama
        if (!password_verify($request->password_lama, $user->password)) {
            return back()->with('error', 'Password lama salah!');
        }

        $user->password = bcrypt($request->password_baru);
        $user->save();

        return back()->with('success', 'Password berhasil diperbarui!');
    }
}
