{{-- nom_complet --}}
<x-input-text label="Nom Complet" name="nom_complet" :objet="$ecole" />

{{-- sigle --}}
<x-input-text label="Sigle" name="sigle" option=true :objet="$ecole" />

{{-- image --}}
<x-input-text label="Logo de l'école" name="logo" type="file" option=true :objet="$ecole" />

{{-- slogan --}}
<x-input-text label="Slogan" name="slogan" option=true :objet="$ecole" />

{{-- adresse --}}
<x-textarea label="Adresse" name="adresse" :objet="$ecole" />

{{-- Type_ecole --}}
<div class="form-group ">
    <label for="type_ecole">Choisir le type de l'école</label>
    <div class="row mx-5 d-flex justify-content-between">
        <div class="form-check">
            <input class="form-check-input @error('type_ecole') is-invalid @enderror" type="radio" name="type_ecole"
                value="public" id="public">
            <label class="form-check-label" for="public">Public</label>
        </div>
        <div class="form-check">
            <input class="form-check-input @error('type_ecole') is-invalid @enderror" type="radio" name="type_ecole"
                value="prive" id="prive">
            <label class="form-check-label" for="prive">Privée</label>
        </div>
    </div>
    @error('type_ecole')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- telephone --}}
<x-input-text label="Téléphone" name="telephone" :objet="$ecole" />

{{-- email --}}
<x-input-text label="Email" name="email" type="email" :objet="$ecole" />

{{-- Choisir l'academie --}}
<div class="form-group mb-3">
    <label for="academie_id">Choisir l'academie de l'école</label>
    <select class="form-select @error('academie_id') is-invalid @enderror" name="academie_id" id="academie_id">
        <option selected disabled>Choisir le type ici ...</option>
        @foreach ($academies as $academie)
            <option value="{{ $academie->id }}">{{ $academie->libelle }}</option>
        @endforeach
    </select>
    @error('academie_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Bouton enregistrer --}}
<div class="mx-auto w-50">
    <button type="submit" class="btn btn-primary mx-auto w-100">
        @if ($ecole->id)
            Modifier
        @else
            Enregistrer
        @endif
    </button>
</div>
