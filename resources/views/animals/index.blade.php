<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Animals</h1>
            <a href="{{ route('animals.create') }}" class="btn btn-primary">Create Animal</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Exhibit</th>
                        <th>Images Count</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($animals as $animal)
                    <tr>
                        <td>{{ $animal->id }}</td>
                        <td>{{ $animal->name }}</td>
                        <td>{{ $animal->exhibit->name }}</td>
                        <td>{{ $animal->images_count }}</td>
                        <td>
                            <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>