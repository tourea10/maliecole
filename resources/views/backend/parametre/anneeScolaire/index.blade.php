@extends('layouts.appBackend')

@section('titre_Page', "Les Paramètres de l'application")

@section('titre_Contenu', "Les Paramètres de l'application")

@section('Contenu')
    <div class="container mx-auto mt-4">
        <h3>Gestion des Années Scolaires</h3>
    </div>
    <div class="container  mx-auto mt-3">

        {{-- Message d'alert --}}
        @if ($message = Session::get('message'))
            <x-alert type="success" :message="$message" />
        @endif

        <div class="card">

            <div class="card-header">
                <h3 class="card-title fw-bold">
                    <i class="fa-solid fa-school"></i>
                    Les Années Scolaires de l'Ecole
                </h3>
                <div class="card-tools">
                    <a href="{{ route('admin.parametres.annee-scolaire.create') }}" class="btn btn-sm btn-primary me-2">
                        Ajouter une année scolaire
                    </a>
                </div>
            </div>

            {{-- <div class="card-body"> --}}
            @livewire('annee-scolaire.liste-des-annee-scolaire')
            {{-- </div> --}}
        </div>
    </div>


@endsection
