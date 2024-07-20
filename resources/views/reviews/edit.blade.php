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
                <div class="form-group">
                    <label for="approved">Moderation status:</label>
                    <select name="approved" id="approved" class="form-control @error('approved')is-invalid @enderror">
                        <option value="" @selected(old('approved',is_null($review->approved)?"":false)=="")>Pending</option>
                        <option value="0" @selected(old('approved',(string)$review->approved)=="0")>Rejected</option>
                        <option value="1" @selected(old('approved',(string)$review->approved)=="1")>Approved</option>
                    </select>
                    @error('approved')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <x-submit-button text="Update" />
            </form>
        </div>
    </div>
</x-app-layout>