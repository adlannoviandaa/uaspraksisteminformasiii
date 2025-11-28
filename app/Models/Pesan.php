<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Pesan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengirim_id',
        'penerima_id',
        'isi'
    ];

    // Relasi utk mengetahui siapa pengirim
    public function pengirim()
    {
        return $this->belongsTo(User::class, 'pengirim_id');
    }

    // Relasi utk mengetahui siapa penerima
    public function penerima()
    {
        return $this->belongsTo(User::class, 'penerima_id');
    }
}
