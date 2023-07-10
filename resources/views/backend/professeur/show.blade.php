@extends('layouts.appBackend')

@section('titre_Page', "Les Paramètres de l'application")

@section('titre_Contenu', "Les Paramètres de l'application")

@section('Contenu')

    <div class="container mx-auto mt-4">
        <h3>Les informations du Professeur</h3>
    </div>
    <div class="container  mx-auto mt-3 pb-3">
        <div class="card bg-white p-md-3">
            <div class="card-body">
                <div class="row justify-content-between gap-md-3 gap-sm-2 px-md-5 px-sm-2">
                    @if ($professeur)
                        @if ($professeur->photo)
                            <div class="col-md-4 col-sm-12">
                                <div class="img_div w-100">
                                    <img src="{{ url('storage/professeur/' . $professeur->photo) }}" class="w-100"
                                        alt="Photo de profil">
                                </div>
                            </div>
                        @else
                            <div class="col-md-4 col-sm-12">
                                <div class="img_div w-100">
                                    <img src="{{ url('storage/images/base/profile-default.jpg') }}" class="w-100"
                                        alt="Photo de profil">
                                </div>
                            </div>
                        @endif
                    @endif
                    <div class="col">
                        <div class="mb-3">
                            <span class="text-gray">Nom Complet</span><br>
                            <span class="fw-bold fs-5">
                                @if ($professeur)
                                    @if ($professeur->sexe == 'homme')
                                        M.
                                    @else
                                        Mme.
                                    @endif
                                @endif
                                {{ $professeur->prenom }} {{ $professeur->nom }}
                            </span>
                        </div>
                        <div class="mb-3">
                            <span class="text-gray">Email</span><br>
                            <span class="fw-bold fs-5">{{ $professeur->email }}</span>
                        </div>
                        @if ($professeur)
                            <div class="mb-3">
                                <span class="text-gray">Contact</span><br>
                                <span class="fw-bold fs-5">{{ $professeur->contact }}</span>
                            </div>
                            <div class="mb-3">
                                <span class="text-gray">Spécialité</span><br>
                                <span class="fw-bold fs-5">{{ $professeur->discipline->libelle }}</span>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col bg-gray py-1">
                            <span class="fw-bold fs-5">les informations complementaires :</span>
                        </div>
                    </div>
                    <div class="row ms-md-5 ms-sm-1">
                        <div class="col-md-3 col-sm-12">
                            <span class="text-gray">Date de Naissance :</span>
                        </div>
                        <div class="col">
                            <span class="fw-bold fs-5">
                                @if ($professeur->dateNaissance)
                                    {{ $professeur->dateNaissance->format('d-m-Y') }}
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="row ms-md-5 ms-sm-1">
                        <div class="col-md-3 col-sm-12">
                            <span class="text-gray">Lieu de Naissance :</span>
                        </div>
                        <div class="col">
                            <span class="fw-bold fs-5">{{ $professeur->lieuNaissance }}</span>
                        </div>
                    </div>
                    <div class="row ms-md-5 ms-sm-1">
                        <div class="col-md-3 col-sm-12">
                            <span class="text-gray">Adresse :</span>
                        </div>
                        <div class="col">
                            <span class="fw-bold fs-5">{{ $professeur->adresse }}</span>
                        </div>
                    </div>
                    <div class="row ms-md-5 ms-sm-1">
                        <div class="col-md-3 col-sm-12">
                            <span class="text-gray">Groupe Sanguin :</span>
                        </div>
                        <div class="col">
                            <span class="fw-bold fs-5">{{ $professeur->groupeSanguin }}</span>
                        </div>
                    </div>
                    <div class="row ms-md-5 ms-sm-1">
                        <div class="col-md-3 col-sm-12">
                            <span class="text-gray">Signe particulier :</span>
                        </div>
                        <div class="col">
                            <span class="fw-bold fs-5">{{ $professeur->signeParticulier }}</span>
                        </div>
                    </div>
                @else
                    <div class="mb-3">
                        <a class="text-primary d-flex fw-bold"
                            href="{{ route('admin.parametres.creerprofesseur', $professeur->id) }}">enregistrer les
                            details</a>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
