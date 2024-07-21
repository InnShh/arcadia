<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Create Activity</h1>
            <form action="{{ route('activities.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="image_file">Image:</label>
                    <div class="alert alert-info" role="alert">
                        📸 Please upload your image as a <b>JPG</b>, sized <b>660x440</b> pixels, and at <b>90%</b> quality to keep our website speedy on mobile devices. The maximum file size is <b>200KB</b>.<br>If adjusting the image sounds tricky, a friendly graphics designer or photographer can easily help you out!
                    </div>
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