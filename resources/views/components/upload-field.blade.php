<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <div class="alert alert-info" role="alert">
        {{ $slot }}
    </div>
    <input type="file" name="{{ $name }}" id="{{ $name }}" class="form-control @error($name) is-invalid @enderror" @required($required??false)>
    @error($name)
    <span class="invalid-feedback" role="alert">
        {{ $message }}
    </span>
    @enderror
</div>