<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pilihan_dosen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('dosen_id');
            $table->timestamps();

            // Foreign key optional
            // $table->foreign('mahasiswa_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('dosen_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pilihan_dosen');
    }
};
