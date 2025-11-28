<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengirim_id');
            $table->unsignedBigInteger('penerima_id');
            $table->text('pesan');
            $table->timestamps();

            // Relasi ke tabel users
            $table->foreign('pengirim_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('penerima_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesans');
    }
};
