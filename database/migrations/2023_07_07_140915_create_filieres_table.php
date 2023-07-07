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
        Schema::create('filieres', function (Blueprint $table) {
            $table->id();
            $table->string('sigle');
            $table->string('libelle');
            $table->string('type'); // industrie, tertiaire, lycee_pro, lycee_technique, lycee_classique
            $table->string('description');

            $table->foreignId('cycle_id')->constrained('cycles')->onUpdate('cascade');
            $table->foreignId('option_id')->constrained('options')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filieres');
    }
};
