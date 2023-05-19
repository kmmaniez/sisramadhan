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
        Schema::create('kontribusi_warga', function(Blueprint $table){
            $table->id();
            // $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->enum('kontribusi',[1,2,3])->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
