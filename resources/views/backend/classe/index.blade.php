@extends('layouts.appBackend')

@section('titre_Page', "Les Classes de l'école")

@section('titre_Contenu', 'Les Classes')

@section('Contenu')
    <div class="container mx-auto mt-4">
        <h3>Gestion des Classes</h3>
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
                    Les Classes de l'Ecole
                </h3>
                <div class="card-tools fw-bold me-md-2">
                    Année Scolaire : <span class="text-primary">{{ anneeEnCours() }}</span>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-responsive-sm table-striped">
                    <thead class="table-primary">
                        <tr class="fw-bolder">
                            <td>#</td>
                            <td>Sigle</td>
                            <td>Libelle</td>
                            <td>Niveau</td>
                            <td>Filière</td>
                            <td class="text-center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($classes as $classe)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $classe->sigle }}</td>
                                <td>{{ $classe->libelle }}</td>
                                <td>
                                    @if ($classe->niveau > 9)
                                        DEF + {{ $classe->niveau - 9 }} ans
                                    @else
                                        {{ $classe->niveau }} ans
                                    @endif
                                </td>
                                <td>{{ $classe->filiere->sigle }}</td>
                                <td class="text-center d-flex justify-content-center">
                                    {{-- Editer --}}
                                    <div class="d-inline pt-1">
                                        <a class="btn text-primary d-flex" href="{{ route('classe.edit', $classe->id) }}">
                                            {{-- <i class="fas fa-edit"></i> --}}
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </div>

                                    {{-- Supprimer --}}
                                    <div class="d-inline pt-1">
                                        <form action="{{ route('classe.destroy', $classe->id) }}" method="post">
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
                                <td colspan="5" class="h2 my-2 text-center"><i class="fa-regular fa-folder-open"></i> Pas
                                    d'element
                                    trouvé</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="pagination justify-content-center">
                    {{ $classes->links() }}
                </div>
            </div>
        </div>
    </div>


@endsection
