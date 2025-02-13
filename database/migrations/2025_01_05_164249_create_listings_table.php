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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('location');
            $table->decimal('land_size', 10, 2);  
            $table->enum('category', ['house', 'land']);
            $table->string('images');
            $table->integer('bedrooms')->nullable();
            $table->decimal('bathrooms', 2, 1)->nullable();
            $table->boolean('garage')->default(false)->nullable();
            $table->boolean('furnished')->default(false)->nullable();
            $table->string('heating')->nullable();
            $table->string('cooling')->nullable();
            $table->boolean('pool')->default(false)->nullable();
            $table->string('flooring_type')->nullable();
            $table->decimal('lot_size', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
