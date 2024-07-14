<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Create Activity</h1>
            <form action="{{ route('activities.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="text" name="image" id="image" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</x-app-layout>