<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tugas_akhirs', function (Blueprint $table) {

            // Tambah kolom mahasiswa_id
            if (!Schema::hasColumn('tugas_akhirs', 'mahasiswa_id')) {
                $table->unsignedBigInteger('mahasiswa_id')->nullable()->after('id');
                $table->foreign('mahasiswa_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            }

            // Tambah kolom status
            if (!Schema::hasColumn('tugas_akhirs', 'status')) {
                $table->string('status')->default('proses')->after('deskripsi');
            }
        });
    }

    public function down(): void
    {
        Schema::table('tugas_akhirs', function (Blueprint $table) {

            if (Schema::hasColumn('tugas_akhirs', 'mahasiswa_id')) {
                $table->dropForeign(['mahasiswa_id']);
                $table->dropColumn('mahasiswa_id');
            }

            if (Schema::hasColumn('tugas_akhirs', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};

