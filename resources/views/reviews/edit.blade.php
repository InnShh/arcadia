<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Review</h1>
            <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                @csrf
                @method('PUT')
                <x-string-field name="pseudo" :value="$review->pseudo" />
                <x-text-field name="comment" :value="$review->comment" />
                <x-string-field name="rating" type="number" :value="$review->rating" />
                <div class="form-group form-check">
                    <input type="checkbox" name="approved" id="approved" class="form-check-input" value="1" {{ $review->approved ? 'checked' : '' }}>
                    <label class="form-check-label" for="approved">Approved</label>
                </div>
                <x-submit-button text="Update" />
            </form>
        </div>
    </div>
</x-app-layout>