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
        Schema::create('details_personnels', function (Blueprint $table) {
            $table->string('sexe');
            $table->timestamp('dateNaissance')->nullable();
            $table->string('lieuNaissance')->nullable();
            $table->string('contact');
            $table->string('photo')->nullable();
            $table->string('adresse')->nullable();
            $table->string('poste');
            $table->string('groupeSanguin')->nullable();
            $table->string('signeParticulier')->nullable();

            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade');
            $table->foreignId('ecole_id')->constrained('ecoles')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details_personnels');
    }
};
