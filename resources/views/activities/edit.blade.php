<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Activity</h1>
            <form action="{{ route('activities.update', $activity->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="image_file">Image:</label>
                    <input type="file" name="image_file" id="image_file" class="form-control @error('image_file') is-invalid @enderror">
                    @error('image_file')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <x-string-field name="name" :value="$activity->name" />
                <x-text-field name="description" :value="$activity->description" />
                <x-submit-button text="Update" />
            </form>
        </div>
    </div>
</x-app-layout>