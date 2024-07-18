<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Create Exhibit</h1>
            <form action="{{ route('exhibits.store') }}" method="POST">
                @csrf
                <x-string-field name="slug" />
                <x-string-field name="name" />
                <x-text-field name="description" />
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</x-app-layout>