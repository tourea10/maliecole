@extends('layouts.appBackend')

@section('titre_Page', "Les Classes de l'application")

@section('titre_Contenu', 'Gestion des Classes')

@section('Contenu')

    <div class="container mx-auto mt-4">
        <h3>Enregistrer une nouvelle Classe de l'année: <span class="text-primary">{{ anneeEnCours() }}</span></h3>
    </div>
    <div class="container  mx-auto mt-3 pb-3">
        <div class="card bg-white p-3">
            <div class="card-body">
                <form action="{{ route('classe.store') }}" method="post">
                    @csrf

                    {{-- Insertion du formulaire de creation/modification des Classes --}}
                    @include('backend.classe._formulaireClasse')

                    <input type="number" name="anneeScolaire_id" hidden value="{{ idAnneeEnCours() }}">

                </form>
            </div>
        </div>
    </div>

@endsection
