<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Exhibit Images</h1>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <a href="{{ route('exhibit-images.create') }}" class="btn btn-primary">Add Image</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Exhibit</th>
                        <th>Image Path</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($images as $image)
                    <tr>
                        <td>{{ $image->id }}</td>
                        <td>{{ $image->exhibit->name }}</td>
                        <td><img src="{{ $image->image_path }}" alt="Image" style="width: 100px; height: 100px;"></td>
                        <td>
                            <a href="{{ route('exhibit-images.edit', $image->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('exhibit-images.destroy', $image->id) }}" method="POST" style="display:inline-block;">
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