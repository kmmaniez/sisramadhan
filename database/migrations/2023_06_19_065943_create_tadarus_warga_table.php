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
        Schema::create('tadarus_warga', function (Blueprint $table) {
            $table->unsignedBigInteger('tadarus_id');
            $table->unsignedBigInteger('warga_id');
            $table->foreign('tadarus_id')->references('id')->on('tadarus')->onDelete('cascade');
            $table->foreign('warga_id')->references('id')->on('warga')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tadarus_warga');
    }
};
