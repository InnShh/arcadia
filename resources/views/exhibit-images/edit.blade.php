<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Exhibit Image</h1>
            <form action="{{ route('exhibit-images.update', $exhibitImage->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exhibit_id">Exhibit</label>
                    <select name="exhibit_id" id="exhibit_id" class="form-control" required>
                        @foreach ($exhibits as $exhibit)
                        <option value="{{ $exhibit->id }}" {{ $exhibitImage->exhibit_id == $exhibit->id ? 'selected' : '' }}>{{ $exhibit->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image_path">Image Path</label>
                    <input type="text" name="image_path" id="image_path" class="form-control" value="{{ $exhibitImage->image_path }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>