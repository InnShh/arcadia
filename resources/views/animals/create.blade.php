<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Create Animal</h1>
            <form action="{{ route('animals.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-select-field name="exhibit_id" label="Exhibit:" :items="$exhibits" />
                <x-string-field name="slug" />
                <x-string-field name="name" />
                <x-upload-field name="image_file" label="Avatar image:">
                    <p>📸 Please upload your image as a <b>JPG</b>, sized <b>400x400</b> pixels, and at <b>90%</b> quality to keep our website speedy on mobile devices. The maximum file size is <b>100KB</b>.</p>
                    <p>If adjusting the image sounds tricky, a friendly graphics designer or photographer can easily help you out!</p>
                </x-upload-field>
                <x-submit-button text="Create" />
            </form>
        </div>
    </div>
</x-app-layout>