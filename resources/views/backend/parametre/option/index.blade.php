@extends('layouts.appBackend')

@section('titre_Page', "Les Paramètres de l'application")

@section('titre_Contenu', "Les Paramètres de l'application")

@section('Contenu')
    <div class="container mx-auto mt-4">
        <h3>Gestion des Options</h3>
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
                    Les Options de l'Ecole
                </h3>
                <div class="card-tools">
                    <a href="{{ route('admin.parametres.option.create') }}" class="btn btn-sm btn-primary me-2">
                        Ajouter une Option
                    </a>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-responsive-sm table-striped">
                    <thead class="table-primary">
                        <tr class="fw-bolder">
                            <td>#</td>
                            <td>Libelle</td>
                            <td>Sigle</td>
                            <td class="text-center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($options as $option)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $option->libelle }}</td>
                                <td>{{ $option->sigle }}</td>
                                <td class="text-center d-flex justify-content-center">
                                    {{-- Afficher --}}
                                    <div class="d-inline pt-1">
                                        <a class="btn text-primary d-flex"
                                            href="{{ route('admin.parametres.option.show', $option->id) }}"><i
                                                class="fa-regular fa-eye"></i></i></a>
                                    </div>
                                    {{-- Editer --}}
                                    <div class="d-inline pt-1">
                                        <a class="btn text-primary d-flex"
                                            href="{{ route('admin.parametres.option.edit', $option->id) }}">
                                            {{-- <i class="fas fa-edit"></i> --}}
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </div>

                                    {{-- Supprimer --}}
                                    <div class="d-inline pt-1">
                                        <form action="{{ route('admin.parametres.option.destroy', $option->id) }}"
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
                                <td colspan="4" class="h2 my-2 text-center"><i class="fa-regular fa-folder-open"></i> Pas
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
