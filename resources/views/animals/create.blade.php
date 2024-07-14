<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Create Animal</h1>
            <form action="{{ route('animals.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exhibit_id">Exhibit</label>
                    <select name="exhibit_id" id="exhibit_id" class="form-control" required>
                        @foreach ($exhibits as $exhibit)
                        <option value="{{ $exhibit->id }}">{{ $exhibit->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</x-app-layout>