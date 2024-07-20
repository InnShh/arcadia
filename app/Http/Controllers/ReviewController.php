<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateReviewRequest;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        return view('reviews.create');
    }
    public function store(StoreUpdateReviewRequest $request)
    {
        $validatedData = $request->validated();

        Review::create([
            'pseudo' => $validatedData['name'],
            'comment' => $validatedData['message'],
            'rating' => $validatedData['rating'],
            'approved' => false, // Default to false for moderation
        ]);

        return response()->json(['success' => true]);
    }

    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
    }

    public function edit(Review $review)
    {
        return view('reviews.edit', compact('review'));
    }

    public function update(StoreUpdateReviewRequest $request, Review $review)
    {
        $validated = $request->validated();
        $validated['approved'] = $request->input('approved', 0);

        $review->update($validated);

        return redirect()->route('reviews.index')->with('success', 'Review updated successfully.');
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully.');
    }

    public function approve(Review $review)
    {
        $review->update(['approved' => 1]);

        return redirect()->route('reviews.index')->with('success', 'Review approved successfully.');
    }
}
