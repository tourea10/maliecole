@extends('layouts.appBackend')

@section('titre_Page', "Les Paramètres de l'application")

@section('titre_Contenu', "Les Paramètres de l'application")

@section('Contenu')

    <div class="container mx-auto mt-4">
        <h3>Enregistrer le reste des informations du personnel</h3>
    </div>
    <div class="container  mx-auto mt-3 pb-3">
        <div class="card bg-white p-3">
            <div class="card-body">
                <div class="mb-3">
                    <span class="text-gray">Nom Complet</span><br>
                    <span class="fw-bold fs-5">{{ $user->name }}</span>
                    <hr>
                </div>

                <form action="{{ route('admin.parametres.personnel.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- pour recuper l'id d'user et lier aux details des infos personnel --}}
                    <input type="hidden" name="user_id" value="{{ $user->id }}">

                    {{-- Insertion du formulaire de creation/modification des ecoles --}}
                    @include('backend.parametre.personnel._formulairePersonnel')

                </form>
            </div>
        </div>
    </div>

@endsection
