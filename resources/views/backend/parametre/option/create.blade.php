@extends('layouts.appBackend')

@section('titre_Page', "Les Paramètres de l'application")

@section('titre_Contenu', "Les Paramètres de l'application")

@section('Contenu')

    <div class="container mx-auto mt-4">
        <h3>Enregistrer les informations de l'école</h3>
    </div>
    <div class="container  mx-auto mt-3 pb-3">
        <div class="card bg-white p-3">
            <div class="card-body">
                <form action="{{ route('admin.parametres.option.store') }}" method="post">
                    @csrf

                    {{-- Insertion du formulaire de creation/modification des options --}}
                    @include('backend.parametre.option._formulaireOption')

                </form>
            </div>
        </div>
    </div>

@endsection
