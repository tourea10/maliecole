{{-- Sexe --}}
<div class="form-group ">
    <label for="sexe">Sexe</label>
    <div class="row mx-5 d-flex justify-content-between">
        <div class="form-check">
            <input class="form-check-input @error('sexe') is-invalid @enderror" type="radio" name="sexe" value="homme"
                id="homme">
            <label class="form-check-label" for="homme">Homme</label>
        </div>
        <div class="form-check">
            <input class="form-check-input @error('sexe') is-invalid @enderror" type="radio" name="sexe"
                value="femme" id="femme">
            <label class="form-check-label" for="femme">Femme</label>
        </div>
    </div>
    @error('sexe')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Date de naissance --}}
<x-input-text label="Date de Naissance" name="dateNaissance" type="date" option=true :objet="$personnel" />

{{-- Lieu de naissance --}}
<x-input-text label="Lieu de Naissance" name="lieuNaissance" option=true :objet="$personnel" />

{{-- contact --}}
<x-input-text label="Contact" name="contact" :objet="$personnel" />

{{-- Photo --}}
<x-input-text label="Photo de profil" name="photo" type="file" option=true :objet="$personnel" />

{{-- adresse --}}
<x-textarea label="Adresse" name="adresse" option=true :objet="$personnel" />

{{-- Poste --}}
<x-input-text label="Poste" name="poste" :objet="$personnel" />

{{-- Groupe Sanguin --}}
<x-input-text label="Groupe Sanguin" name="groupeSanguin" option=true :objet="$personnel" />

{{-- Signe Particulier --}}
<x-input-text label="Groupe Sanguin" name="signeParticulier" option=true :objet="$personnel" />

{{-- Choisir l'ecole --}}
<div class="form-group mb-3">
    <label for="ecole_id">Choisir l'école</label>
    <select class="form-select @error('ecole_id') is-invalid @enderror" name="ecole_id" id="ecole_id">
        <option selected disabled>Choisir le type ici ...</option>
        @foreach ($ecoles as $ecole)
            <option value="{{ $ecole->id }}">{{ $ecole->sigle }}</option>
        @endforeach
    </select>
    @error('ecole_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Bouton enregistrer --}}
<div class="mx-auto w-50">
    <button type="submit" class="btn btn-primary mx-auto w-100">
        @if ($personnel->id)
            Modifier
        @else
            Enregistrer
        @endif
    </button>
</div>
