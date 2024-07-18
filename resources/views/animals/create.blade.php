<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Create Animal</h1>
            <form action="{{ route('animals.store') }}" method="POST">
                @csrf
                <x-select-field name="exhibit_id" label="Exhibit:" :items="$exhibits" />
                <x-string-field name="slug" />
                <x-string-field name="name" />
                <x-submit-button text="Create" />
            </form>
        </div>
    </div>
</x-app-layout>