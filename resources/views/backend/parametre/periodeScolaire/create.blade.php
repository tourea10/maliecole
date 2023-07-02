@extends('layouts.appBackend')

@section('titre_Page', "Les Paramètres de l'application")

@section('titre_Contenu', "Les Paramètres de l'application")

@section('Contenu')

    <div class="container mx-auto mt-4">
        <h3>Enregistrer les Periode Scolaires de <span class="text-primary fw-bold">{{ anneeEncours() }}</span></h3>
    </div>
    <div class="container  mx-auto mt-3 pb-3">
        <div class="card bg-white p-3">
            <div class="card-body">
                <form action="{{ route('admin.parametres.periode-scolaire.store') }}" method="post">
                    @csrf

                    {{-- Insertion du formulaire de creation/modification des Periode scolaire --}}
                    @include('backend.parametre.periodeScolaire._formulaireperiodeScolaire')

                    {{-- Insertion de l'ID de l'année en cours pour la creation des periodes --}}
                    <input type="number" name="annee_scolaire_id" hidden value="{{ idAnneeEnCours() }}">

                </form>
            </div>
        </div>
    </div>

@endsection
