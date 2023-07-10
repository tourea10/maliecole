@extends('layouts.appBackend')

@section('titre_Page', "Les Professeurs de l'Ecole")

@section('titre_Contenu', "Les Professeurs de l'Ecole")

@section('Contenu')

    <div class="container mx-auto mt-4">
        <h3>Modifier les infos d'un Professeur</h3>
    </div>
    <div class="container  mx-auto mt-3 pb-3">
        <div class="card bg-white p-3">
            <div class="card-body">
                <form action="{{ route('professeur.update', $professeur->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- pour recuper l'id de l'ecole et lier aux professeurs --}}
                    <input type="hidden" name="ecole_id" value="{{ $ecoleId }}">

                    {{-- Insertion du formulaire de creation/modification des professeur --}}
                    @include('backend.professeur._formulaireProfesseur')

                </form>
            </div>
        </div>
    </div>

@endsection
