<?php

// use DateTime;

use App\Models\AnneeScolaire;
use Illuminate\Support\Facades\Storage;

// Pour Enregistrer une image dans le dossier public
if (!function_exists('enregistrerImage')) {

    function enregistrerImage($file, $pathName): string
    {
        $extension = $file->getClientOriginalExtension();
        $img_name = $pathName . '_' . time() . '.' . $extension;
        $file->storeAs($pathName, $img_name, 'public');
        return $img_name;
    }
}

// Pour supprimer une image du dossier public
if (!function_exists('supprimerImage')) {

    function supprimerImage(string $pathName, $name)
    {
        $pathComplet = $pathName . '/' . $name;
        Storage::disk('public')->delete($pathComplet);
    }
}

// Pour formater les dates
if (!function_exists('dateFormater')) {

    function dateFormater(DateTime $date)
    {
        return $date->format('d-m-Y');
    }
}

// Pour recuperer le libelle de l'annee en cours
if (!function_exists('anneeEnCours')) {

    function anneeEnCours(): string
    {
        $anneeActive = AnneeScolaire::where('estActive', true)->first();
        return $anneeActive->libelle;
    }
}

// Pour recuperer l'id de l'annee en cours
if (!function_exists('idAnneeEnCours')) {

    function idAnneeEnCours(): int
    {
        $anneeActive = AnneeScolaire::where('estActive', true)->first();
        return $anneeActive->id;
    }
}