<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'nim' => 'ADMIN001',
                'name' => 'Administrator SITAMA',
                'email' => 'admin@sitama.com',
                'role' => 'admin',
            ],
            [
                'nim' => '11111111',
                'name' => 'Dosen Pembimbing',
                'email' => 'dosen@sitama.com',
                'role' => 'dosen',
            ],
            [
                'nim' => '22222222',
                'name' => 'Mahasiswa Uji Coba',
                'email' => 'mahasiswa@sitama.com',
                'role' => 'mahasiswa',
            ],
        ];

        foreach ($users as $user) {
            User::firstOrCreate(
                ['nim' => $user['nim']], // cek nim dulu biar tidak duplicate
                [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => Hash::make('12345678'),
                    'role' => $user['role'],
                ]
            );
        }
    }
}
