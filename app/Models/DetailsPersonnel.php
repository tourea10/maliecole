<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsPersonnel extends Model
{
    use HasFactory;

    protected $fillable = [
        'sexe',
        'dateNaissance',
        'lieuNaissance',
        'contact',
        'photo',
        'adresse',
        'poste',
        'groupeSanguin',
        'signeParticulier',
        'user_id',
        'ecole_id',
    ];

    protected $casts = [
        'dateNaissance' => 'datetime',
    ];
}
