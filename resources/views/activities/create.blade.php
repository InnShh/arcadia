<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Create Activity</h1>
            <form action="{{ route('activities.store') }}" method="POST">
                @csrf
                <x-string-field name="image" />
                <x-string-field name="name" />
                <x-text-field name="description" />
                <x-submit-button text="Create" />
            </form>
        </div>
    </div>
</x-app-layout>