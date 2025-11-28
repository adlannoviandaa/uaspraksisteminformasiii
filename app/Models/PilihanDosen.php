<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PilihanDosen extends Model
{
    protected $table = 'pilihan_dosen'; // <-- Tambahkan ini

    protected $fillable = [
        'mahasiswa_id',
        'dosen1_id',
        'status'
    ];

    public function dosen1()
    {
        return $this->belongsTo(User::class, 'dosen1_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }
}
