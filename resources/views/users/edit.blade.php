<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Edit User</h1>
            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-string-field name="name" :value="$user->name" required="1" />
                <x-string-field name="email" type="email" :value="$user->email" required="1" />
                <x-select-field name="user_role_id" label="Role:" :selected="$user->user_role_id" :items="$roles" required="1" />
                <div class="form-group">
                    <label for="password">Password (leave blank to keep current password):</label>
                    <input type="password" name="password" class="form-control @error('password')is-invalid @enderror">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <x-upload-field name="image_file" label="Avatar image:">
                    <p>📸 Please upload your image as a <b>JPG</b>, sized <b>400x400</b> pixels, and at <b>90%</b> quality to keep our website speedy on mobile devices. The maximum file size is <b>100KB</b>.</p>
                    <p>If adjusting the image sounds tricky, a friendly graphics designer or photographer can easily help you out!</p>
                    <p><b>Current image will be deleted.</b></p>
                </x-upload-field>
                <x-submit-button text="Update" />
            </form>
        </div>
    </div>
</x-app-layout>