{{-- sigle --}}
<x-input-text label="Sigle" name="sigle" :objet="$filiere" />

{{-- libelle --}}
<x-input-text label="Libelle" name="libelle" :objet="$filiere" />

{{-- Type --}}
<div class="form-group mb-3">
    <label for="type">Type</label>
    <select class="form-select @error('type') is-invalid @enderror" name="type" id="type">
        <option selected disabled>Choisir le type ici ...</option>
        <option value="industrie">industrie</option>
        <option value="lycee_classique">lycée classique</option>
        <option value="lycee_professionnel">lycée professionnel</option>
        <option value="lycee_technique">lycée technique</option>
        <option value="tertiaire">tertiaire</option>
    </select>
    @error('type')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- adresse --}}
<x-textarea label="Description" name="description" :objet="$filiere" />

{{-- Cycle --}}
<div class="form-group mb-3">
    <label for="cycle_id">Cycle</label>
    <select class="form-select @error('cycle_id') is-invalid @enderror" name="cycle_id" id="cycle_id">
        <option selected disabled>Choisir le cycle ici ...</option>
        @foreach ($cycles as $cycle)
            <option value="{{ $cycle->id }}">{{ $cycle->sigle }} - {{ $cycle->libelle }}</option>
        @endforeach
    </select>
    @error('cycle_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Option --}}
<div class="form-group mb-3">
    <label for="option_id">Option</label>
    <select class="form-select @error('option_id') is-invalid @enderror" name="option_id" id="option_id">
        <option selected disabled>Choisir l'option ici ...</option>
        @foreach ($options as $option)
            <option value="{{ $option->id }}">{{ $option->sigle }} - {{ $option->libelle }}</option>
        @endforeach
    </select>
    @error('option_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Bouton enregistrer --}}
<div class="mx-auto w-50">
    <button type="submit" class="btn btn-primary mx-auto w-100">
        @if ($filiere->id)
            Modifier
        @else
            Enregistrer
        @endif
    </button>
</div>
