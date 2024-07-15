<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Veterinary Reports</h1>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <a href="{{ route('veterinary-reports.create') }}" class="btn btn-primary">Create Veto Report</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Animal</th>
                        <th>Veterinarian</th>
                        <th>Visit Date</th>
                        <th>Details</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vetoReports as $vetoReport)
                    <tr>
                        <td>{{ $vetoReport->id }}</td>
                        <td>{{ $vetoReport->animal->name }}</td>
                        <td>{{ $vetoReport->veto->name }}</td>
                        <td>{{ $vetoReport->visit_date }}</td>
                        <td>{{ $vetoReport->details }}</td>
                        <td>
                            <a href="{{ route('veterinary-reports.show', $vetoReport->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('veterinary-reports.edit', $vetoReport->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('veterinary-reports.destroy', $vetoReport->id) }}" method="POST" style="display:inline-block;">
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