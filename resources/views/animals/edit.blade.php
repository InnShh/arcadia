<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Animal</h1>
            <form action="{{ route('animals.update', $animal->id) }}" method="POST">
                @csrf
                @method('PUT')
                <x-select-field name="exhibit_id" label="Exhibit:" :selected="$animal->exhibit_id" :items="$exhibits" />
                <x-string-field name="slug" :value="$animal->slug" />
                <x-string-field name="name" :value="$animal->name" />
                <x-submit-button text="Update" />
            </form>
        </div>
    </div>
</x-app-layout>