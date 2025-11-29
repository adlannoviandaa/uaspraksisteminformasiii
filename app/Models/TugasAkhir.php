<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Tambahkan ini jika belum ada

class TugasAkhir extends Model
{
    use HasFactory; // Tambahkan ini jika menggunakan factory

    protected $fillable = [
        'judul',
        'deskripsi',
        'file_proposal',
        
        // --- FIELD PENTING YANG DITAMBAHKAN ---
        'mahasiswa_id', 
        'dosen_id', // Kunci yang digunakan oleh DosenController
        'status'    // Kunci yang digunakan untuk menampilkan badge
    ];

    // --- RELASI (FUNGSI) YANG DIBUTUHKAN OLEH CONTROLLER ---
    
    /**
     * Relasi: Tugas Akhir dimiliki oleh satu Dosen.
     * Digunakan oleh: TugasAkhir::where('dosen_id', $dosenId)
     */
    public function dosen()
    {
        // Asumsi Model Dosen berada di App\Models\Dosen
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }
    
    /**
     * Relasi: Tugas Akhir dimiliki oleh satu Mahasiswa.
     * Digunakan oleh: $tugasAkhirList->with('mahasiswa')
     */
    public function mahasiswa()
    {
        // Asumsi Model Mahasiswa berada di App\Models\Mahasiswa
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}