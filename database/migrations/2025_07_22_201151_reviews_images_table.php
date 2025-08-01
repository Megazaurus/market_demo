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
        Schema::create('review_images', function (Blueprint $table) {
           $table->id();
           $table->foreignId('user_id')->constrained()->cascadeOnDelete();
           $table->foreignId('review_id')->constrained()->cascadeOnDelete();
           $table->string('src_img');
           $table->timestamps();                      
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
