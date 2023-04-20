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
        Schema::create('jadwal_ajar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_ustadh')->references('id')->on('ustadh')->cascadeOnUpdate()->cascadeOnDelete();;
            $table->foreignId('id_hari')->references('id')->on('hari')->cascadeOnUpdate()->cascadeOnDelete();;
            $table->string('tahun', 10);
            $table->string('keterangan')->nullable();
            $table->date('tgl_masehi');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_ajar');
    }
};
