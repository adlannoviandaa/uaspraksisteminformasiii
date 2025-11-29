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
                'password' => '12345678'
            ],
            [
                'nim' => '11111111',
                'name' => 'Dosen Pembimbing',
                'email' => 'dosen@sitama.com',
                'role' => 'dosen',
                'password' => '12345678'
            ],
            [
                'nim' => '22222222',
                'name' => 'Mahasiswa Uji Coba',
                'email' => 'mahasiswa@sitama.com',
                'role' => 'mahasiswa',
                'password' => '12345678'
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['nim' => $user['nim']], // cari berdasarkan NIM
                [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'password' => Hash::make($user['password'])
                ]
            );
        }
    }
}
