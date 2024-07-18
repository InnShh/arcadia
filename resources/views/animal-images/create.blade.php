<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Add Animal Image</h1>
            <form action="{{ route('animal-images.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="animal_id">Animal</label>
                    <select name="animal_id" id="animal_id" class="form-control" required>
                        @foreach ($animals as $animal)
                        <option value="{{ $animal->id }}">{{ $animal->name }}</option>
                        @endforeach
                    </select>
                </div>
                <x-string-field name="image_path" />
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</x-app-layout>