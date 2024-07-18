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
                <x-string-field name="image_path" />
                <x-submit-button text="Add" />
            </form>
        </div>
    </div>
</x-app-layout>