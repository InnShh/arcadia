<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Animal</h1>
            <form action="{{ route('animals.update', $animal->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-select-field name="exhibit_id" label="Exhibit:" :selected="$animal->exhibit_id" :items="$exhibits" required="1" />
                <x-string-field name="slug" :value="$animal->slug" required="1" />
                <x-string-field name="name" :value="$animal->name" required="1" />
                <x-upload-field name="image_file" label="Avatar image:" required="0">
                    <p>📸 Please upload your image as a <b>JPG</b>, sized <b>400x400</b> pixels, and at <b>90%</b> quality to keep our website speedy on mobile devices. The maximum file size is <b>100KB</b>.</p>
                    <p>If adjusting the image sounds tricky, a friendly graphics designer or photographer can easily help you out!</p>
                    <p><b>Current image will be deleted.</b></p>
                </x-upload-field>
                <x-submit-button text="Update" />
            </form>
        </div>
    </div>
</x-app-layout>