<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Feeding Report</h1>
            <form action="{{ route('feeding-reports.update', $feedingReport->id) }}" method="POST">
                @csrf
                @method('PUT')
                <x-select-field name="animal_id" label="Animal:" :items="$animals" :value="$feedingReport->animal_id" />
                <x-select-field name="user_id" label="Employee:" :items="$employees" :value="$feedingReport->user_id" />
                <x-string-field name="food" type="text" :value="$feedingReport->food" />
                <x-string-field name="food_vol" type="number" :value="$feedingReport->food_vol" />
                <x-text-field name="details" :value="$feedingReport->details" />
                <x-submit-button text="Update" />
            </form>
        </div>
    </div>
</x-app-layout>