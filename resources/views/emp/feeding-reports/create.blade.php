<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Create Feeding Report</h1>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <form action="{{ route('feeding-reports.store') }}" method="POST">
                @csrf
                <x-select-field name="animal_id" label="Animal:" :items="$animals" />
                <x-select-field name="user_id" label="Employee:" :items="$employees" :selected="auth()->user()->id" />
                <x-string-field name="food" type="text" />
                <x-string-field name="food_vol" type="number" label="Volume (grams)" />
                <x-text-field name="details" />
                <x-submit-button text="Create" />
            </form>
        </div>
    </div>
</x-app-layout>