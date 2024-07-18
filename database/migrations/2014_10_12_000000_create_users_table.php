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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // VARCHAR
            $table->string('email')->unique(); // VARCHAR
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password'); // VARCHAR
            $table->string('telepon')->nullable(); // VARCHAR
            $table->string('nip')->nullable(); // VARCHAR
            $table->string('jabatan')->nullable(); // VARCHAR
            $table->enum('jenis_kelamin', ['pria', 'wanita'])->nullable();
            $table->string('tempat_lahir')->nullable(); // VARCHAR
            $table->date('tanggal_lahir')->nullable(); // DATE
            $table->string('pendidikan_terakhir')->nullable(); // VARCHAR
            $table->string('bidang_studi')->nullable(); // VARCHAR
            $table->enum('status_pekerjaan', ['pns', 'honorer'])->default('pns'); // Updated
            $table->string('role')->nullable(); // VARCHAR
            $table->text('alamat')->nullable(); // TEXT
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
