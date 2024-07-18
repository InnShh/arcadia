<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Edit User</h1>
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <x-string-field name="name" :value="$user->name" />
                <x-string-field name="email" type="email" :value="$user->email" />
                <x-select-field name="user_role_id" label="Role:" :selected="$user->user_role_id" :items="$roles" />
                <div class="form-group">
                    <label for="password">Password (leave blank to keep current password):</label>
                    <input type="password" name="password" class="form-control @error('password')is-invalid @enderror">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <x-submit-button text="Update" />
            </form>
        </div>
    </div>
</x-app-layout>