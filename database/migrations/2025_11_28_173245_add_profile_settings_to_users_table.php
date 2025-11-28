<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambah kolom baru untuk penyimpanan data profil & pengaturan user.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            // Profil
            $table->string('no_hp')->nullable()->after('email');
            $table->string('alamat')->nullable()->after('no_hp');

            // Identitas Akademik (opsional, sesuaikan struktur kamu)
            $table->string('npm')->nullable()->after('name');
            $table->string('prodi')->nullable()->after('npm');
            $table->string('fakultas')->nullable()->after('prodi');

            // Pengaturan Sistem
            $table->string('theme')->default('light')->after('alamat');  // light / dark
            $table->string('language')->default('id')->after('theme'); // id / en
        });
    }

    /**
     * Mengembalikan perubahan jika rollback dilakukan.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'no_hp',
                'alamat',
                'npm',
                'prodi',
                'fakultas',
                'theme',
                'language'
            ]);
        });
    }
};
