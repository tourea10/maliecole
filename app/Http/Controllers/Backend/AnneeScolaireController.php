<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AnneeScolaire;
use Illuminate\Http\Request;

class AnneeScolaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $annees = AnneeScolaire::latest()->get();
        return view('backend.parametre.anneeScolaire.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $annee = new AnneeScolaire();
        return view('backend.parametre.anneeScolaire.create', compact('annee'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'libelle' => 'required|string',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date|after:dateDebut',
        ]);

        AnneeScolaire::create([
            'libelle' => $request->libelle,
            'dateDebut' => $request->dateDebut,
            'dateFin' => $request->dateFin,
        ]);

        return to_route('admin.parametres.annee-scolaire.index')->with('message', 'Année Scolaire enregistré avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $annee = AnneeScolaire::findOrFail($id);
        // dd($annee);
        return view('backend.parametre.anneeScolaire.edit', compact('annee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'libelle' => 'required|string',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date|after:dateDebut',
        ]);

        $annee = AnneeScolaire::findOrFail($id);

        $annee->update([
            'libelle' => $request->libelle,
            'dateDebut' => $request->dateDebut,
            'dateFin' => $request->dateFin,
        ]);

        return to_route('admin.parametres.annee-scolaire.index')->with('message', 'Année Scolaire modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $annee = AnneeScolaire::findOrFail($id);

        $annee->delete();

        return to_route('admin.parametres.annee-scolaire.index')->with('message', 'Année Scolaire supprimé avec succès !');
    }
}
