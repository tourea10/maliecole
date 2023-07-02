@extends('layouts.appBackend')

@section('titre_Page', "Les Paramètres de l'application")

@section('titre_Contenu', "Les Paramètres de l'application")

@section('Contenu')

    <div class="container mx-auto mt-4">
        <h3>Modifier les informations du Années</h3>
    </div>
    <div class="container  mx-auto mt-3 pb-3">
        <div class="card bg-white p-3">
            <div class="card-body">
                <form action="{{ route('admin.parametres.periode-scolaire.update', $periode->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    {{-- Insertion du formulaire de creation/modification des Periode scolaires --}}
                    @include('backend.parametre.periodeScolaire._formulaireperiodeScolaire')

                </form>
            </div>
        </div>
    </div>

@endsection
