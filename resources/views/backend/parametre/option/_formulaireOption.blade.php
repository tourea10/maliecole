{{-- libelle --}}
<x-input-text label="Libelle" name="libelle" :objet="$option" />

{{-- sigle --}}
<x-input-text label="Sigle" name="sigle" :objet="$option" />

{{-- adresse --}}
<x-textarea label="Description" name="description" :objet="$option" />

{{-- Bouton enregistrer --}}
<div class="mx-auto w-50">
    <button type="submit" class="btn btn-primary mx-auto w-100">
        @if ($option->id)
            Modifier
        @else
            Enregistrer
        @endif
    </button>
</div>
