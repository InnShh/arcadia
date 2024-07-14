<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Add Exhibit Image</h1>
            <form action="{{ route('exhibit-images.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exhibit_id">Exhibit</label>
                    <select name="exhibit_id" id="exhibit_id" class="form-control" required>
                        @foreach ($exhibits as $exhibit)
                        <option value="{{ $exhibit->id }}">{{ $exhibit->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image_path">Image Path</label>
                    <input type="text" name="image_path" id="image_path" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</x-app-layout>