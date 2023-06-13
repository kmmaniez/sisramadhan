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
        Schema::create('takbiran_warga', function (Blueprint $table) {
        $table->unsignedBigInteger('takbiran_id');
        $table->unsignedBigInteger('warga_id');
        $table->foreign('takbiran_id')->references('id')->on('takbiran')->onDelete('cascade');
        $table->foreign('warga_id')->references('id')->on('warga')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('takbiran_warga');
    }
};
