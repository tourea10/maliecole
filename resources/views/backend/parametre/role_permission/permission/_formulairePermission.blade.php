{{-- Nom --}}
<x-input-text label="Nom" name="name" :objet="$permission" />


{{-- Bouton enregistrer --}}
<div class="mx-auto w-50">
    <button type="submit" class="btn btn-primary mx-auto w-100">
        @if ($permission->id)
            Modifier
        @else
            Enregistrer
        @endif
    </button>
</div>
