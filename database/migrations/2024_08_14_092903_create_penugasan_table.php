<?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up()
//     {
//         Schema::create('penugasan', function (Blueprint $table) {
//             $table->id();
//             $table->string('nama_penugas'); // Automatically filled
//             $table->json('tertugas'); // Store selected users as JSON
//             $table->string('file')->nullable(); // For PDF file
//             $table->text('keterangan')->nullable();
//             $table->enum('status', ['Tugas-Baru', 'Terkirim', 'Diperbaiki', 'Ditolak', 'Selesai'])->default('Tugas Baru');
//             $table->text('catatan')->nullable();
//             $table->timestamps();
//         });
//     }


//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('penugasan');
//     }
// };

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenugasanTable extends Migration
{
    public function up()
    {
        Schema::create('penugasan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penugas');
            $table->json('tertugas');
            $table->string('file')->nullable();
            $table->unsignedBigInteger('kegiatan');
            $table->enum('status', ['Tugas-Baru', 'Terkirim', 'Diperbaiki', 'Ditolak', 'Selesai'])->default('Tugas-baru');
            $table->text('catatan')->nullable();
            $table->date('deadline');
            $table->text('pengumpulan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penugasan');
    }
}
