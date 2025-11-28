<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nidn')->unique();
            $table->string('email')->unique();

            // Tambahan
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('prodi')->nullable();
            $table->string('jabatan_fungsional')->nullable();
            $table->string('no_hp')->nullable();
            $table->text('alamat')->nullable();

            // 👉 Tambahin kolom yang dibutuhkan halaman pilihan dosen
            $table->string('fakultas')->nullable();
            $table->integer('jumlah_bimbingan')->default(0);
            $table->integer('maks_bimbingan')->default(5);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
