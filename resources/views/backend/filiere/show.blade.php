@extends('layouts.appBackend')

@section('titre_Page', "Les Paramètres de l'application")

@section('titre_Contenu', "Les Paramètres de l'application")

@section('Contenu')

    <div class="container mx-auto mt-4">
        <h3>les details de la Filière</h3>
    </div>
    <div class="container  mx-auto mt-3 pb-3">
        <div class="card bg-white p-md-3">
            <div class="card-body">
                <div class="d-flex justify-content-around align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="col"><span class="text-gray me-md-3">Type :</span> <span
                                class="fw-bold fs-4">{{ $filiere->type }}</div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="col"><span class="text-gray me-md-3">Cycle :</span><span
                                class="fw-bold fs-4">{{ $filiere->cycle->sigle }}</div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="col"><span class="text-gray me-md-3">Option :</span><span
                                class="fw-bold fs-4">{{ $filiere->option->sigle }}</div>
                    </div>
                </div>
                <hr>
                <div class="row gap-sm-2 px-md-5 px-sm-2">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-2"><span class="text-gray">Sigle :</span></div>
                        <div class="col"><span class="fw-bold fs-4">{{ $filiere->sigle }}</div>
                    </div>
                    <div class="row d-flex align-items-center">
                        <div class="col-md-2"><span class="text-gray">Libelle :</span></div>
                        <div class="col"><span class="fw-bold fs-4">{{ $filiere->libelle }}</div>
                    </div>
                    <div class="row d-flex align-items-center">
                        <div class="col-md-2"><span class="text-gray">Description :</span></div>
                        <div class="col"><span class="fw-bold fs-4">{{ $filiere->description }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
