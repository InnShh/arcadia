<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Animal</h1>
            <form action="{{ route('animals.update', $animal->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exhibit_id">Exhibit</label>
                    <select name="exhibit_id" id="exhibit_id" class="form-control" required>
                        @foreach ($exhibits as $exhibit)
                        <option value="{{ $exhibit->id }}" {{ $animal->exhibit_id == $exhibit->id ? 'selected' : '' }}>{{ $exhibit->name }}</option>
                        @endforeach
                    </select>
                </div>
                <x-string-field name="slug" :value="$animal->slug" />
                <x-string-field name="name" :value="$animal->name" />
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>