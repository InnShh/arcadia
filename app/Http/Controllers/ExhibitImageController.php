<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExhibitImageRequest;
use App\Http\Requests\UpdateExhibitImageRequest;
use App\Models\Exhibit;
use App\Models\ExhibitImage;
use File;
use Illuminate\Http\Request;
use Str;

class ExhibitImageController extends Controller
{
    public function index()
    {
        $images = ExhibitImage::all();
        return view('exhibit-images.index', compact('images'));
    }

    public function create()
    {
        $exhibits = Exhibit::all();
        return view('exhibit-images.create', compact('exhibits'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'exhibit_id' => 'required|exists:exhibits,id',
            'image_file' => 'nullable|image|mimes:jpeg,jpg|dimensions:min_width=1320,max_width=1320,min_height=880,max_height=880|max:1024',
        ]);

        $exhibitImage = new ExhibitImage();
        if ($request->hasFile('image_file')) {
            $imageName = 'image_' . Str::uuid() . '.jpg'; // . $request->image_file->extension();
            $request->image_file->move(public_path('images'), $imageName);
            $exhibitImage->image_path = 'images/' . $imageName;
        }
        $exhibitImage->exhibit_id = $validated['exhibit_id'];
        $exhibitImage->save();

        return redirect()->route('exhibit-images.index')->with('success', 'Exhibit image created successfully.');
    }

    public function edit(ExhibitImage $exhibitImage)
    {
        $exhibits = Exhibit::all();
        return view('exhibit-images.edit', compact('exhibitImage', 'exhibits'));
    }

    public function update(Request $request, ExhibitImage $exhibitImage)
    {
        $validated = $request->validate([
            'exhibit_id' => 'required|exists:exhibits,id',
            'image_file' => 'nullable|image|mimes:jpeg,jpg|dimensions:min_width=1320,max_width=1320,min_height=880,max_height=880|max:1024',
        ]);

        if ($request->hasFile('image_file')) {
            $imageName = 'image_' . Str::uuid() . '.jpg'; // . $request->image_file->extension();
            $request->image_file->move(public_path('images'), $imageName);
            $exhibitImage->image_path = 'images/' . $imageName;
        }
        $exhibitImage->exhibit_id = $validated['exhibit_id'];
        $exhibitImage->save();

        return redirect()->route('exhibit-images.index')->with('success', 'Exhibit image updated successfully.');
    }

    public function destroy(ExhibitImage $exhibitImage)
    {
        $exhibitImage->delete();

        return redirect()->route('exhibit-images.index')->with('success', 'Exhibit image deleted successfully.');
    }
}
