<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PilihanDosen extends Model
{
    protected $table = 'pilihan_dosen';

    protected $fillable = [
        'mahasiswa_id',
        'dosen_id',
        'status'
    ];

    // Relasi ke dosen
    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }

    // Relasi ke mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }
}
