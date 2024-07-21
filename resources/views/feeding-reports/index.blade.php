<!-- resources/views/feeding-reports/index.blade.php -->
<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Feeding Reports</h1>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <a href="{{ route('feeding-reports.create') }}" class="btn btn-primary">Create Feeding Report</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Animal</th>
                        <th>Employee</th>
                        <th>Food</th>
                        <th>Food Volume (g)</th>
                        <th>Details</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feedingReports as $feedingReport)
                    <tr>
                        <td>{{ $feedingReport->id }}</td>
                        <td>{{ $feedingReport->animal->name }}</td>
                        <td>{{ $feedingReport->user->name }}</td>
                        <td>{{ $feedingReport->food }}</td>
                        <td>{{ $feedingReport->food_vol }}</td>
                        <td>{{ $feedingReport->details }}</td>
                        <td>
                            <a href="{{ route('feeding-reports.show', $feedingReport->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('feeding-reports.edit', $feedingReport->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('feeding-reports.destroy', $feedingReport->id) }}" method="POST" style="display:inline-block;">
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