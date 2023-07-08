@extends('layouts.appBackend')

@section('titre_Page', "Les Matières de l'application")

@section('titre_Contenu', 'Gestion des Matières')

@section('Contenu')

    <div class="container mx-auto mt-4">
        <h3>Enregistrer une nouvelle Matière</h3>
    </div>
    <div class="container  mx-auto mt-3 pb-3">
        <div class="card bg-white p-3">
            <div class="card-body">
                <form action="{{ route('matiere.store') }}" method="post">
                    @csrf

                    {{-- Insertion du formulaire de creation/modification des matieres --}}
                    @include('backend.matiere._formulaireMatiere')

                </form>
            </div>
        </div>
    </div>

@endsection
