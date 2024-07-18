<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Add Animal Image</h1>
            <form action="{{ route('animal-images.store') }}" method="POST">
                @csrf
                <x-select-field name="animal_id" label="Animal:" :items="$animals" />
                <x-string-field name="image_path" />
                <x-submit-button text="Add" />
            </form>
        </div>
    </div>
</x-app-layout>