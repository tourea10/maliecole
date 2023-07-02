{{-- Numero --}}
<div class="form-group ">
    <label for="numeroPeriode">Numero Periode</label>
    <div class="row mx-5 d-flexflex">
        <div class="col">
            <div class="form-check mb-3">
                <input class="form-check-input @error('numeroPeriode') is-invalid @enderror" type="radio"
                    name="numeroPeriode" value="1er" id="1er">
                <label class="form-check-label" for="1er">1er</label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input @error('numeroPeriode') is-invalid @enderror" type="radio"
                    name="numeroPeriode" value="2eme" id="2eme">
                <label class="form-check-label" for="2eme">2ème</label>
            </div>
        </div>
        <div class="col">
            <div class="form-check mb-3">
                <input class="form-check-input @error('numeroPeriode') is-invalid @enderror" type="radio"
                    name="numeroPeriode" value="trimestre" id="3eme">
                <label class="form-check-label" for="3eme">3ème</label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input @error('numeroPeriode') is-invalid @enderror" type="radio"
                    name="numeroPeriode" value="4eme" id="4eme">
                <label class="form-check-label" for="4eme">4ème</label>
            </div>
        </div>


    </div>
    @error('numeroPeriode')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- libelle --}}
<x-input-text label="Mois" name="mois" :objet="$periode" />

{{-- Periode --}}
<div class="form-group ">
    <label for="periode">Type de Periode</label>
    <div class="row mx-5 d-flexflex">
        <div class="col">
            <div class="form-check mb-3">
                <input class="form-check-input @error('periode') is-invalid @enderror" type="radio" name="periode"
                    value="mensuel" id="mensuel">
                <label class="form-check-label" for="mensuel">Mensuel</label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input @error('periode') is-invalid @enderror" type="radio" name="periode"
                    value="bimestre" id="bimestre">
                <label class="form-check-label" for="bimestre">Bimestre</label>
            </div>
        </div>
        <div class="col">
            <div class="form-check mb-3">
                <input class="form-check-input @error('periode') is-invalid @enderror" type="radio" name="periode"
                    value="trimestre" id="trimestre">
                <label class="form-check-label" for="trimestre">Trimestre</label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input @error('periode') is-invalid @enderror" type="radio" name="periode"
                    value="semestre" id="semestre">
                <label class="form-check-label" for="semestre">Semestre</label>
            </div>
        </div>


    </div>
    @error('periode')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Bouton enregistrer --}}
<div class="mx-auto w-50">
    <button type="submit" class="btn btn-primary mx-auto w-100">
        @if ($periode->id)
            Modifier
        @else
            Enregistrer
        @endif
    </button>
</div>
