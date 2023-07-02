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
        Schema::create('periode_scolaires', function (Blueprint $table) {
            $table->id();
            $table->string('numeroPeriode'); // 1er, 2ème, 3ème, 4ème
            $table->string('mois');
            $table->string('periode'); //mensuel, bimestre, trimestre, semestre

            $table->foreignId('annee_scolaire_id')->constrained('annee_scolaires')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periode_scolaires');
    }
};
