@extends('layouts.appBackend')

@section('titre_Page', "Les Paramètres de l'application")

@section('titre_Contenu', "Les Paramètres de l'application")

@section('Contenu')

    {{-- Roles --}}
    <div class="container mx-auto mt-4">
        <h3>Gestion des Rôles et Permissions</h3>
        <h4 class="mt-4">1- Gestion des Rôles</h4>
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
                    Les differents rôles pour la gestion de l'école
                </h3>
                <div class="card-tools">
                    <a href="{{ route('admin.parametres.role.create') }}" class="btn btn-sm btn-primary me-2">
                        Ajouter un Rôle
                    </a>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-responsive-sm table-striped">
                    <thead class="table-primary">
                        <tr class="fw-bolder">
                            <td>#</td>
                            <td>Libelle</td>
                            <td class="text-center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->name }}</td>
                                <td class="text-center d-flex justify-content-center">

                                    {{-- Editer --}}
                                    <div class="d-inline pt-1">
                                        <a class="btn text-primary d-flex"
                                            href="{{ route('admin.parametres.role.edit', $role->id) }}">
                                            {{-- <i class="fas fa-edit"></i> --}}
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </div>

                                    {{-- Supprimer --}}
                                    <div class="d-inline pt-1">
                                        <form action="{{ route('admin.parametres.role.destroy', $role->id) }}"
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
                                <td colspan="3" class="h2 my-2 text-center"><i class="fa-regular fa-folder-open"></i> Pas
                                    d'element
                                    trouvé</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Permissions --}}
    <div class="container mx-auto mt-4">
        <h4 class="mt-4">1- Gestion des Permissions</h4>
    </div>
    <div class="container  mx-auto mt-3">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title fw-bold">
                    <i class="fa-solid fa-school"></i>
                    Les differentes permissions pour la gestion de l'école
                </h3>
                <div class="card-tools">
                    <a href="{{ route('admin.parametres.permission.create') }}" class="btn btn-sm btn-primary me-2">
                        Ajouter une Permission
                    </a>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-responsive-sm table-striped">
                    <thead class="table-primary">
                        <tr class="fw-bolder">
                            <td>#</td>
                            <td>Libelle</td>
                            <td class="text-center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($permissions as $permission)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $permission->name }}</td>
                                <td class="text-center d-flex justify-content-center">

                                    {{-- Editer --}}
                                    <div class="d-inline pt-1">
                                        <a class="btn text-primary d-flex"
                                            href="{{ route('admin.parametres.permission.edit', $permission->id) }}">
                                            {{-- <i class="fas fa-edit"></i> --}}
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </div>

                                    {{-- Supprimer --}}
                                    <div class="d-inline pt-1">
                                        <form action="{{ route('admin.parametres.permission.destroy', $permission->id) }}"
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
                                <td colspan="3" class="h2 my-2 text-center"><i class="fa-regular fa-folder-open"></i> Pas
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
