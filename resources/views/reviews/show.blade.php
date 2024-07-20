<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Review Details</h1>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Review by {{ $review->pseudo }}
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <x-star-rating :rating="$review->rating" />
                        <span class="rating">{{ $review->rating }}</span>
                        <p class="general-text">{{ $review->comment }}</p>
                        <span>{{ $review->pseudo }}</span><br />
                        <span>{{ \Carbon\Carbon::parse($review->created_at)->format('m/d/Y') }}</span><br />
                        <x-approved-display :approved="$review->approved" />
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>