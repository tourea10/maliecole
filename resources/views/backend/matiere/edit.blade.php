@extends('layouts.appBackend')

@section('titre_Page', "Les Matieres de l'application")

@section('titre_Contenu', 'Gestion des Matieres')

@section('Contenu')

    <div class="container mx-auto mt-4">
        <h3>Modifier les informations de la Matiere</h3>
    </div>
    <div class="container  mx-auto mt-3 pb-3">
        <div class="card bg-white p-3">
            <div class="card-body">
                <form action="{{ route('matiere.update', $matiere->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    {{-- Insertion du formulaire de creation/modification des matiere --}}
                    @include('backend.matiere._formulaireMatiere')


                </form>
            </div>
        </div>
    </div>

@endsection
