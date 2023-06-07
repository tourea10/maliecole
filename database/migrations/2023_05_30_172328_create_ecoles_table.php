<?php

use App\Http\Livewire\Academie\Academie;
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
        Schema::create('ecoles', function (Blueprint $table) {
            $table->id();
            $table->string('nom_complet');
            $table->string('sigle')->nullable();
            $table->string('logo')->nullable();
            $table->string('slogan')->nullable();
            $table->string('adresse');
            $table->string('type_ecole');
            $table->string('telephone');
            $table->string('email');

            // relations
            $table->foreignId('academie_id')->constrained('academies')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecoles');
    }
};
