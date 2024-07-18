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
                <x-string-field name="image_path" :value="$exhibitImage->image_path" />
                <x-submit-button text="Update" />
            </form>
        </div>
    </div>
</x-app-layout>