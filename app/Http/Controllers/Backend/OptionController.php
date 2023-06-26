<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $options = Option::latest()->get();
        return view('backend.parametre.option.index', compact('options'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $option = new Option();
        return view('backend.parametre.option.create', compact('option'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'libelle' => 'required|string',
            'sigle' => 'required|string',
            'description' => 'required|string|max:100',
        ]);

        Option::create([
            'libelle' => $request->libelle,
            'sigle' => $request->sigle,
            'description' => $request->description,
        ]);

        return to_route('admin.parametres.option.index')->with('message', 'Option enregistrée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $option = Option::findOrFail($id);
        return view('backend.parametre.option.show', compact('option'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $option = Option::findOrFail($id);
        return view('backend.parametre.option.edit', compact('option'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'libelle' => 'required|string',
            'sigle' => 'required|string',
            'description' => 'required|string|max:100',
        ]);

        $option = Option::findOrFail($id);

        $option->update([
            'libelle' => $request->libelle,
            'sigle' => $request->sigle,
            'description' => $request->description,
        ]);

        return to_route('admin.parametres.option.index')->with('message', 'Option modifiée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $option = Option::findOrFail($id);
        $option->delete();
        return to_route('admin.parametres.option.index')->with('message', 'Option supprimée avec succès !');
    }
}
