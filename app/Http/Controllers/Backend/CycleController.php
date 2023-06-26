<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cycle;
use Illuminate\Http\Request;

class CycleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cycles = Cycle::latest()->get();
        return view('backend.parametre.cycle.index', compact('cycles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cycle = new Cycle();
        return view('backend.parametre.cycle.create', compact('cycle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'libelle' => 'required|string',
            'sigle' => 'required|string',
            'nombreAnnee' => 'required|integer',
            'description' => 'nullable|string|max:100',
        ]);

        Cycle::create([
            'libelle' => $request->libelle,
            'sigle' => $request->sigle,
            'nombreAnnee' => $request->nombreAnnee,
            'description' => $request->description,
        ]);

        return to_route('admin.parametres.cycle.index')->with('message', 'Cycle enregistré avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cycle = Cycle::findOrFail($id);
        return view('backend.parametre.cycle.show', compact('cycle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cycle = Cycle::findOrFail($id);
        return view('backend.parametre.cycle.edit', compact('cycle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'libelle' => 'required|string',
            'sigle' => 'required|string',
            'nombreAnnee' => 'required|integer',
            'description' => 'nullable|string|max:100',
        ]);

        $cycle = Cycle::findOrFail($id);

        $cycle->update([
            'libelle' => $request->libelle,
            'sigle' => $request->sigle,
            'nombreAnnee' => $request->nombreAnnee,
            'description' => $request->description,
        ]);

        return to_route('admin.parametres.cycle.index')->with('message', 'Cycle modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cycle = Cycle::findOrFail($id);
        $cycle->delete();
        return to_route('admin.parametres.cycle.index')->with('message', 'Cycle supprimé avec succès !');
    }
}
