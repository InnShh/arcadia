<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalImage;
use File;
use Illuminate\Http\Request;
use Str;

class AnimalImageController extends Controller
{
    public function index()
    {
        $images = AnimalImage::with('animal')->get();
        return view('animal-images.index', compact('images'));
    }

    public function create()
    {
        $animals = Animal::all();
        return view('animal-images.create', compact('animals'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'image_file' => 'nullable|image|mimes:jpeg,jpg|dimensions:min_width=1320,max_width=1320,min_height=880,max_height=880|max:1024',
        ]);

        $animalImage = new AnimalImage();
        if ($request->hasFile('image_file')) {
            $imageName = 'image_' . Str::uuid() . '.jpg'; // . $request->image_file->extension();
            $request->image_file->move(public_path('images'), $imageName);
            $animalImage->image_path = 'images/' . $imageName;
        }
        $animalImage->animal_id = $validated['animal_id'];
        $animalImage->save();

        return redirect()->route('animal-images.index')->with('success', 'Animal image created successfully.');
    }

    public function edit(AnimalImage $animalImage)
    {
        $animals = Animal::all();
        return view('animal-images.edit', compact('animalImage', 'animals'));
    }

    public function update(Request $request, AnimalImage $animalImage)
    {
        $validated = $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'image_file' => 'nullable|image|mimes:jpeg,jpg|dimensions:min_width=1320,max_width=1320,min_height=880,max_height=880|max:1024',
        ]);

        if ($request->hasFile('image_file')) {
            $imageName = 'image_' . Str::uuid() . '.jpg'; // . $request->image_file->extension();
            $request->image_file->move(public_path('images'), $imageName);
            if ($animalImage->image_path && File::exists(public_path($animalImage->image_path))) {
                File::delete(public_path($animalImage->image_path));
            }
            $animalImage->image_path = 'images/' . $imageName;
        }
        $animalImage->animal_id = $validated['animal_id'];
        $animalImage->save();

        return redirect()->route('animal-images.index')->with('success', 'Animal image updated successfully.');
    }

    public function destroy(AnimalImage $animalImage)
    {
        $animalImage->delete();

        return redirect()->route('animal-images.index')->with('success', 'Animal image deleted successfully.');
    }
}
