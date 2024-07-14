<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Activity</h1>
            <form action="{{ route('activities.update', $activity->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="text" name="image" id="image" class="form-control" value="{{ $activity->image }}" required>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $activity->name }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" required>{{ $activity->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>