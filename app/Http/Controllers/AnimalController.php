<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnimalRequest;
use App\Http\Requests\UpdateAnimalRequest;
use App\Models\Animal;
use App\Models\Exhibit;
use File;
use Illuminate\Http\Request;
use Str;

class AnimalController extends Controller
{
    public function show(Exhibit $exhibit, Animal $animal)
    {
        $animal->load(['images', 'exhibit.images']);
        return view('animals.show', compact('animal'));
    }
    public function index()
    {
        $animals = Animal::with('exhibit')->withCount('images')->get();
        return view('animals.index', compact('animals'));
    }

    public function create()
    {
        $exhibits = Exhibit::all();
        return view('animals.create', compact('exhibits'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'exhibit_id' => 'required|exists:exhibits,id',
            'slug' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'image_file' => 'nullable|image|mimes:jpeg,jpg|dimensions:min_width=400,max_width=400,min_height=400,max_height=400|max:100',
        ]);

        $animal = new Animal();
        if ($request->hasFile('image_file')) {
            $imageName = 'image_' . Str::uuid() . '.jpg'; // . $request->image_file->extension();
            $request->image_file->move(public_path('images'), $imageName);
            $animal->avatar_image_path = 'images/' . $imageName;
        }
        $animal->exhibit_id = $validated['exhibit_id'];
        $animal->slug = $validated['slug'];
        $animal->name = $validated['name'];
        $animal->save();

        return redirect()->route('animals.index')->with('success', 'Animal created successfully.');
    }

    public function edit(Animal $animal)
    {
        $exhibits = Exhibit::all();
        return view('animals.edit', compact('animal', 'exhibits'));
    }

    public function update(Request $request, Animal $animal)
    {
        $validated = $request->validate([
            'exhibit_id' => 'required|exists:exhibits,id',
            'slug' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'image_file' => 'nullable|image|mimes:jpeg,jpg|dimensions:min_width=400,max_width=400,min_height=400,max_height=400|max:100',
        ]);

        if ($request->hasFile('image_file')) {
            $imageName = 'image_' . Str::uuid() . '.jpg'; // . $request->image_file->extension();
            $request->image_file->move(public_path('images'), $imageName);
            if ($animal->image && File::exists(public_path($animal->image))) {
                File::delete(public_path($animal->image));
            }
            $animal->avatar_image_path = 'images/' . $imageName;
        }
        $animal->exhibit_id = $validated['exhibit_id'];
        $animal->slug = $validated['slug'];
        $animal->name = $validated['name'];
        $animal->save();

        return redirect()->route('animals.index')->with('success', 'Animal updated successfully.');
    }

    public function destroy(Animal $animal)
    {
        $animal->delete();

        return redirect()->route('animals.index')->with('success', 'Animal deleted successfully.');
    }
}
