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
        Schema::create('recipes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('category');
            $table->string('name');
            $table->longText('description');
            $table->integer('prep_time');
            $table->integer('cooking_time');
            $table->integer('number_of_persons');
            $table->string('type');
            $table->string('gastronomy');
            $table->string('difficulty');
            $table->boolean('is_bookmarked')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
