<div class="card-body">
    <table class="table table-responsive-sm table-striped">
        <thead class="table-primary">
            <tr class="fw-bolder">
                <td>#</td>
                <td>Libelle</td>
                <td>Date de Debut</td>
                <td>Date de Fin</td>
                <td class="text-center">Statut</td>
                <td class="text-center">Action</td>
            </tr>
        </thead>
        <tbody>
            @forelse ($annees as $annee)
                <tr>
                    <td class="py-3">{{ $loop->iteration }}</td>
                    <td class="py-3">{{ $annee->libelle }}</td>
                    <td class="py-3">{{ dateFormater($annee->dateDebut) }}</td>
                    <td class="py-3">{{ dateFormater($annee->dateFin) }}</td>
                    <td class="py-3 text-center">
                        <span class="{{ $annee->estActive ? 'bg-success py-1 px-2' : 'bg-danger py-1 px-2' }}">
                            {{ $annee->estActive ? 'actif' : 'inactif' }}
                        </span>
                    </td>
                    <td class="text-center d-flex justify-content-end align-items-center pe-md-5 pe-sm-0">
                        {{-- Activer l'annee --}}
                        <div class="d-inline pt-1">
                            <button
                                class="btn text-primary d-flex align-items-center fw-bolder {{ $annee->estActive ? 'disabled border-0' : '' }}"
                                wire:click='activerAnneeScolaire({{ $annee->id }})'>{{ $annee->estActive ? ' ' : 'activer' }}</button>
                        </div>
                        {{-- Editer --}}
                        <div class="d-inline pt-1">
                            <a class="btn text-primary d-flex"
                                href="{{ route('admin.parametres.annee-scolaire.edit', $annee->id) }}">
                                {{-- <i class="fas fa-edit"></i> --}}
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </div>

                        {{-- Supprimer --}}
                        <div class="d-inline pt-1">
                            <form action="{{ route('admin.parametres.annee-scolaire.destroy', $annee->id) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn text-primary d-flex"><i class="far fa-trash-alt"></i></button>
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
    <div class="py-md-5">
        <h3>
            <a href="{{ route('admin.parametres.periode-scolaire.index') }}">
                les periodes scolaire de l'année
                <span>{{ anneeEnCours() }}</span>
            </a>
        </h3>
    </div>
</div>
