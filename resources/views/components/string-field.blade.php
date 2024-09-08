<div class="form-group">
    <label for="{{$name}}">{{$label}}:</label>
    <input type="$type" name="{{$name}}" id="{{$name}}" class="form-control @error($name)is-invalid @enderror" value="{{ old($name,$value??'') }}" @required($required??false)>
    @error($name)
    <span class="invalid-feedback" role="alert">
        {{ $message }}
    </span>
    @enderror
</div>