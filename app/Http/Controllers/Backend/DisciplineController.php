<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\discipline;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $disciplines = discipline::all();
        return view('backend.discipline.index', compact('disciplines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $discipline = new discipline();
        return view('backend.discipline.create', compact('discipline'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->dd();
        $this->validate($request, [
            'sigle' => 'nullable|string',
            'libelle' => 'required|string',
            'type' => 'required|string',
        ]);

        discipline::create([
            'sigle' => $request->sigle,
            'libelle' => $request->libelle,
            'type' => $request->type,
        ]);

        return to_route('discipline.index')->with('message', 'Discipline enregistrée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(discipline $discipline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(discipline $discipline)
    {
        return view('backend.discipline.edit', compact('discipline'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, discipline $discipline)
    {
        $this->validate($request, [
            'sigle' => 'nullable|string',
            'libelle' => 'required|string',
            'type' => 'required|string',
        ]);

        $discipline->update([
            'sigle' => $request->sigle,
            'libelle' => $request->libelle,
            'type' => $request->type,
        ]);

        return to_route('discipline.index')->with('message', 'Discipline modifiée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(discipline $discipline)
    {
        $discipline->delete();
        return to_route('discipline.index')->with('message', 'Discipline supprimée avec succès !');
    }
}
