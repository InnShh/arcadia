<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalImage;
use Illuminate\Http\Request;

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
            'image_path' => 'required|string|max:255',
        ]);

        AnimalImage::create($validated);

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
            'image_path' => 'required|string|max:255',
        ]);

        $animalImage->update($validated);

        return redirect()->route('animal-images.index')->with('success', 'Animal image updated successfully.');
    }

    public function destroy(AnimalImage $animalImage)
    {
        $animalImage->delete();

        return redirect()->route('animal-images.index')->with('success', 'Animal image deleted successfully.');
    }
}
