<div class="form-group">
    <label for="{{$name}}">{{Str::ucfirst(str_replace('_',' ',$name))}}:</label>
    <textarea name="{{$name}}" id="{{$name}}" class="form-control @error($name)is-invalid @enderror">{{ old($name,$value??'') }}</textarea>
    @error($name)
    <span class="invalid-feedback" role="alert">
        {{ $message }}
    </span>
    @enderror
</div>