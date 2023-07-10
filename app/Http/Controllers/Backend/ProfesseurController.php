<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProfesseurFormRequest;
use App\Models\Discipline;
use App\Models\Professeur;
use Auth;
use Illuminate\Http\Request;

class ProfesseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professeurs = Professeur::paginate(2);
        return view('backend.professeur.index', compact('professeurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $professeur = new Professeur();
        $ecoleId = Auth::user()->detailsPersonnel->ecole_id;
        $disciplines = Discipline::all();
        return view('backend.professeur.create', compact('professeur', 'ecoleId', 'disciplines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfesseurFormRequest $request)
    {
        // $request->dd();
        $professeurValide = $request->validated();
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $professeurValide['photo'] = enregistrerImage($file, 'professeur');
        } else {
            $professeurValide['photo'] = null;
        }

        Professeur::create([
            'prenom' => $professeurValide['prenom'],
            'nom' => $professeurValide['nom'],
            'sexe' => $professeurValide['sexe'],
            'dateNaissance' => $professeurValide['dateNaissance'],
            'lieuNaissance' => $professeurValide['lieuNaissance'],
            'contact' => $professeurValide['contact'],
            'email' => $professeurValide['email'],
            'photo' => $professeurValide['photo'],
            'adresse' => $professeurValide['adresse'],
            'groupeSanguin' => $professeurValide['groupeSanguin'],
            'signeParticulier' => $professeurValide['signeParticulier'],
            'discipline_id' => $professeurValide['discipline_id'],
            'ecole_id' => $professeurValide['ecole_id'],
        ]);

        return to_route('professeur.index')->with('message', 'Professeur enregistré avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Professeur $professeur)
    {
        return view('backend.professeur.show', compact('professeur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Professeur $professeur)
    {
        $ecoleId = Auth::user()->detailsPersonnel->ecole_id;
        $disciplines = Discipline::all();
        return view('backend.professeur.edit', compact('professeur', 'ecoleId', 'disciplines'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfesseurFormRequest $request, Professeur $professeur)
    {
        // $request->dd();

        $professeurValide = $request->validated();

        // Suppression de l'ancienne photo d'abord
        if ($professeur->photo) {
            supprimerImage('professeur', $professeur->photo);
        }

        // Ajout de la nouvelle image
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $professeurValide['photo'] = enregistrerImage($file, 'professeur');
        } else {
            $professeurValide['photo'] = null;
        }

        $professeur->update([
            'prenom' => $professeurValide['prenom'],
            'nom' => $professeurValide['nom'],
            'sexe' => $professeurValide['sexe'],
            'dateNaissance' => $professeurValide['dateNaissance'],
            'lieuNaissance' => $professeurValide['lieuNaissance'],
            'contact' => $professeurValide['contact'],
            'email' => $professeurValide['email'],
            'photo' => $professeurValide['photo'],
            'adresse' => $professeurValide['adresse'],
            'groupeSanguin' => $professeurValide['groupeSanguin'],
            'signeParticulier' => $professeurValide['signeParticulier'],
            'discipline_id' => $professeurValide['discipline_id'],
            'ecole_id' => $professeurValide['ecole_id'],
        ]);

        return to_route('professeur.index')->with('message', 'Professeur modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Professeur $professeur)
    {
        if ($professeur->photo) {
            supprimerImage('professeur', $professeur->photo);
        }

        $professeur->delete();

        return to_route('professeur.index')->with('message', 'Professeur supprimé avec succès');
    }
}
