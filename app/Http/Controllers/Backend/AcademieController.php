<?php

namespace App\Http\Controllers\Backend;

use App\Models\Academie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AcademieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academies = Academie::latest()->paginate(5);
        return view('backend.parametre.academie.index', compact('academies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'sigle' => 'required|string',
            'libelle' => 'required|string',
        ]);

        Academie::create([
            'sigle' => $request->sigle,
            'libelle' => $request->libelle,
        ]);

        return to_route('admin.parametres.academie.index')->with('message', 'Academie enregistré avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $academie = Academie::find($id);
        $academie->delete();

        return to_route('admin.parametres.academie.index')->with('message', 'Academie supprimée avec succès !');
    }
}
