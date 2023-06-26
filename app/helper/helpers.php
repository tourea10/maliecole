<?php

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
