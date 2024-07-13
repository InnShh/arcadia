<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Activity;
use App\Models\Animal;
use App\Models\Exhibit;
use Mail;

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
    public function sendMessage(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'telephone' => 'nullable|string|max:15',
            'email' => 'required|email|max:255',
            'message' => 'required|string'
        ]);
        $emailData = [
            'firstName' => $validatedData['firstName'],
            'lastName' => $validatedData['lastName'],
            'telephone' => $validatedData['telephone'],
            'email' => $validatedData['email'],
            'message' => $validatedData['message']
        ];
        Mail::send([], [], function ($message) use ($emailData) {
            $message->to(config('mail.from.address'))
                ->subject('Contact Form Message')
                ->text('First Name: ' . $emailData['firstName'] . "\n" .
                    'Last Name: ' . $emailData['lastName'] . "\n" .
                    'Telephone: ' . $emailData['telephone'] . "\n" .
                    'Email: ' . $emailData['email'] . "\n" .
                    'Message: ' . $emailData['message']);
        });

        return response()->json(['success' => 'Your message has been sent successfully!']);
    }
}
