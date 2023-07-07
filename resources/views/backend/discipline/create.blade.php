@extends('layouts.appBackend')

@section('titre_Page', "Les Disciplines de l'application")

@section('titre_Contenu', 'Gestion des Disciplines')

@section('Contenu')

    <div class="container mx-auto mt-4">
        <h3>Enregistrer une nouvelle Discipline</h3>
    </div>
    <div class="container  mx-auto mt-3 pb-3">
        <div class="card bg-white p-3">
            <div class="card-body">
                <form action="{{ route('discipline.store') }}" method="post">
                    @csrf

                    {{-- Insertion du formulaire de creation/modification des disciplines --}}
                    @include('backend.discipline._formulaireDiscipline')

                </form>
            </div>
        </div>
    </div>

@endsection
