{{-- Classe --}}
<div class="form-group mb-3">
    <label for="classe_id">Classe</label>
    <select class="form-select @error('classe_id') is-invalid @enderror" name="classe_id" id="classe_id">
        <option selected disabled>Choisir la classe ici ...</option>
        @foreach ($classes as $classe)
            <option @if ($matiere->classe_id == $classe->id) selected @endif value="{{ $classe->id }}">{{ $classe->sigle }} -
                {{ $classe->libelle }}</option>
        @endforeach
    </select>
    @error('classe_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Discipline --}}
<div class="form-group mb-3">
    <label for="discipline_id">Discipline</label>
    <select class="form-select @error('discipline_id') is-invalid @enderror" name="discipline_id" id="discipline_id">
        <option selected disabled>Choisir la discipline ici ...</option>
        @foreach ($disciplines as $discipline)
            <option @if ($matiere->discipline_id == $discipline->id) selected @endif value="{{ $discipline->id }}">
                {{ $discipline->sigle }} - {{ $discipline->libelle }}</option>
        @endforeach
    </select>
    @error('discipline_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Coefficient --}}
<div class="form-group mb-3">
    <label for="coefficient">Coefficient</label>
    <select class="form-select @error('coefficient') is-invalid @enderror" name="coefficient" id="coefficient">
        <option selected disabled>Choisir le coefficient ici ...</option>
        @for ($i = 1; $i <= 10; $i++)
            <option @if ($matiere->coefficient == $i) selected @endif value="{{ $i }}">{{ $i }}
            </option>
        @endfor
    </select>
    @error('coefficient')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- nombre Heure --}}
<x-input-text label="Nombre d'Heure" type="number" name="nombreHeure" option=true :objet="$matiere" />


{{-- Bouton enregistrer --}}
<div class="mx-auto w-50">
    <button type="submit" class="btn btn-primary mx-auto w-100">
        @if ($matiere->id)
            Modifier
        @else
            Enregistrer
        @endif
    </button>
</div>
