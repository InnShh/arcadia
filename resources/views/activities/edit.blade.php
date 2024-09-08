<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Activity</h1>
            <form action="{{ route('activities.update', $activity->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-upload-field name="image_file" label="Image:" required="0">
                    <p>📸 Please upload your image as a <b>JPG</b>, sized <b>660x440</b> pixels, and at <b>90%</b> quality to keep our website speedy on mobile devices. The maximum file size is <b>200KB</b>.</p>
                    <p>If adjusting the image sounds tricky, a friendly graphics designer or photographer can easily help you out!</p>
                    <p><b>Current image will be deleted.</b></p>
                </x-upload-field>
                <x-string-field name="name" :value="$activity->name" required="1" />
                <x-text-field name="description" :value="$activity->description" required="1" />
                <x-submit-button text="Update" />
            </form>
        </div>
    </div>
</x-app-layout>