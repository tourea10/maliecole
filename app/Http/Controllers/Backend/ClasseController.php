<?php

namespace App\Http\Controllers\Backend;

use App\Models\classe;
use App\Models\Filiere;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classe::paginate(2);
        return view('backend.classe.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classe = new Classe();
        $filieres = Filiere::all();
        return view('backend.classe.create', compact('classe', 'filieres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->dd();
        $this->validate($request, [
            'sigle' => 'required|string',
            'libelle' => 'required|string',
            'niveau' => 'required|integer',
            'anneeScolaire_id' => 'required|exists:annee_scolaires,id',
            'filiere_id' => 'required|exists:filieres,id',
        ]);

        classe::create([
            'sigle' => $request->sigle,
            'libelle' => $request->libelle,
            'niveau' => $request->niveau,
            'anneeScolaire_id' => $request->anneeScolaire_id,
            'filiere_id' => $request->filiere_id,
        ]);

        return to_route('classe.index')->with('message', 'Classe enregistrée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(classe $classe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(classe $classe)
    {
        $filieres = Filiere::all();
        return view('backend.classe.edit', compact('classe', 'filieres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, classe $classe)
    {
        $this->validate($request, [
            'sigle' => 'required|string',
            'libelle' => 'required|string',
            'niveau' => 'required|integer',
            'anneeScolaire_id' => 'required|exists:annee_scolaires,id',
            'filiere_id' => 'required|exists:filieres,id',
        ]);

        $classe->update([
            'sigle' => $request->sigle,
            'libelle' => $request->libelle,
            'niveau' => $request->niveau,
            'anneeScolaire_id' => $request->anneeScolaire_id,
            'filiere_id' => $request->filiere_id,
        ]);

        return to_route('classe.index')->with('message', 'Classe modifiée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(classe $classe)
    {
        $classe->delete();
        return to_route('classe.index')->with('message', 'Classe supprimée avec succès !');
    }
}
