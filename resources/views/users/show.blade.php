<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Show User</h1>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <table class="table">
                <tr>
                    <th>ID:</th>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <th>Name:</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Created At:</th>
                    <td>{{ $user->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At:</th>
                    <td>{{ $user->updated_at }}</td>
                </tr>
            </table>
            <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</x-app-layout>