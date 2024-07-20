<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateReviewRequest;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User */
        $user = auth()->user();

        if ($user->isEmployee()) {
            $reviews = Review::whereNull('approved')->latest()->get();
            return view('emp.reviews.index', compact('reviews'));
        } elseif ($user->isAdmin()) {
            $reviews = Review::all();
            return view('reviews.index', compact('reviews'));
        }

        abort(403);
    }

    public function create()
    {
        return view('reviews.create');
    }
    public function store(StoreUpdateReviewRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['approved'] = null;

        Review::create($validatedData);

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

        return redirect()->route('reviews.index')->with('success', 'Review deleted.');
    }

    public function approve(Review $review)
    {
        $review->update(['approved' => 1]);

        return redirect()->route('reviews.index')->with('success', 'Review approved.');
    }

    public function reject(Review $review)
    {
        $review->update(['approved' => 0]);

        return redirect()->route('reviews.index')->with('success', 'Review rejected.');
    }
}
