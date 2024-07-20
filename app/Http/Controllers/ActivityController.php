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
        $activities = Activity::all();
        return view('activities.index', compact('activities'));
    }

    public function create()
    {
        return view('activities.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $activity = new Activity();
        if ($request->hasFile('image_file')) {
            $imageName = 'image_' . Str::uuid() . '.' . $request->image_file->extension();
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
        return view('activities.show', compact('activity'));
    }

    public function edit(Activity $activity)
    {
        return view('activities.edit', compact('activity'));
    }

    public function update(Request $request, Activity $activity)
    {
        $validated = $request->validate([
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        if ($request->hasFile('image_file')) {
            $imageName = 'image_' . Str::uuid() . '.' . $request->image_file->extension();
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
        $activity->delete();

        return redirect()->route('activities.index')->with('success', 'Activity deleted successfully.');
    }
}
