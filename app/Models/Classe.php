<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = [
        'sigle',
        'libelle',
        'niveau',
        'anneeScolaire_id',
        'filiere_id',
    ];

    function anneeScolaire(): BelongsTo
    {
        return $this->belongsTo(AnneeScolaire::class);
    }

    function filiere(): BelongsTo
    {
        return $this->belongsTo(Filiere::class);
    }
}
