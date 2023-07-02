<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\PeriodeScolaire;
use App\Http\Controllers\Controller;

class PeriodeScolaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $periodeScolaires = PeriodeScolaire::latest()->get();
        $periodeScolaires = PeriodeScolaire::latest()->where('annee_scolaire_id', idAnneeEnCours())->get();
        return view('backend.parametre.periodeScolaire.index', compact('periodeScolaires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $periode = new PeriodeScolaire();
        return view('backend.parametre.periodeScolaire.create', compact('periode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'numeroPeriode' => 'required|string',
            'mois' => 'required|string',
            'periode' => 'required|string',
            'annee_scolaire_id' => 'required|integer',
        ]);

        PeriodeScolaire::create([
            'numeroPeriode' => $request->numeroPeriode,
            'mois' => $request->mois,
            'periode' => $request->periode,
            'annee_scolaire_id' => $request->annee_scolaire_id,
        ]);

        return to_route('admin.parametres.periode-scolaire.index')->with('message', 'Periode enregistrée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $periodeScolaire = PeriodeScolaire::findOrFail($id);
        // dd($periodeScolaire);
        return view('backend.parametre.periodeScolaire.show', compact('periodeScolaire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $periode = PeriodeScolaire::findOrFail($id);
        return view('backend.parametre.periodeScolaire.edit', compact('periode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'numeroPeriode' => 'required|string',
            'mois' => 'required|string',
            'periode' => 'required|string',
            // 'annee_scolaire_id' => 'required|integer',
        ]);

        $periode = PeriodeScolaire::findOrFail($id);

        $periode->update([
            'numeroPeriode' => $request->numeroPeriode,
            'mois' => $request->mois,
            'periode' => $request->periode,
            // 'annee_scolaire_id' => $request->annee_scolaire_id,
        ]);

        return to_route('admin.parametres.periode-scolaire.index')->with('message', 'Periode modifiée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $periode = PeriodeScolaire::findOrFail($id);

        $periode->delete();

        return to_route('admin.parametres.periode-scolaire.index')->with('message', 'Periode suprimée avec succès !');
    }
}
