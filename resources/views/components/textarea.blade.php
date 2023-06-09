<div class="form-group mb-3">
    <label for="{{ $name }}">{{ $label }}</label>
    @if ($option)
        <span class="fst-italic text-gray">(option)</span>
    @endif
    <textarea name="{{ $name }}" class="form-control @error("$name") is-invalid @enderror" id="{{ $name }}"
        placeholder="{{ $name }}">{{ old("$name", $objet->$name) }}</textarea>
    @error("$name")
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
