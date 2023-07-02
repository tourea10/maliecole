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
                    Les periodes scolaires de l'année : <span>{{ anneeEnCours() }}</span>
                </h3>
                <div class="card-tools">
                    <a href="{{ route('admin.parametres.periode-scolaire.create') }}" class="btn btn-sm btn-primary me-2">
                        Ajouter une periode scolaire
                    </a>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-responsive-sm table-striped">
                    <thead class="table-primary">
                        <tr class="fw-bolder">
                            <td>#</td>
                            <td>N° Periode</td>
                            <td>Periode</td>
                            <td class="text-center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($periodeScolaires as $periodeScolaire)
                            <tr>
                                <td class="py-3">{{ $loop->iteration }}</td>
                                <td class="py-3">{{ $periodeScolaire->numeroPeriode }}</td>
                                <td class="py-3">{{ $periodeScolaire->periode }}</td>
                                <td class="text-center d-flex justify-content-center align-items-center">

                                    {{-- Afficher --}}
                                    <div class="d-inline pt-1">
                                        <a class="btn text-primary d-flex"
                                            href="{{ route('admin.parametres.periode-scolaire.show', $periodeScolaire->id) }}"><i
                                                class="fa-regular fa-eye"></i></i></a>
                                    </div>

                                    {{-- Editer --}}
                                    <div class="d-inline pt-1">
                                        <a class="btn text-primary d-flex"
                                            href="{{ route('admin.parametres.periode-scolaire.edit', $periodeScolaire->id) }}">
                                            {{-- <i class="fas fa-edit"></i> --}}
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </div>

                                    {{-- Supprimer --}}
                                    <div class="d-inline pt-1">
                                        <form
                                            action="{{ route('admin.parametres.periode-scolaire.destroy', $periodeScolaire->id) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn text-primary d-flex"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="h2 my-2 text-center"><i class="fa-regular fa-folder-open"></i> Pas
                                    d'element
                                    trouvé</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
