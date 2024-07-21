<!-- resources/views/feeding-reports/show.blade.php -->
<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Feeding Report Details</h1>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Report #{{ $feedingReport->id }}
                </div>
                <div class="card-body">
                    <p><strong>Animal:</strong> {{ $feedingReport->animal->name }}</p>
                    <p><strong>Employee:</strong> {{ $feedingReport->user->name }}</p>
                    <p><strong>Food:</strong> {{ $feedingReport->food }}</p>
                    <p><strong>Food Volume:</strong> {{ $feedingReport->food_vol }} kg</p>
                    <p><strong>Details:</strong> {{ $feedingReport->details }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>