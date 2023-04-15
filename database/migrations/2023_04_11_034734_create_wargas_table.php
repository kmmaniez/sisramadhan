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
        Schema::create('warga', function (Blueprint $table) {
            $table->id();
            $table->string('nama_keluarga');
            $table->string('nama_asli');
            $table->string('nama_alias');
            $table->string('alamat');
            $table->integer('rt');
            $table->integer('rw');
            $table->string('nomor_hp');
            $table->string('email');
            // $table->string('status_keaktifan');
            // $table->string('status_kontributor');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warga');
    }
};
