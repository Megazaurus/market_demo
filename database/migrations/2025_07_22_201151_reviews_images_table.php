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
        Schema::create('reviews_images', function (Blueprint $table) {
           $table->id();
           $table->foreignId('user_id');
           $table->foreignId('review_id');
           $table->string(column: 'src_img');
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
