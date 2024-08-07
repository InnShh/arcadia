<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Exhibit</h1>
            <form action="{{ route('exhibits.update', $exhibit) }}" method="POST">
                @csrf
                @method('PUT')
                <x-string-field name="slug" :value="$exhibit->slug" />
                <x-string-field name="name" :value="$exhibit->name" />
                <x-text-field name="description" :value="$exhibit->description" />
                <x-datetime-field name="state_at" label="State updated at:" :value="$exhibit->state_at" />
                <x-text-field name="state" :value="$exhibit->state" />
                <x-submit-button text="Update" />
            </form>
        </div>
    </div>
</x-app-layout>