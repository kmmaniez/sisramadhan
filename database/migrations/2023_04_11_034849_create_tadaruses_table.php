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
        Schema::create('tadarus', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('id_kel_tadarus')->references('id')->on('kel_tadarus')->cascadeOnUpdate()->cascadeOnDelete();
            // $table->foreignId('id_warga')->references('id')->on('warga');
            $table->string('nama_kelompok')->nullable();
            $table->json('nama_warga')->nullable();
            $table->date('tahun_kegiatan');
            $table->integer('jumlah_khatam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tadarus');
    }
};
