{{-- libelle --}}
<x-input-text label="Libelle" name="libelle" :objet="$cycle" />

{{-- sigle --}}
<x-input-text label="Sigle" name="sigle" :objet="$cycle" />

{{-- nombre Annee --}}
<x-input-text label="Nombre d'Année" type="number" name="nombreAnnee" :objet="$cycle" />

{{-- adresse --}}
<x-textarea label="Description" name="description" :objet="$cycle" />

{{-- Bouton enregistrer --}}
<div class="mx-auto w-50">
    <button type="submit" class="btn btn-primary mx-auto w-100">
        @if ($cycle->id)
            Modifier
        @else
            Enregistrer
        @endif
    </button>
</div>
