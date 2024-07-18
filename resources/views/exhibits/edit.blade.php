<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Exhibit</h1>
            <form action="{{ route('exhibits.update', $exhibit) }}" method="POST">
                @csrf
                @method('PUT')
                <x-string-field name="slug" :value="$exhibit->slug" />
                <x-string-field name="name" :value="$exhibit->name" />
                <x-text-field name="description" :value="$exhibit->description" />
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>