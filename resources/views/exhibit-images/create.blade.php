<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Add Exhibit Image</h1>
            <form action="{{ route('exhibit-images.store') }}" method="POST">
                @csrf
                <x-select-field name="exhibit_id" label="Exhibit:" :items="$exhibits" />
                <x-string-field name="image_path" />
                <x-submit-button text="Add" />
            </form>
        </div>
    </div>
</x-app-layout>