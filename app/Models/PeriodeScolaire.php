<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodeScolaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'numeroPeriode',
        'mois',
        'periode',
        'annee_scolaire_id',
    ];
}
