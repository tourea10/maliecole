{{-- sigle --}}
<x-input-text label="Sigle" name="sigle" option=true :objet="$discipline" />

{{-- libelle --}}
<x-input-text label="Libelle" name="libelle" :objet="$discipline" />

{{-- Type --}}
<div class="form-group mb-3">
    <label for="type">Type</label>
    <select class="form-select @error('type') is-invalid @enderror" name="type" id="type">
        <option selected disabled>Choisir le type ici ...</option>
        <option value="litteraire">Littéraire</option>
        <option value="scientifique">Scientifique</option>
        <option value="artistique">Artistique</option>
        <option value="autre">Autre</option>
    </select>
    @error('type')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Bouton enregistrer --}}
<div class="mx-auto w-50">
    <button type="submit" class="btn btn-primary mx-auto w-100">
        @if ($discipline->id)
            Modifier
        @else
            Enregistrer
        @endif
    </button>
</div>
