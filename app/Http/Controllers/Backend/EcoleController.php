<?php

namespace App\Http\Controllers\Backend;

use App\Models\Ecole;
use App\Models\Academie;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\EcoleFormRequest;

class EcoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ecoles = Ecole::latest()->paginate(5);
        return view('backend.parametre.ecole.index', compact('ecoles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ecole = new Ecole();
        $academies = Academie::all();
        return view('backend.parametre.ecole.create', compact('academies', 'ecole'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EcoleFormRequest $request)
    {
        $ecoleValide = $request->validated();
        // dd($ecoleValide);
        if ($request->hasFile('logo')) {
            $extension = $request->file('logo')->getClientOriginalExtension();
            $img_logo = 'logo_' . time() . '.' . $extension;
            $request->file('logo')->storeAs('logo', $img_logo, 'public');
            $ecoleValide['logo'] = $img_logo;
        } else {
            $ecoleValide['logo'] = null;
        }

        Ecole::create([
            'nom_complet' => $ecoleValide['nom_complet'],
            'sigle' => $ecoleValide['sigle'],
            'logo' => $ecoleValide['logo'],
            'slogan' => $ecoleValide['slogan'],
            'adresse' => $ecoleValide['adresse'],
            'type_ecole' => $ecoleValide['type_ecole'],
            'telephone' => $ecoleValide['telephone'],
            'email' => $ecoleValide['email'],
            'academie_id' => $ecoleValide['academie_id'],
        ]);

        return to_route('admin.parametres.ecole.index')->with('message', "Ecole enregistrée avec succès");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ecole = Ecole::findOrFail($id);
        // dd($ecole);
        return view('backend.parametre.ecole.show', compact('ecole'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ecole = Ecole::findOrFail($id);
        // dd($ecole);
        $academies = Academie::all();
        return view('backend.parametre.ecole.edit', compact('academies', 'ecole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EcoleFormRequest $request, string $id)
    {
        $ecoleValide = $request->validated();
        $ecole = Ecole::findOrFail($id);

        // Suppression de l'ancien logo d'abord
        if ($ecole->logo) {
            Storage::disk('public')->delete('logo/' . $ecole->logo);
        }

        if ($request->hasFile('logo')) {
            $extension = $request->file('logo')->getClientOriginalExtension();
            $img_logo = 'logo_' . time() . '.' . $extension;
            $request->file('logo')->storeAs('logo', $img_logo, 'public');
            $ecoleValide['logo'] = $img_logo;
        } else {
            $ecoleValide['logo'] = null;
        }

        $ecole->update([
            'nom_complet' => $ecoleValide['nom_complet'],
            'sigle' => $ecoleValide['sigle'],
            'logo' => $ecoleValide['logo'],
            'slogan' => $ecoleValide['slogan'],
            'adresse' => $ecoleValide['adresse'],
            'type_ecole' => $ecoleValide['type_ecole'],
            'telephone' => $ecoleValide['telephone'],
            'email' => $ecoleValide['email'],
            'academie_id' => $ecoleValide['academie_id'],
        ]);

        return to_route('admin.parametres.ecole.index')->with('message', "Ecole modifiée avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ecole = Ecole::findOrFail($id);

        // Suppression de l'ancien logo d'abord
        Storage::disk('public')->delete('logo/' . $ecole->logo);

        $ecole->delete();

        return to_route('admin.parametres.ecole.index')->with('message', "Ecole supprimée avec succès");
    }
}