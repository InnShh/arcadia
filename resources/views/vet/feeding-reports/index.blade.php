<!-- resources/views/feeding-reports/index.blade.php -->
<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Feeding Reports</h1>
            @isset($animal)
            <div class="alert alert-info">
                Showing feeds for animal {{ $animal->name }}
            </div>
            @endisset
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th class="dash-activity-id">ID</th>
                        <th>Animal</th>
                        <th>Employee</th>
                        <th>Food</th>
                        <th>Food Volume (g)</th>
                        <th>Details</th>
                        <th>When</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feedingReports as $feedingReport)
                    <tr>
                        <td class="dash-activity-id">{{ $feedingReport->id }}</td>
                        <td>{{ $feedingReport->animal->name }}</td>
                        <td>{{ $feedingReport->user->name }}</td>
                        <td>{{ $feedingReport->food }}</td>
                        <td>{{ $feedingReport->food_vol }}</td>
                        <td>{{ $feedingReport->details }}</td>
                        <td><x-date-badge :datetime="$feedingReport->created_at" /></td>
                        <td>
                            <a href="{{ route('feeding-reports.show', $feedingReport->id) }}" class="btn btn-info">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>