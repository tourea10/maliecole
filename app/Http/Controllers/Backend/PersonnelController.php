<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\PersonnelFormRequest;
use App\Models\DetailsPersonnel;
use App\Models\Ecole;
use App\Models\User;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personnels = User::where('statut', 'personnel_ecole')->get();
        return view('backend.parametre.personnel.index', compact('personnels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonnelFormRequest $request)
    {
        $personnelValide = $request->validated();
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $personnelValide['photo'] = enregistrerImage($file, 'personnel');
        } else {
            $personnelValide['photo'] = null;
        }

        DetailsPersonnel::create([
            'sexe' => $personnelValide['sexe'],
            'dateNaissance' => $personnelValide['dateNaissance'],
            'lieuNaissance' => $personnelValide['lieuNaissance'],
            'contact' => $personnelValide['contact'],
            'photo' => $personnelValide['photo'],
            'adresse' => $personnelValide['adresse'],
            'poste' => $personnelValide['poste'],
            'groupeSanguin' => $personnelValide['groupeSanguin'],
            'signeParticulier' => $personnelValide['signeParticulier'],
            'user_id' => $personnelValide['user_id'],
            'ecole_id' => $personnelValide['ecole_id'],
        ]);

        return to_route('admin.parametres.personnel.index')->with('message', 'le reste des informations du personnel est enregistré avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $personnel = User::where('id', $id)->where('statut', 'personnel_ecole')->first();
        $detailPersonnel = DetailsPersonnel::where('user_id', $personnel->id)->first();
        // $personnel = User::with('detailsPersonnel')->find($id);
        // dd($detailPersonnel->dateNaissance);
        return view('backend.parametre.personnel.show', compact('personnel', 'detailPersonnel'));
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
        //
    }

    function creerPersonnel($id)
    {
        $user = User::findOrFail($id);
        // dd($user);
        $personnel = new DetailsPersonnel();
        $ecoles = Ecole::all();
        return view('backend.parametre.personnel.create', compact('personnel', 'ecoles', 'user'));
    }
}
