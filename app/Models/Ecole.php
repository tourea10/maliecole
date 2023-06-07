<?php

namespace App\Models;

use App\Models\Academie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ecole extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_complet',
        'sigle',
        'logo',
        'slogan',
        'adresse',
        'type_ecole',
        'telephone',
        'email',
        'academie_id',
    ];

    /**
     * Get the academie that owns the Ecole
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function academie(): BelongsTo
    {
        return $this->belongsTo(Academie::class, 'academie_id', 'id');
    }
}
