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
        Schema::create('takbiran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_warga')->references('id')->on('warga')->cascadeOnUpdate()->cascadeOnDelete();;
            $table->date('tgl_kegiatan');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('takbiran');
    }
};
