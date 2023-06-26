@extends('layouts.appBackend')

@section('titre_Page', "Les Paramètres de l'application")

@section('titre_Contenu', "Les Paramètres de l'application")

@section('Contenu')

    <div class="container mx-auto mt-4">
        <h3>les details de l'option</h3>
    </div>
    <div class="container  mx-auto mt-3 pb-3">
        <div class="card bg-white p-md-3">
            <div class="card-body">
                <div class="row justify-content-between gap-md-5 gap-sm-2 px-md-5 px-sm-2">
                    <div class="col">
                        <div class="mb-3">
                            <span class="text-gray">Le Libelle</span><br>
                            <span class="fw-bold fs-3">{{ $cycle->libelle }}</span>
                        </div>
                        <div class="mb-3">
                            <span class="text-gray">Le Sigle</span><br>
                            <span class="fw-bold fs-4">{{ $cycle->sigle }}</span>
                        </div>
                        <div class="mb-3">
                            <span class="text-gray">Le Nombre d'Année</span><br>
                            <span class="fw-bold fs-4">{{ $cycle->nombreAnnee }}</span>
                        </div>
                        <div class="mb-3">
                            <span class="text-gray">La Description</span><br>
                            <span class="fw-bold fs-4">{{ $cycle->description }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
