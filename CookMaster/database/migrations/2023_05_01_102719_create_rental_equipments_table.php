<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //Rental Equipment = Equipement de location pour les salles (appartient aux locaux)

    public function up(): void
    {
        Schema::create('rental_equipments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('office_id')->references('id')->on('offices');
            $table->string('name');
            $table->string('description');
            $table->string('price');
            $table->boolean('is_rented')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental_equipments');
    }
};
