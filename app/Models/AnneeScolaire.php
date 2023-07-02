<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnneeScolaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'dateDebut',
        'dateFin',
        'estActive',
    ];

    protected $casts = [
        'dateDebut' => 'datetime',
        'dateFin' => 'datetime',
    ];
}
