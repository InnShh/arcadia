<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'pseudo' => $validatedData['name'],
            'comment' => $validatedData['message'],
            'rating' => $validatedData['rating'],
            'approved' => false, // Default to false for moderation
        ]);

        return response()->json(['success' => true]);
    }
}
