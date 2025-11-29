<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TugasAkhirController extends Controller
{
    public function index()
    {
        // Misal menampilkan daftar tugas akhir
        return view('dosen.tugasakhir.index');
    }

    public function create() {}
    public function store(Request $request) {}
    public function show($id) {}
    public function edit($id) {}
    public function update(Request $request, $id) {}
    public function destroy($id) {}
}
