<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use File;
use Illuminate\Http\Request;
use Str;

class ActivityController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        if (!$user->isAdmin() && !$user->isEmployee()) {
            abort(403);
        }
        $activities = Activity::all();
        return view('activities.index', compact('activities'));
    }

    public function create()
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        if (!$user->isAdmin()) {
            abort(403);
        }

        return view('activities.create');
    }

    public function store(Request $request)
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        if (!$user->isAdmin()) {
            abort(403);
        }

        $validated = $request->validate([
            'image_file' => 'nullable|image|mimes:jpeg,jpg|dimensions:min_width=660,max_width=660,min_height=440,max_height=440|max:200',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $activity = new Activity();
        if ($request->hasFile('image_file')) {
            $imageName = 'image_' . Str::uuid() . '.jpg'; // . $request->image_file->extension();
            $request->image_file->move(public_path('images'), $imageName);
            if ($activity->image && File::exists(public_path($activity->image))) {
                File::delete(public_path($activity->image));
            }
            $activity->image = 'images/' . $imageName;
        }
        $activity->name = $validated['name'];
        $activity->description = $validated['description'];
        $activity->save();

        return redirect()->route('activities.index')->with('success', 'Activity created successfully.');
    }

    public function show(Activity $activity)
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        if (!$user->isAdmin() && !$user->isEmployee()) {
            abort(403);
        }
        return view('activities.show', compact('activity'));
    }

    public function edit(Activity $activity)
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        if (!$user->isAdmin() && !$user->isEmployee()) {
            abort(403);
        }
        return view('activities.edit', compact('activity'));
    }

    public function update(Request $request, Activity $activity)
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        if (!$user->isAdmin() && !$user->isEmployee()) {
            abort(403);
        }
        $validated = $request->validate([
            'image_file' => 'nullable|image|mimes:jpeg,jpg|dimensions:min_width=660,max_width=660,min_height=440,max_height=440|max:200',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        if ($request->hasFile('image_file')) {
            $imageName = 'image_' . Str::uuid() . '.jpg'; // . $request->image_file->extension();
            $request->image_file->move(public_path('images'), $imageName);
            if ($activity->image && File::exists(public_path($activity->image))) {
                File::delete(public_path($activity->image));
            }
            $activity->image = 'images/' . $imageName;
        }
        $activity->name = $validated['name'];
        $activity->description = $validated['description'];
        $activity->save();

        return redirect()->route('activities.index')->with('success', 'Activity updated successfully.');
    }

    public function destroy(Activity $activity)
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        if (!$user->isAdmin()) {
            abort(403);
        }
        if ($activity->image && File::exists(public_path($activity->image))) {
            File::delete(public_path($activity->image));
        }
        $activity->delete();

        return redirect()->route('activities.index')->with('success', 'Activity deleted successfully.');
    }
}
