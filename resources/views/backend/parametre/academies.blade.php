@extends('layouts.appBackend')

@section('titre_Page', "Les Paramètres de l'application")

@section('titre_Contenu', "Les Paramètres de l'application")

@section('Contenu')
    <div class="container mx-auto mt-4">
        <h3>Gestion des Academies</h3>
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
                    Liste des Academies
                </h3>
                <div class="card-tools">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-primary me-2" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Ajouter une Academie
                    </button>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-responsive-sm table-striped">
                    <thead class="table-primary">
                        <tr class="fw-bolder">
                            <td>#</td>
                            <td>Sigle</td>
                            <td>Libelle</td>
                            <td class="text-center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($academies as $academie)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $academie->sigle }}</td>
                                <td>{{ $academie->libelle }}</td>
                                <td class="text-center d-flex justify-content-center">
                                    <div class="d-inline">
                                        <form action="{{ route('admin.supprimerAcademie', $academie->id) }}" method="post">
                                            @csrf
                                            {{-- @method('DELETE') --}}
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
                <div class="pagination justify-content-center">
                </div>
            </div>
            <div class="card-footer">
                <div class="pagination justify-content-center">
                    {{ $academies->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nouvelle Academie</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.enregistrerAcademie') }}" method="post" enctype="multipart/form-data">
                    @csrf


                    <div class="modal-body">
                        {{-- sigle --}}
                        <div class="form-group mb-3">
                            <label for="sigle">Sigle</label>
                            <input type="text" name="sigle" class="form-control @error('sigle') is-invalid @enderror"
                                value="{{ old('sigle') }}" id="sigle" placeholder="sigle" autofocus>
                            @error('sigle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- libelle --}}
                        <div class="form-group mb-3">
                            <label for="libelle">Libelle</label>
                            <input type="text" name="libelle" class="form-control @error('libelle') is-invalid @enderror"
                                value="{{ old('libelle') }}" id="libelle" placeholder="libelle" autofocus>
                            @error('libelle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
            </div>
        </div>
    </div>

@endsection
