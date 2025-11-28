<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'nim',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Supaya login pakai NIM, bukan email
    public function getAuthIdentifierName()
    {
        return 'nim';
    }

    // Supaya password otomatis di-hash kalau belum di-hash
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::needsRehash($password)
            ? Hash::make($password)
            : $password;
    }
}
