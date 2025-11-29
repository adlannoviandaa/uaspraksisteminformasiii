<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tugas_akhirs', function (Blueprint $table) {
            if (!Schema::hasColumn('tugas_akhirs', 'dosen_id')) {
                $table->unsignedBigInteger('dosen_id')->nullable()->after('mahasiswa_id');
                $table->foreign('dosen_id')->references('id')->on('users')->onDelete('set null');
            }
        });
    }

    public function down(): void
    {
        Schema::table('tugas_akhirs', function (Blueprint $table) {
            if (Schema::hasColumn('tugas_akhirs', 'dosen_id')) {
                $table->dropForeign(['dosen_id']);
                $table->dropColumn('dosen_id');
            }
        });
    }
};
