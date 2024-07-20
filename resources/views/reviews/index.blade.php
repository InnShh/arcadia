<!-- resources/views/reviews/index.blade.php -->
<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Reviews</h1>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <a href="{{ route('homepage') }}#reviews-all" class="btn btn-primary">Create Review</a>
            <table class="table">
                <thead>
                    <tr>
                        <th class="td-visible-n">ID</th>
                        <th>Pseudo</th>
                        <th>Comment</th>
                        <th>Rating</th>
                        <th>Approved</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                    <tr>
                        <td class="td-visible-n">{{ $review->id }}</td>
                        <td>{{ $review->pseudo }}</td>
                        <td class="td-comm-w">{{ $review->comment }}</td>
                        <td>
                            <x-star-rating :rating="$review->rating" />
                            <span class="rating">{{ $review->rating }}</span>
                        </td>
                        <td>{{ $review->approved ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('reviews.show', $review->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>