<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Discipline;
use App\Models\Matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matieres = Matiere::paginate(2);
        return view('backend.matiere.index', compact('matieres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $matiere = new Matiere();
        $classes = Classe::where('anneeScolaire_id', idAnneeEnCours())->paginate(10);
        $disciplines = Discipline::all();
        return view('backend.matiere.create', compact('matiere', 'classes', 'disciplines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->dd();
        $this->validate($request, [
            'classe_id' => 'required|exists:classes,id',
            'discipline_id' => 'required|exists:disciplines,id',
            'coefficient' => 'required|integer',
            'nombreHeure' => 'nullable|integer',
        ]);

        Matiere::create([
            'classe_id' => $request->classe_id,
            'discipline_id' => $request->discipline_id,
            'coefficient' => $request->coefficient,
            'nombreHeure' => $request->nombreHeure,
        ]);

        return to_route('matiere.index')->with('message', 'Matière enregistrée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Matiere $matiere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matiere $matiere)
    {
        $classes = Classe::where('anneeScolaire_id', idAnneeEnCours())->paginate(10);
        $disciplines = Discipline::all();
        return view('backend.matiere.edit', compact('matiere', 'classes', 'disciplines'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matiere $matiere)
    {
        $this->validate($request, [
            'classe_id' => 'required|exists:classes,id',
            'discipline_id' => 'required|exists:disciplines,id',
            'coefficient' => 'required|integer',
            'nombreHeure' => 'nullable|integer',
        ]);

        $matiere->update([
            'classe_id' => $request->classe_id,
            'discipline_id' => $request->discipline_id,
            'coefficient' => $request->coefficient,
            'nombreHeure' => $request->nombreHeure,
        ]);

        return to_route('matiere.index')->with('message', 'Matière modifiée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matiere $matiere)
    {
        $matiere->delete();
        return to_route('matiere.index')->with('message', 'Matière supprimée avec succès !');
    }
}
