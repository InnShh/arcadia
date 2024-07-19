<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Create Feeding Report</h1>
            <form action="{{ route('feeding-reports.store') }}" method="POST">
                @csrf
                <x-select-field name="animal_id" label="Animal:" :items="$animals" />
                <x-select-field name="user_id" label="Employee:" :items="$employees" />
                <x-string-field name="food" type="text" />
                <x-string-field name="food_vol" type="number" />
                <x-text-field name="details" />
                <x-submit-button text="Create" />
            </form>
        </div>
    </div>
</x-app-layout>