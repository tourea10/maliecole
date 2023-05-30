<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Academie;
use Illuminate\Http\Request;

class ParametreController extends Controller
{
    public function lesAcademies()
    {
        $academies = Academie::latest()->paginate(5);
        return view('backend.parametre.academies', compact('academies'));
    }

    public function enregistrerAcademie(Request $request)
    {
        $this->validate($request, [
            'sigle' => 'required|string',
            'libelle' => 'required|string',
        ]);

        Academie::create([
            'sigle' => $request->sigle,
            'libelle' => $request->libelle,
        ]);

        return to_route('admin.lesAcademies')->with('message', 'Academie enregistré avec succès !');
    }
}
