{{-- Discipline --}}
<div class="form-group mb-3">
    <label for="discipline_id">Discipline</label>
    <select class="form-select @error('discipline_id') is-invalid @enderror" name="discipline_id" id="discipline_id">
        <option selected disabled>Choisir la discipline ici ...</option>
        @foreach ($disciplines as $discipline)
            <option @if ($professeur->discipline_id == $discipline->id) selected @endif value="{{ $discipline->id }}">
                {{ $discipline->sigle }} - {{ $discipline->libelle }}</option>
        @endforeach
    </select>
    @error('discipline_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Prenom --}}
<x-input-text label="Prenom" name="prenom" :objet="$professeur" />

{{-- Nom --}}
<x-input-text label="Nom" name="nom" :objet="$professeur" />

{{-- Sexe --}}
<div class="form-group ">
    <label for="sexe">Sexe</label>
    <div class="row mx-5 d-flex justify-content-between">
        <div class="form-check">
            <input class="form-check-input @error('sexe') is-invalid @enderror" type="radio" name="sexe"
                value="homme" id="homme">
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
<x-input-text label="Date de Naissance" name="dateNaissance" type="date" option=true :objet="$professeur" />

{{-- Lieu de naissance --}}
<x-input-text label="Lieu de Naissance" name="lieuNaissance" option=true :objet="$professeur" />

{{-- contact --}}
<x-input-text label="Contact" name="contact" :objet="$professeur" />

{{-- Email --}}
<x-input-text label="Email" name="email" option=true :objet="$professeur" />

{{-- Photo --}}
<x-input-text label="Photo de profil" name="photo" type="file" option=true :objet="$professeur" />

{{-- adresse --}}
<x-textarea label="Adresse" name="adresse" option=true :objet="$professeur" />

{{-- Groupe Sanguin --}}
<x-input-text label="Groupe Sanguin" name="groupeSanguin" option=true :objet="$professeur" />

{{-- Signe Particulier --}}
<x-input-text label="Signe Particulier" name="signeParticulier" option=true :objet="$professeur" />

{{-- Bouton enregistrer --}}
<div class="mx-auto w-50">
    <button type="submit" class="btn btn-primary mx-auto w-100">
        @if ($professeur->id)
            Modifier
        @else
            Enregistrer
        @endif
    </button>
</div>
