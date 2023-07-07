<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Filiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'sigle',
        'libelle',
        'type',
        'description',
        'cycle_id',
        'option_id',
    ];

    function cycle(): BelongsTo
    {
        return $this->belongsTo(Cycle::class);
    }

    function option(): BelongsTo
    {
        return $this->belongsTo(Option::class);
    }
}
