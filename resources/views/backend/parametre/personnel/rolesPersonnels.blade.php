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
                <div class="row justify-content-between gap-md-3 gap-sm-2 px-md-5 px-sm-2">
                    @if ($detailPersonnel)
                        @if ($detailPersonnel->photo)
                            <div class="col-md-4 col-sm-12">
                                <div class="img_div w-100">
                                    <img src="{{ url('storage/personnel/' . $detailPersonnel->photo) }}" class="w-100"
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
                                @if ($detailPersonnel)
                                    @if ($detailPersonnel->sexe == 'homme')
                                        M.
                                    @else
                                        Mme.
                                    @endif
                                @endif
                                {{ $personnel->name }}
                            </span>
                        </div>
                        <div class="mb-3">
                            <span class="text-gray">Email</span><br>
                            <span class="fw-bold fs-5">{{ $personnel->email }}</span>
                        </div>
                        @if ($detailPersonnel)
                            <div class="mb-3">
                                <span class="text-gray">Contact</span><br>
                                <span class="fw-bold fs-5">{{ $detailPersonnel->contact }}</span>
                            </div>
                            <div class="mb-3">
                                <span class="text-gray">Poste Occupé</span><br>
                                <span class="fw-bold fs-5">{{ $detailPersonnel->poste }}</span>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col bg-gray py-1">
                            <span class="fw-bold fs-5">Gestion des Rôles et Permissions :</span>
                        </div>
                    </div>
                    <form action="{{ route('admin.parametres.enregistrerRolePersonnel') }}" method="post">
                        @csrf
                        <div class="row">

                            <div class="col">
                                <span class="fw-bold fs-5">Les Rôles:</span>
                                {{-- <input type="checkbox" name="role" id=""> --}}
                                <div class="row ms-md-1 mt-md-3">
                                    @forelse ($roles as $key => $value)
                                        <p>
                                            <input type="checkbox"
                                                @foreach ($personnel->getRoleNames() as $indice => $donne)
                                                @if ($donne == $value) checked @endif @endforeach
                                                name="role[{{ $value }}]">
                                            {{ $value }}
                                        </p>
                                        {{-- <p><input type="checkbox" name="role[{{ $value }}]" id="">
                                            {{ $value }}</p> --}}
                                    @empty
                                        <p>Pas d'element</p>
                                    @endforelse
                                </div>
                            </div>

                            <div class="col ms-md-5">
                                <span class="fw-bold fs-5">Les Permissions :</span>
                                <div class="row ms-md-1 mt-md-3">
                                    @forelse ($permissions as $ke => $val)
                                        <p>
                                            <input type="checkbox"
                                                @foreach ($personnel->getPermissionNames() as $index => $valeur)
                                                @if ($valeur == $val) checked @endif @endforeach
                                                name="permission[{{ $val }}]">
                                            {{ $val }} des élèves
                                        </p>
                                    @empty
                                    @endforelse
                                </div>


                                <input type="number" name="user_id" value="{{ $personnel->id }}" hidden>
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-primary mx-auto w-50">Valider</button>
                        </div>
                    </form>
                @else
                    <div class="mb-3">
                        <a class="text-primary d-flex fw-bold"
                            href="{{ route('admin.parametres.creerPersonnel', $personnel->id) }}">enregistrer les
                            details</a>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
