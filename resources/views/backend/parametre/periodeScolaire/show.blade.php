@extends('layouts.appBackend')

@section('titre_Page', "Les Paramètres de l'application")

@section('titre_Contenu', "Les Paramètres de l'application")

@section('Contenu')

    <div class="container mx-auto mt-4">
        <h3>Année Scolaire : <span class="fw-bold text-primary">{{ anneeEnCours() }}</span></h3>
    </div>
    <div class="container  mx-auto mt-3 pb-3">
        <div class="card bg-white">
            <div class="card-body">
                <div class="row gap-md-2 gap-sm-2 px-md-5 px-sm-2">
                    <div class="row d-flex align-items-baseline">
                        <div class="col-md-3"><span class="text-gray fs-4">Le Mois</span></div>
                        <div class="col"><span class="fw-bold fs-3">{{ $periodeScolaire->mois }}</span></div>
                    </div>
                    <div class="row d-flex align-items-baseline">
                        <div class="col-md-3"><span class="text-gray fs-4">Le Numero</span></div>
                        <div class="col"><span class="fw-bold fs-4">{{ $periodeScolaire->numeroPeriode }}</span></div>
                    </div>
                    <div class="row d-flex align-items-baseline">
                        <div class="col-md-3"><span class="text-gray fs-4">La Periode</span><br></div>
                        <div class="col"><span class="fw-bold fs-4">{{ $periodeScolaire->periode }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
