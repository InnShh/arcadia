<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExhibitRequest;
use App\Http\Requests\UpdateExhibitRequest;
use App\Models\Exhibit;
use Illuminate\Http\Request;

class ExhibitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exhibits = Exhibit::withCount('animals')->get();
        return view('exhibits.index', compact('exhibits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('exhibits.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'slug' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'state_at' => 'nullable|datetime',
            'state' => 'nullable|string',
        ]);

        Exhibit::create($validated);

        return redirect()->route('exhibits.index')->with('success', 'Exhibit created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Exhibit $exhibit)
    {
        $exhibit->load(['images', 'animals.images']);
        return view('exhibits.show', compact('exhibit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exhibit $exhibit)
    {
        return view('exhibits.edit', compact('exhibit'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateExhibitRequest $request, Exhibit $exhibit)
    public function update(Request $request, Exhibit $exhibit)
    {
        $validated = $request->validate([
            'slug' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'state_at' => 'nullable|date',
            'state' => 'nullable|string',
        ]);

        $exhibit->update($validated);

        return redirect()->route('exhibits.index')->with('success', 'Exhibit updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exhibit $exhibit)
    {
        $exhibit->delete();

        return redirect()->route('exhibits.index')->with('success', 'Exhibit deleted successfully.');
    }
}
