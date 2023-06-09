<div class="form-group mb-3">
    <label for="{{ $name }}">{{ $label }}</label>
    @if ($option)
        <span class="fst-italic text-gray">(option)</span>
    @endif
    <input type="{{ $type }}" name="{{ $name }}" class="form-control @error("$name") is-invalid @enderror"
        value="{{ old("$name", $objet->$name) }}" id="{{ $name }}" placeholder="{{ $name }}">
    @error("$name")
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
