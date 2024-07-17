<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Exhibit</h1>
            <form action="{{ route('exhibits.update', $exhibit->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="slug">Slug:</label>
                    <input type="text" name="slug" id="slug" class="form-control @error('slug')is-invalid @enderror" value="{{old('slug')}}" value="{{ old('slug',$exhibit->slug) }}">
                    @error('slug')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control @error('slug')is-invalid @enderror" value="{{old('name')}}" value="{{ old('name',$exhibit->name) }}" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" class="form-control @error('slug')is-invalid @enderror" value="{{old('description')}}">{{ old('description',$exhibit->description) }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>