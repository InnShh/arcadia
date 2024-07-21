<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label><br />
    <input type="date" name="{{ $name }}" id="{{ $name }}" value="{{ $value->format('Y-m-d') }}">
    @error($name)
    <span class="invalid-feedback" role="alert">
        {{ $message }}
    </span>
    @enderror
</div>