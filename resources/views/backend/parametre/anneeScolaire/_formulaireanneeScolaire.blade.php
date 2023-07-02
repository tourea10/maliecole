{{-- libelle --}}
<x-input-text label="Libelle" name="libelle" :objet="$annee" />

{{-- date de debut --}}
<x-input-text label="Date de Debut" type="date" name="dateDebut" :objet="$annee" />

{{-- date de fin --}}
<x-input-text label="Date de Fin" type="date" name="dateFin" :objet="$annee" />

{{-- Bouton enregistrer --}}
<div class="mx-auto w-50">
    <button type="submit" class="btn btn-primary mx-auto w-100">
        @if ($annee->id)
            Modifier
        @else
            Enregistrer
        @endif
    </button>
</div>
