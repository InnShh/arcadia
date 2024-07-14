<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExhibitImageRequest;
use App\Http\Requests\UpdateExhibitImageRequest;
use App\Models\Exhibit;
use App\Models\ExhibitImage;
use Illuminate\Http\Request;

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
            'image_path' => 'required|string|max:255',
        ]);

        ExhibitImage::create($validated);

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
            'image_path' => 'required|string|max:255',
        ]);

        $exhibitImage->update($validated);

        return redirect()->route('exhibit-images.index')->with('success', 'Exhibit image updated successfully.');
    }

    public function destroy(ExhibitImage $exhibitImage)
    {
        $exhibitImage->delete();

        return redirect()->route('exhibit-images.index')->with('success', 'Exhibit image deleted successfully.');
    }
}
