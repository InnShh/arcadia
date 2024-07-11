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
        $animals = Animal::with(['images', 'exhibit'])->get();
        $exhibits = Exhibit::with(['images'])->get();
        $reviews = Review::where('approved', True)->latest()->take(13)->get();
        $activities = Activity::all();
        return view('homepage', compact(
            'reviews',
            'activities',
            'exhibits',
            'animals',
        ));
    }
}
