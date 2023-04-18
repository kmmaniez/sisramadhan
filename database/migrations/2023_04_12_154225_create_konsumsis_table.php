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
        Schema::create('konsumsi', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_kegiatan');
            $table->json('warga_takjil')->nullable();
            $table->json('warga_bukber')->nullable();
            $table->json('warga_jabur')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsumsi');
    }
};
