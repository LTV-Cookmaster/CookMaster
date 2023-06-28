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
        Schema::create('events', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('contractor_id')->constrained('contractors');
            $table->string('type'); // online workshops, professional formation, event, etc.
            $table->string('name');
            $table->string('description');
            $table->integer('price');
            $table->integer('number_of_participants');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('start_time');
            $table->string('end_time');
            $table->foreignUuid('office_id')->nullable()->constrained('offices');
            $table->foreignUuid('room_id')->nullable()->constrained('rooms');
            $table->string('img_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
