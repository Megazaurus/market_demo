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
        Schema::create('products', function (Blueprint $table) {
           $table->id();
           $table->string('title');
           $table->decimal('price');
           $table->decimal('promotion_price');
           $table->boolean('is_new');
           $table->dateTime('added_at');
           $table->dateTime('deleted_at')->nullable();
           $table->boolean('is_avaliable');
           $table->foreignId('category_id');
           $table->string(column: 'description')->nullable();
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
