<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('dosen')->insert([
            [
                'nama' => 'Dr. Budi Santoso',
                'NIDN' => '1234567890',
                'bidang_keahlian' => 'Machine Learning',
            ],
            [
                'nama' => 'Prof. Siti Aminah',
                'NIDN' => '0987654321',
                'bidang_keahlian' => 'Sistem Informasi',
            ],
        ]);
    }
}
