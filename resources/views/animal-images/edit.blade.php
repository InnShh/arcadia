<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Animal Image</h1>
            <form action="{{ route('animal-images.update', $animalImage->id) }}" method="POST">
                @csrf
                @method('PUT')
                <x-select-field name="animal_id" label="Animal:" :selected="$animalImage->animal_id" :items="$animals" />
                <x-string-field name="image_path" :value="$animalImage->image_path" />
                <x-submit-button text="Update" />
            </form>
        </div>
    </div>
</x-app-layout>