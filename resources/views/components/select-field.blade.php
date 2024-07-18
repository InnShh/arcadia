<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-control @error($name)is-invalid @enderror">
        @foreach ($items as $item)
        <option value="{{ $item->$values }}" @selected(old($name,$selected)==$item->id)>{{ $item->$labels }}</option>
        @endforeach
    </select>
    @error($name)
    <span class="invalid-feedback" role="alert">
        {{ $message }}
    </span>
    @enderror
</div>