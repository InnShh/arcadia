<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Create Veterinary Report</h1>
            <form action="{{ route('veterinary-reports.store') }}" method="POST">
                @csrf
                <x-select-field name="animal_id" label="Animal:" :items="$animals" required="1" />
                <x-select-field name="user_id" label="Veterinary:" :items="$veterinarians" required="1" />
                <x-date-field name="visit_date" label="Visit Date:" :value="old('visit_date',null)" required="1" />
                <x-text-field name="details" required="1" />
                <x-submit-button text="Create" />
            </form>
        </div>
    </div>
</x-app-layout>