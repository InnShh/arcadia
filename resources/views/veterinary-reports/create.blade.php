<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Create Veterinary Report</h1>
            <form action="{{ route('veterinary-reports.store') }}" method="POST">
                @csrf
                <x-select-field name="animal_id" label="Animal:" :items="$animals" />
                <x-select-field name="user_id" label="Veterinary:" :items="$veterinarians" />
                <div class="form-group">
                    <label for="visit_date">Visit Date</label>
                    <input type="date" name="visit_date" id="visit_date" class="form-control">
                </div>
                <x-text-field name="details" />
                <x-submit-button text="Create" />
            </form>
        </div>
    </div>
</x-app-layout>