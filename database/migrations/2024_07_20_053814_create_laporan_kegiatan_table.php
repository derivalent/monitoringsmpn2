<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan_kegiatan', function (Blueprint $table) {
            $table->id();  // Primary key, auto-incremented unsignedBigInteger
            $table->string('nama');  // Nama kegiatan
            $table->unsignedBigInteger('kategori_id');  // Foreign key referencing 'id' in 'kategori_kegiatan' table
            $table->string('gambar')->nullable();  // Optional gambar field
            $table->text('keterangan');  // Keterangan field
            $table->timestamps();  // Created at and updated at timestamps

            // Defining foreign key constraint
            $table->foreign('kategori_id')
                  ->references('id')
                  ->on('kategori_kegiatan')
                  ->onDelete('cascade');  // Cascade delete to remove related records
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_kegiatan');
    }
};
