<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cycle;
use App\Models\Filiere;
use App\Models\Option;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filieres = Filiere::all();
        return view('backend.filiere.index', compact('filieres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filiere = new Filiere();
        $cycles = Cycle::all();
        $options = Option::all();
        // $cycles->dd();
        return view('backend.filiere.create', compact('filiere', 'cycles', 'options'));
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
            'type' => 'required|string',
            'description' => 'required|string',
            'cycle_id' => 'required|integer',
            'option_id' => 'required|integer',
        ]);

        Filiere::create([
            'sigle' => $request->sigle,
            'libelle' => $request->libelle,
            'type' => $request->type,
            'description' => $request->description,
            'cycle_id' => $request->cycle_id,
            'option_id' => $request->option_id,
        ]);

        return to_route('filiere.index')->with('message', 'Filière enregistrée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Filiere $filiere)
    {
        return view('backend.filiere.show', compact('filiere'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Filiere $filiere)
    {
        $cycles = Cycle::all();
        $options = Option::all();
        return view('backend.filiere.edit', compact('filiere', 'options', 'cycles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Filiere $filiere)
    {
        $this->validate($request, [
            'sigle' => 'required|string',
            'libelle' => 'required|string',
            'type' => 'required|string',
            'description' => 'required|string',
            'cycle_id' => 'required|integer',
            'option_id' => 'required|integer',
        ]);

        $filiere->update([
            'sigle' => $request->sigle,
            'libelle' => $request->libelle,
            'type' => $request->type,
            'description' => $request->description,
            'cycle_id' => $request->cycle_id,
            'option_id' => $request->option_id,
        ]);

        return to_route('filiere.index')->with('message', 'Filière modifiée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filiere $filiere)
    {
        $filiere->delete();
        return to_route('filiere.index')->with('message', 'Filière supprimée avec succès !');
    }
}
