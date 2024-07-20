@props(['review'])

<div class="card" style="max-width: 800px; margin: 20px auto;">
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
        <form action="{{ route('reviews.approve', $review) }}" method="POST" style="display:inline-block;">
            @csrf
            <x-submit-button text="Approve" class="btn btn-success" />
        </form>
        <form action="{{ route('reviews.reject', $review) }}" method="POST" style="display:inline-block;">
            @csrf
            <x-submit-button text="Reject" class="btn btn btn-danger" />
        </form>
    </div>
</div>