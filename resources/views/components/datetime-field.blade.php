<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label><br />
    <input type="datetime-local" name="{{ $name }}" id="{{ $name }}" value="{{ $value->format('Y-m-d\TH:i') }}" @required($required??false)>
    <button type="button" data-target="{{ $name }}" class="btn btn-outline-secondary btn-sm set-now-btn">Set to Now</button>
    @error($name)
    <span class="invalid-feedback" role="alert">
        {{ $message }}
    </span>
    @enderror
</div>