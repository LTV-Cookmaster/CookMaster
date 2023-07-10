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
        Schema::create('formation_data', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('formation_id')->constrained('events');
            $table->string('formation_titre');
            $table->text('formation_description');
            $table->string('chapitre1_titre');
            $table->text('chapitre1_cours');
            $table->text('chapitre1_conclusion');
            $table->string('chapitre2_titre');
            $table->text('chapitre2_cours');
            $table->text('chapitre2_conclusion');
            $table->string('chapitre3_titre');
            $table->text('chapitre3_cours');
            $table->text('chapitre3_conclusion');
            $table->string('question1');
            $table->string('reponse1q1');
            $table->boolean('reponse1q1_correcte')->default(false);
            $table->string('reponse2q1');
            $table->boolean('reponse2q1_correcte')->default(false);
            $table->string('reponse3q1');
            $table->boolean('reponse3q1_correcte')->default(false);
            $table->string('reponse4q1');
            $table->boolean('reponse4q1_correcte')->default(false);
            $table->string('question2');
            $table->string('reponse1q2');
            $table->boolean('reponse1q2_correcte')->default(false);
            $table->string('reponse2q2');
            $table->boolean('reponse2q2_correcte')->default(false);
            $table->string('reponse3q2');
            $table->boolean('reponse3q2_correcte')->default(false);
            $table->string('reponse4q2');
            $table->boolean('reponse4q2_correcte')->default(false);
            $table->string('question3');
            $table->string('reponse1q3');
            $table->boolean('reponse1q3_correcte')->default(false);
            $table->string('reponse2q3');
            $table->boolean('reponse2q3_correcte')->default(false);
            $table->string('reponse3q3');
            $table->boolean('reponse3q3_correcte')->default(false);
            $table->string('reponse4q3');
            $table->boolean('reponse4q3_correcte')->default(false);
            $table->string('question4');
            $table->string('reponse1q4');
            $table->boolean('reponse1q4_correcte')->default(false);
            $table->string('reponse2q4');
            $table->boolean('reponse2q4_correcte')->default(false);
            $table->string('reponse3q4');
            $table->boolean('reponse3q4_correcte')->default(false);
            $table->string('reponse4q4');
            $table->boolean('reponse4q4_correcte')->default(false);
            $table->string('question5');
            $table->string('reponse1q5');
            $table->boolean('reponse1q5_correcte')->default(false);
            $table->string('reponse2q5');
            $table->boolean('reponse2q5_correcte')->default(false);
            $table->string('reponse3q5');
            $table->boolean('reponse3q5_correcte')->default(false);
            $table->string('reponse4q5');
            $table->boolean('reponse4q5_correcte')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formation_data');
    }
};
