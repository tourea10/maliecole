@extends('layouts.appBackend')

@section('titre_Page', "Les Professeurs de l'école")

@section('titre_Contenu', "Les Professeurs de l'école")

@section('Contenu')
    <div class="container mx-auto mt-4">
        <h3>Gestion des Professeurs</h3>
    </div>
    <div class="container  mx-auto mt-3">

        {{-- Message d'alert --}}
        @if ($message = Session::get('message'))
            <x-alert type="success" :message="$message" />
        @endif

        <div class="card">

            <div class="card-header">
                <h3 class="card-title fw-bold">
                    <i class="fa-solid fa-users"></i>
                    La liste des Professeurs
            </div>

            <div class="card-body">
                <table class="table table-responsive-sm table-striped">
                    <thead class="table-primary">
                        <tr class="fw-bolder">
                            <td>#</td>
                            <td>Nom complet</td>
                            <td>Contact</td>
                            <td>Email</td>
                            <td>Spécialité</td>
                            <td class="text-center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($professeurs as $professeur)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $professeur->prenom }} {{ $professeur->nom }}</td>
                                <td>{{ $professeur->contact }}</td>
                                <td>{{ $professeur->email }}</td>
                                <td>{{ $professeur->discipline->libelle }}</td>
                                <td class="text-center d-flex justify-content-center">
                                    {{-- Afficher --}}
                                    <div class="d-inline pt-1">
                                        <a class="btn text-primary d-flex"
                                            href="{{ route('professeur.show', $professeur->id) }}"><i
                                                class="fa-regular fa-eye"></i></i></a>
                                    </div>
                                    {{-- Editer --}}
                                    <div class="d-inline pt-1">
                                        <a class="btn text-primary d-flex"
                                            href="{{ route('professeur.edit', $professeur->id) }}">
                                            {{-- <i class="fas fa-edit"></i> --}}
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </div>

                                    {{-- Supprimer --}}
                                    <div class="d-inline pt-1">
                                        <form action="{{ route('professeur.destroy', $professeur->id) }}" method="post">
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
            <div class="card-footer">
                <div class="pagination justify-content-center">
                    {{ $professeurs->links() }}
                </div>
            </div>
        </div>
    </div>


@endsection
