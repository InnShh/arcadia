<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Exhibit Image</h1>
            <form action="{{ route('exhibit-images.update', $exhibitImage->id) }}" method="POST">
                @csrf
                @method('PUT')
                <x-select-field name="exhibit_id" label="Exhibit:" :selected="$exhibitImage->exhibit_id" :items="$exhibits" />
                <x-string-field name="image_path" :value="$exhibitImage->image_path" />
                <x-submit-button text="Update" />
            </form>
        </div>
    </div>
</x-app-layout>