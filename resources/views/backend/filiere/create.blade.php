@extends('layouts.appBackend')

@section('titre_Page', "Les Filières de l'application")

@section('titre_Contenu', 'Gestion des Filières')

@section('Contenu')

    <div class="container mx-auto mt-4">
        <h3>Enregistrer une nouvelle Filière</h3>
    </div>
    <div class="container  mx-auto mt-3 pb-3">
        <div class="card bg-white p-3">
            <div class="card-body">
                <form action="{{ route('filiere.store') }}" method="post">
                    @csrf

                    {{-- Insertion du formulaire de creation/modification des filieres --}}
                    @include('backend.filiere._formulaireFiliere')

                </form>
            </div>
        </div>
    </div>

@endsection
