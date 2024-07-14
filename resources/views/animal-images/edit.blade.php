<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Animal Image</h1>
            <form action="{{ route('animal-images.update', $animalImage->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="animal_id">Animal</label>
                    <select name="animal_id" id="animal_id" class="form-control" required>
                        @foreach ($animals as $animal)
                        <option value="{{ $animal->id }}" {{ $animalImage->animal_id == $animal->id ? 'selected' : '' }}>{{ $animal->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image_path">Image Path</label>
                    <input type="text" name="image_path" id="image_path" class="form-control" value="{{ $animalImage->image_path }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>