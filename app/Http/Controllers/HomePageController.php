<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Activity;

class HomePageController extends Controller
{
    function index()
    {
        $reviews = Review::where('approved', True)->latest()->take(13)->get();
        $activities = Activity::all();
        return view('homepage', compact('reviews', 'activities'));
    }
}
