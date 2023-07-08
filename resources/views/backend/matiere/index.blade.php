@extends('layouts.appBackend')

@section('titre_Page', "Les Matières de l'école")

@section('titre_Contenu', 'Les Matières')

@section('Contenu')
    <div class="container mx-auto mt-4">
        <h3>Gestion des Matières</h3>
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
                    Les Matières de l'Ecole
                </h3>
            </div>

            <div class="card-body">
                <table class="table table-responsive-sm table-striped">
                    <thead class="table-primary">
                        <tr class="fw-bolder">
                            <td>#</td>
                            <td>Classe</td>
                            <td>Libelle</td>
                            <td>Coefficient</td>
                            <td>Nombre d'heure</td>
                            <td class="text-center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($matieres as $matiere)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $matiere->classe->sigle }}</td>
                                <td>{{ $matiere->discipline->sigle }}</td>
                                <td>{{ $matiere->coefficient }}</td>
                                <td>{{ $matiere->nombreHeure }}</td>
                                <td class="text-center d-flex justify-content-center">
                                    {{-- Editer --}}
                                    <div class="d-inline pt-1">
                                        <a class="btn text-primary d-flex" href="{{ route('matiere.edit', $matiere->id) }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </div>

                                    {{-- Supprimer --}}
                                    <div class="d-inline pt-1">
                                        <form action="{{ route('matiere.destroy', $matiere->id) }}" method="post">
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
                    {{ $matieres->links() }}
                </div>
            </div>
        </div>
    </div>


@endsection
