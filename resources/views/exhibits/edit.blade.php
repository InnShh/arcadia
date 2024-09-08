<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Exhibit</h1>
            <form action="{{ route('exhibits.update', $exhibit) }}" method="POST">
                @csrf
                @method('PUT')
                <x-string-field name="slug" :value="$exhibit->slug" required="1" />
                <x-string-field name="name" :value="$exhibit->name" required="1" />
                <x-text-field name="description" :value="$exhibit->description" required="1" />
                <x-datetime-field name="state_at" label="State updated at:" :value="$exhibit->state_at" required="0" />
                <x-text-field name="state" :value="$exhibit->state" required="0" />
                <x-submit-button text="Update" />
            </form>
        </div>
    </div>
</x-app-layout>