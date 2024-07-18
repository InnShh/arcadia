<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Veterinary Report</h1>
            <form action="{{ route('veterinary-reports.update', $veterinaryReport) }}" method="POST">
                @csrf
                @method('PUT')
                <x-select-field name="animal_id" label="Animal:" :selected="$veterinaryReport->animal_id" :items="$animals" />
                <x-select-field name="user_id" label="Veterinary:" :selected="$veterinaryReport->user_id" :items="$veterinarians" />
                <div class="form-group">
                    <label for="visit_date">Visit Date</label>
                    <input type="date" name="visit_date" id="visit_date" class="form-control" value="{{ $veterinaryReport->visit_date }}">
                </div>
                <x-text-field name="details" :value="$veterinaryReport->details" />
                <x-submit-button text="Update" />
            </form>
        </div>
    </div>
</x-app-layout>