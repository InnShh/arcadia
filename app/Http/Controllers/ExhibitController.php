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
        /** @var \App\Models\User */
        $user = auth()->user();
        if ($user->isVeterinary()) {
            $exhibits = Exhibit::withCount('animals')->get();
            return view('vet.exhibits.index', compact('exhibits'));
        } elseif ($user->isAdmin()) {
            $exhibits = Exhibit::withCount('animals')->get();
            return view('exhibits.index', compact('exhibits'));
        }
        abort(403);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        if (!$user->isAdmin()) {
            abort(403);
        }
        return view('exhibits.create');
    }

    public function store(Request $request)
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        if (!$user->isAdmin()) {
            abort(403);
        }
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
        /** @var \App\Models\User */
        $user = auth()->user();
        if (!$user->isAdmin()) {
            abort(403);
        }
        return view('exhibits.edit', compact('exhibit'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateExhibitRequest $request, Exhibit $exhibit)
    public function update(Request $request, Exhibit $exhibit)
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        if (!$user->isAdmin() && !$user->isVeterinary()) {
            abort(403);
        }
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
        /** @var \App\Models\User */
        $user = auth()->user();
        if (!$user->isAdmin() && !$user->isVeterinary()) {
            abort(403);
        }
        $exhibit->delete();

        return redirect()->route('exhibits.index')->with('success', 'Exhibit deleted successfully.');
    }

    public function state(Exhibit $exhibit)
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        if (!$user->isVeterinary()) {
            abort(403);
        }
        return view('vet.exhibits.state', compact('exhibit'));
    }

    public function stateUpdate(Request $request, Exhibit $exhibit)
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        if (!$user->isVeterinary()) {
            abort(403);
        }
        $validated = $request->validate([
            'state_at' => 'nullable|date',
            'state' => 'nullable|string',
        ]);

        $exhibit->state_at = $validated['state_at'];
        $exhibit->state = $validated['state'];
        $exhibit->save();

        return redirect()->route('exhibits.index')->with('success', 'Exhibit state updated successfully.');
    }
}
