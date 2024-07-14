<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Activity Details</h1>
            <div class="card">
                <div class="card-header">
                    {{ $activity->name }}
                </div>
                <div class="card-body">
                    <img src="{{ $activity->image }}" alt="{{ $activity->name }}" style="width: 100px; height: 100px;">
                    <p>{{ $activity->description }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('activities.edit', $activity->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('activities.destroy', $activity->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>