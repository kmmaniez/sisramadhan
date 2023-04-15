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
        Schema::create('khataman_nuzulul', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_kegiatan');
            $table->string('jenis_kegiatan');
            $table->string('keterangan');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khataman_nuzulul');
    }
};
