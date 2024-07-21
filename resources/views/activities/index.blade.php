<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Activities</h1>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if(auth()->user()->isAdmin())
            <a href="{{ route('activities.create') }}" class="btn btn-primary">Create Activity</a>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th class="dash-activity-id">ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th class="dash-activity-id">Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activities as $activity)
                    <tr>
                        <td class="dash-activity-id">{{ $activity->id }}</td>
                        <td>
                            @isset($activity->image)
                            <img src="{{ $activity->image }}" alt="{{ $activity->name }}" style="width: 50px; height: 50px;">
                            @endisset
                        </td>
                        <td>{{ $activity->name }}</td>
                        <td class="dash-activity-id">{{ $activity->description }}</td>
                        <td>
                            <a href="{{ route('activities.show', $activity->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('activities.edit', $activity->id) }}" class="btn btn-warning">Edit</a>
                            @if(auth()->user()->isAdmin())
                            <form action="{{ route('activities.destroy', $activity->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>