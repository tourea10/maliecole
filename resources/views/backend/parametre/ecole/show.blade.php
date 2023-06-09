@extends('layouts.appBackend')

@section('titre_Page', "Les Paramètres de l'application")

@section('titre_Contenu', "Les Paramètres de l'application")

@section('Contenu')

    <div class="container mx-auto mt-4">
        <h3>Enregistrer les informations de l'école</h3>
    </div>
    <div class="container  mx-auto mt-3 pb-3">
        <div class="card bg-white p-md-3">
            <div class="card-body">
                <div class="row justify-content-between gap-md-5 gap-sm-2 px-md-5 px-sm-2">
                    @if ($ecole->logo)
                        <div class="col-md-4 col-sm-12">
                            <div class="img_div w-100">
                                <img src="{{ url('storage/logo/' . $ecole->logo) }}" class="w-100" alt="logo de l'école">
                            </div>
                        </div>
                    @endif
                    <div class="col">
                        <div class="mb-2">
                            <span class="text-gray">Nom Complet de l'école</span><br>
                            <span class="fw-bold fs-3">{{ $ecole->nom_complet }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="text-gray">Le Sigle</span><br>
                            <span class="fw-bold fs-4">{{ $ecole->sigle }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="text-gray">Le Slogan</span><br>
                            <span class="fw-bold fs-4">{{ $ecole->slogan }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="text-gray">Type de l'école</span><br>
                            <span class="fw-bold fs-4">{{ $ecole->type_ecole }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="text-gray">Contacts</span><br>
                            <span class="fw-bold fs-4"><i class="fa-solid fa-phone"></i> :
                                {{ $ecole->telephone }}</span><br>
                            <span class="fw-bold fs-4"><i class="fa-solid fa-envelope-open-text"></i> :
                                {{ $ecole->email }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="text-gray">Academie</span><br>
                            <span class="fw-bold fs-4">{{ $ecole->academie->libelle }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="text-gray">Adresse</span><br>
                            <span class="fw-bold fs-4">{{ $ecole->adresse }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
