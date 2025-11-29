<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesan;

class AdminPesanController extends Controller
{
    public function index()
    {
        $pesan = Pesan::latest()->get();
        return view('admin.pesan.index', compact('pesan'));
    }

    public function show($id)
    {
        $detail = Pesan::findOrFail($id);
        return view('admin.pesan.show', compact('detail'));
    }

    public function reply(Request $request, $id)
    {
        $request->validate(['pesan' => 'required']);

        Pesan::create([
            'pengirim_id' => auth()->id(),
            'penerima_id' => Pesan::find($id)->pengirim_id,
            'pesan' => $request->pesan,
        ]);

        return back()->with('success', 'Balasan dikirim.');
    }
}
