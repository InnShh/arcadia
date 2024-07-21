<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Create Activity</h1>
            <form action="{{ route('activities.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-upload-field name="image_file" label="Image:">
                    <p>📸 Please upload your image as a <b>JPG</b>, sized <b>660x440</b> pixels, and at <b>90%</b> quality to keep our website speedy on mobile devices. The maximum file size is <b>200KB</b>.</p>
                    <p>If adjusting the image sounds tricky, a friendly graphics designer or photographer can easily help you out!</p>
                </x-upload-field>
                <x-string-field name="name" />
                <x-text-field name="description" />
                <x-submit-button text="Create" />
            </form>
        </div>
    </div>
</x-app-layout>