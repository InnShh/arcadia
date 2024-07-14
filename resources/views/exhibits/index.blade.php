<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Exhibits</h1>
            <a href="{{ route('exhibits.create') }}" class="btn btn-primary">Create Exhibit</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Animals Count</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exhibits as $exhibit)
                    <tr>
                        <td>{{ $exhibit->id }}</td>
                        <td>{{ $exhibit->name }}</td>
                        <td>{{ $exhibit->description }}</td>
                        <td>{{ $exhibit->animals_count }}</td>
                        <td>
                            <a href="{{ route('exhibits.edit', $exhibit->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('exhibits.destroy', $exhibit->id) }}" method="POST" style="display:inline-block;">
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