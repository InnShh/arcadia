<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Create User</h1>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" value="{{old('name')}}" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" value="{{old('email')}}" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="user_role_id">Role</label>
                    <select name="user_role_id" id="user_role_id" class="form-control @error('user_role_id')is-invalid @enderror" required>
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}" @selected(old('user_role_id',2)==$role->id)>{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('user_role_id')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control @error('password')is-invalid @enderror" required>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</x-app-layout>