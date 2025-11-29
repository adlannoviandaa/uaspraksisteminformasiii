<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TugasAkhir extends Model
{
    protected $table = 'tugas_akhirs'; // sesuaikan jika nama tabel berbeda

    protected $fillable = [
        'mahasiswa_id',
        'judul',
        'deskripsi',
        'status'
    ];

    // RELASI YANG WAJIB ADA
    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }
}
