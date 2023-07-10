<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Professeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'prenom',
        'nom',
        'sexe',
        'dateNaissance',
        'lieuNaissance',
        'contact',
        'email',
        'photo',
        'adresse',
        'groupeSanguin',
        'signeParticulier',
        'discipline_id',
        'ecole_id',
    ];

    function discipline(): BelongsTo
    {
        return $this->belongsTo(Discipline::class);
    }

    function ecole(): BelongsTo
    {
        return $this->belongsTo(Ecole::class);
    }

    protected $casts = [
        'dateNaissance' => 'datetime',
    ];
}
