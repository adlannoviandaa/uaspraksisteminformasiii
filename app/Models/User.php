<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nim', 'name', 'email', 'password', 'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function username()
    {
        return 'nim';
    }

    // === HASH PASSWORD OTOMATIS ===
    public function setPasswordAttribute($value)
    {
        // Cegah double-hash
        if (!empty($value) && strlen($value) < 60) {
            $this->attributes['password'] = Hash::make($value);
        } else {
            $this->attributes['password'] = $value;
        }
    }
}
