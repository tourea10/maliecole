@extends('layouts.appBackend')

@section('titre_Page', "Les Paramètres de l'application")

@section('titre_Contenu', "Les Paramètres de l'application")

@section('Contenu')

    <div class="container mx-auto mt-4">
        <h3>Enregistrer les Années Scolaires de l'école</h3>
    </div>
    <div class="container  mx-auto mt-3 pb-3">
        <div class="card bg-white p-3">
            <div class="card-body">
                <form action="{{ route('admin.parametres.annee-scolaire.store') }}" method="post">
                    @csrf

                    {{-- Insertion du formulaire de creation/modification des Annee scolaire --}}
                    @include('backend.parametre.anneeScolaire._formulaireanneeScolaire')

                </form>
            </div>
        </div>
    </div>

@endsection
