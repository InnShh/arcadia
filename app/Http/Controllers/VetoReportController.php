<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\User;
use App\Models\VetoReport;
use App\Rules\VeterinaryUser;
use Illuminate\Http\Request;

class VetoReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        if (!$user->isAdmin()) {
            abort(403);
        }
        $vetoReports = VetoReport::with('animal', 'veto')->get();
        return view('veterinary-reports.index', compact('vetoReports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        if ($user->isVeterinary()) {
            $animalId = $request->input('for', null);
            if ($animalId) {
                $animals = collect([Animal::findOrFail($animalId)]);
            } else {
                $animals = Animal::all();
            }
            $veterinarians = collect([$user]);
            return view('veterinary-reports.create', compact('animals', 'veterinarians'));
        } elseif ($user->isAdmin()) {
            $animals = Animal::all();
            $veterinarians = User::veterinary()->get();
            return view('veterinary-reports.create', compact('animals', 'veterinarians'));
        }
        abort(403);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        if (!$user->isVeterinary() && !$user->isAdmin()) {
            abort(403);
        }
        $validated = $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'user_id' => ['required', 'exists:users,id', new VeterinaryUser()],
            'visit_date' => 'nullable|date',
            'details' => 'nullable|string',
        ]);

        if ($user->isVeterinary() && $validated['user_id'] !== (string) $user->id) {
            abort(403);
        }

        VetoReport::create($validated);

        if ($user->isVeterinary()) {
            return redirect()->route('animals.index')->with('success', 'Veterinary Report created successfully.');
        }

        return redirect()->route('veterinary-reports.index')->with('success', 'Veterinary Report created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(VetoReport $veterinaryReport)
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        if (!$user->isAdmin()) {
            abort(403);
        }
        return view('veterinary-reports.show', compact('veterinaryReport'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VetoReport $veterinaryReport)
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        if (!$user->isAdmin()) {
            abort(403);
        }
        $animals = Animal::all();
        $veterinarians = User::veterinary()->get();
        return view('veterinary-reports.edit', compact('veterinaryReport', 'animals', 'veterinarians'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VetoReport $veterinaryReport)
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        if (!$user->isAdmin()) {
            abort(403);
        }

        $validated = $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'user_id' => ['required', 'exists:users,id', new VeterinaryUser()],
            'visit_date' => 'nullable|date',
            'details' => 'nullable|string',
        ]);

        $veterinaryReport->update($validated);

        return redirect()->route('veterinary-reports.show', $veterinaryReport)->with('success', 'Veterinary Report updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VetoReport $veterinaryReport)
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        if (!$user->isAdmin()) {
            abort(403);
        }

        $veterinaryReport->delete();

        return redirect()->route('veterinary-reports.index')->with('success', 'Veterinary Report deleted successfully.');
    }
}
