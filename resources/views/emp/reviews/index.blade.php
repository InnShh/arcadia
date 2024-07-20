<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Pending Reviews</h1>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if($reviews->isEmpty())
            <div class="alert alert-info">
                No pending reviews.
            </div>
            @else
            @foreach ($reviews as $review)
            <x-review-card :review="$review" />
            @endforeach
            @endif
        </div>
    </div>
</x-app-layout>