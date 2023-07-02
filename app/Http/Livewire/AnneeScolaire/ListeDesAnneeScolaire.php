<?php

namespace App\Http\Livewire\AnneeScolaire;

use Livewire\Component;
use App\Models\AnneeScolaire;
use App\Models\PeriodeScolaire;

class ListeDesAnneeScolaire extends Component
{
    function activerAnneeScolaire($id)
    {
        // desactiver d'abord toutes les annees scolaires
        AnneeScolaire::where('estActive', true)->update(['estActive' => false]);

        // activer maintenant uniquement l'annee selectionner
        AnneeScolaire::whereId($id)->update(['estActive' => true]);
    }

    public function render()
    {
        $annees = AnneeScolaire::latest()->get();
        return view('livewire.annee-scolaire.liste-des-annee-scolaire', compact('annees'));
    }
}
