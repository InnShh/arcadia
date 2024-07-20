<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Create Activity</h1>
            <form action="{{ route('activities.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="image_file">Image:</label>
                    <input type="file" name="image_file" id="image_file" class="form-control @error('image_file') is-invalid @enderror">
                    @error('image_file')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <x-string-field name="name" />
                <x-text-field name="description" />
                <x-submit-button text="Create" />
            </form>
        </div>
    </div>
</x-app-layout>