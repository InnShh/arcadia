<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnimalRequest;
use App\Http\Requests\UpdateAnimalRequest;
use App\Models\Animal;
use App\Models\Exhibit;
use Illuminate\Http\Request;

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
        ]);

        Animal::create($validated);

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
        ]);

        $animal->update($validated);

        return redirect()->route('animals.index')->with('success', 'Animal updated successfully.');
    }

    public function destroy(Animal $animal)
    {
        $animal->delete();

        return redirect()->route('animals.index')->with('success', 'Animal deleted successfully.');
    }
}
