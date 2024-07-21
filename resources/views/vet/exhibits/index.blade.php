<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Exhibits</h1>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th class="dash-activity-id">ID</th>
                        <th>Name</th>
                        <th>Animals Count</th>
                        <th>Exhibit state</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exhibits as $exhibit)
                    <tr>
                        <td class="dash-activity-id">{{ $exhibit->id }}</td>
                        <td>{{ $exhibit->name }}</td>
                        <td>{{ $exhibit->animals_count }}</td>
                        <td>{{ $exhibit->state }}<br /><x-date-badge :datetime="$exhibit->state_at" /></td>
                        <td>
                            <a href="{{ route('exhibits.state.edit', $exhibit) }}" class="btn btn-warning">Change state</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>