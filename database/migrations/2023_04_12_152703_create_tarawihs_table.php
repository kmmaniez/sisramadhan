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
        Schema::create('tarawih', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_kegiatan');
            $table->foreignId('id_imam')->references('id')->on('warga')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_penceramah')->references('id')->on('warga')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_bilal')->references('id')->on('warga')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarawih');
    }
};
