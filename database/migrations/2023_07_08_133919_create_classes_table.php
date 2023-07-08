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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('sigle');
            $table->string('libelle');
            $table->string('niveau'); // de 1 à 12

            $table->foreignId('anneeScolaire_id')->constrained('annee_scolaires')->onUpdate('cascade');
            $table->foreignId('filiere_id')->constrained('filieres')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
