<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Create User</h1>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <x-string-field name="name" />
                <x-string-field name="email" type="email" />
                <x-select-field name="user_role_id" label="Role:" selected="2" :items="$roles" />
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control @error('password')is-invalid @enderror" required>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <x-submit-button text="Save" />
            </form>
        </div>
    </div>
</x-app-layout>