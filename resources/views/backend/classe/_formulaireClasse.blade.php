{{-- Filiere --}}
<div class="form-group mb-3">
    <label for="filiere_id">Filiere</label>
    <select class="form-select @error('filiere_id') is-invalid @enderror" name="filiere_id" id="filiere_id">
        <option selected disabled>Choisir la filiere ici ...</option>
        @foreach ($filieres as $filiere)
            <option value="{{ $filiere->id }}">{{ $filiere->sigle }} - {{ $filiere->libelle }}</option>
        @endforeach
    </select>
    @error('filiere_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- sigle --}}
<x-input-text label="Sigle" name="sigle" :objet="$classe" />

{{-- libelle --}}
<x-input-text label="Libelle" name="libelle" :objet="$classe" />

{{-- Niveau --}}
<div class="form-group mb-3">
    <label for="Niveau">Niveau</label>
    <select class="form-select @error('niveau') is-invalid @enderror" name="niveau" id="niveau">
        <option selected disabled>Choisir le niveau ici ...</option>
        @for ($i = 1; $i <= 12; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
        @endfor

    </select>
    @error('niveau')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Bouton enregistrer --}}
<div class="mx-auto w-50">
    <button type="submit" class="btn btn-primary mx-auto w-100">
        @if ($classe->id)
            Modifier
        @else
            Enregistrer
        @endif
    </button>
</div>
