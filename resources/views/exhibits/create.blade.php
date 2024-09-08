<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Create Exhibit</h1>
            <form action="{{ route('exhibits.store') }}" method="POST">
                @csrf
                <x-string-field name="slug" required="1" />
                <x-string-field name="name" required="1" />
                <x-text-field name="description" required="1" />
                <x-datetime-field name="state_at" label="State updated at:" required="0" />
                <x-text-field name="state" required="0" />
                <x-submit-button text="Create" />
            </form>
        </div>
    </div>
</x-app-layout>