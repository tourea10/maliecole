@extends('layouts.appBackend')

@section('titre_Page', "Les Paramètres de l'application")

@section('titre_Contenu', "Les Paramètres de l'application")

@section('Contenu')
    <div class="container mx-auto mt-4">
        <h3>Gestion du Personnel</h3>
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
                    La liste du personnel
            </div>

            <div class="card-body">
                <table class="table table-responsive-sm table-striped">
                    <thead class="table-primary">
                        <tr class="fw-bolder">
                            <td>#</td>
                            <td>Nom complet</td>
                            <td>Attributions</td>
                            <td class="text-center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($personnels as $personnel)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $personnel->name }}</td>
                                <td>{{ implode(' | ', $personnel->getRoleNames()->toArray()) }}</td>
                                <td class="text-center d-flex justify-content-center">
                                    <div class="d-inline pt-1">
                                        <a class="btn text-primary d-flex"
                                            href="{{ route('admin.parametres.creerRolePersonnel', $personnel->id) }}">Role</a>
                                    </div>
                                    <div class="d-inline pt-1">
                                        <a class="btn text-primary d-flex"
                                            href="{{ route('admin.parametres.personnel.show', $personnel->id) }}"><i
                                                class="fa-regular fa-eye"></i></a>
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
