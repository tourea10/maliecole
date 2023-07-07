{{-- Name --}}
<x-input-text label="Nom du role" name="name" :objet="$role" />



{{-- Bouton enregistrer --}}
<div class="mx-auto w-50">
    <button type="submit" class="btn btn-primary mx-auto w-100">
        @if ($role->id)
            Modifier
        @else
            Enregistrer
        @endif
    </button>
</div>
