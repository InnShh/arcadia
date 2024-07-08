<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class HomePageController extends Controller
{
    function index() {
        $reviews = Review::where('approved',True)->latest()->take(13)->get();
        return view('homepage',compact('reviews'));
    }
}
