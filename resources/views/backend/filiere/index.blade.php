@extends('layouts.appBackend')

@section('titre_Page', "Les Filières de l'école")

@section('titre_Contenu', 'Les Filières')

@section('Contenu')
    <div class="container mx-auto mt-4">
        <h3>Gestion des Filières</h3>
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
                    Les Filières de l'Ecole
                </h3>
            </div>

            <div class="card-body">
                <table class="table table-responsive-sm table-striped">
                    <thead class="table-primary">
                        <tr class="fw-bolder">
                            <td>#</td>
                            <td>Libelle</td>
                            <td>Sigle</td>
                            <td>Type</td>
                            <td>Cycle</td>
                            <td class="text-center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($filieres as $filiere)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $filiere->libelle }}</td>
                                <td>{{ $filiere->sigle }}</td>
                                <td>{{ $filiere->type }}</td>
                                <td>{{ $filiere->cycle->sigle }}</td>
                                <td class="text-center d-flex justify-content-center">
                                    {{-- Afficher --}}
                                    <div class="d-inline pt-1">
                                        <a class="btn text-primary d-flex"
                                            href="{{ route('filiere.show', $filiere->id) }}"><i
                                                class="fa-regular fa-eye"></i></i></a>
                                    </div>
                                    {{-- Editer --}}
                                    <div class="d-inline pt-1">
                                        <a class="btn text-primary d-flex" href="{{ route('filiere.edit', $filiere->id) }}">
                                            {{-- <i class="fas fa-edit"></i> --}}
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </div>

                                    {{-- Supprimer --}}
                                    <div class="d-inline pt-1">
                                        <form action="{{ route('filiere.destroy', $filiere->id) }}" method="post">
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
