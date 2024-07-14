<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Exhibits</h1>
            <a href="{{ route('exhibits.create') }}" class="btn btn-primary">Create Exhibit</a>
            <table class="table">
                <thead>
                    <tr>
                        <th class="dash-activity-id">ID</th>
                        <th>Name</th>
                        <th class="dash-activity-id">Description</th>
                        <th>Animals Count</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exhibits as $exhibit)
                    <tr>
                        <td class="dash-activity-id">{{ $exhibit->id }}</td>
                        <td>{{ $exhibit->name }}</td>
                        <td class="dash-activity-id">{{ $exhibit->description }}</td>
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