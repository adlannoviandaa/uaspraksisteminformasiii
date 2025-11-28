<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\TugasAkhir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TugasAkhirController extends Controller
{
    // INDEX
    public function index()
    {
        $data = TugasAkhir::latest()->get();
        return view('mahasiswa.tugasakhir.index', compact('data'));
    }

    // CREATE
    public function create()
    {
        return view('mahasiswa.tugasakhir.create');
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'file_proposal' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $file = $request->hasFile('file_proposal')
            ? $request->file('file_proposal')->store('proposal', 'public')
            : null;

        TugasAkhir::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_proposal' => $file
        ]);

        return redirect()->route('mahasiswa.tugasakhir.index')
                         ->with('success', 'Tugas akhir berhasil ditambahkan.');
    }

    // EDIT
    public function edit($id)
    {
        $data = TugasAkhir::findOrFail($id);
        return view('mahasiswa.tugasakhir.edit', compact('data'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'file_proposal' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $data = TugasAkhir::findOrFail($id);

        // HANDLE FILE
        if ($request->hasFile('file_proposal')) {
            if ($data->file_proposal && Storage::disk('public')->exists($data->file_proposal)) {
                Storage::disk('public')->delete($data->file_proposal);
            }
            $data->file_proposal = $request->file('file_proposal')->store('proposal', 'public');
        }

        $data->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_proposal' => $data->file_proposal,
        ]);

        return redirect()->route('mahasiswa.tugasakhir.index')
                         ->with('success', 'Tugas akhir berhasil diperbarui.');
    }

    // DELETE
    public function destroy($id)
    {
        $data = TugasAkhir::findOrFail($id);

        if ($data->file_proposal && Storage::disk('public')->exists($data->file_proposal)) {
            Storage::disk('public')->delete($data->file_proposal);
        }

        $data->delete();

        return redirect()->route('mahasiswa.tugasakhir.index')
                         ->with('success', 'Tugas akhir berhasil dihapus.');
    }
}
