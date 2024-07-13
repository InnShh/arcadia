<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Activity;
use App\Models\Animal;
use App\Models\Exhibit;

class HomePageController extends Controller
{
    function index()
    {
        $animals = Animal::with(['images', 'exhibit'])->take(4)->get();
        $exhibits = Exhibit::with(['images'])->get();
        $reviews = Review::where('approved', true)->latest()->take(13)->get();
        $activities = Activity::all();
        return view('homepage', compact(
            'reviews',
            'activities',
            'exhibits',
            'animals',
        ));
    }
    function loadMoreAnimals(Request $request)
    {
        $offset = $request->input('offset');
        $limit = 4;
        $animals = Animal::with(['images', 'exhibit'])->skip($offset)->take($limit)->get();
        $totalAnimals = Animal::count();
        $hasMore = $offset + $limit < $totalAnimals;
        $html = view('partials.animal-cards', compact('animals'))->render();
        return response()->json(['html' => $html, 'hasMore' => $hasMore]);
    }
}
