<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeedingReportRequest;
use App\Models\Animal;
use App\Models\FeedingReport;
use App\Models\User;
use Illuminate\Http\Request;

class FeedingReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        if ($user->isVeterinary()) {
            $query = FeedingReport::latest();
            $animalId = $request->input('for', null);
            if ($animalId) {
                $animal = Animal::findOrFail($animalId);
                $query->where('animal_id', $animal->id);
            } else {
                $animal = null;
            }
            $feedingReports = $query->get();
            return view('vet.feeding-reports.index', compact(['feedingReports', 'animal']));
        } elseif ($user->isAdmin()) {
            $feedingReports = FeedingReport::all();
            return view('feeding-reports.index', compact('feedingReports'));
        }
        abort(403);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $animals = Animal::all();
        /** @var \App\Models\User */
        $user = auth()->user();
        if ($user->isEmployee()) {
            $employees = collect([$user]);
            return view('emp.feeding-reports.create', compact('employees', 'animals'));
        } elseif ($user->isAdmin()) {
            $employees = User::employee()->get();
            return view('feeding-reports.create', compact('employees', 'animals'));
        }
        abort(403);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeedingReportRequest $request)
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        if ($user->isEmployee()) {
            $validated = $request->validated();
            if ($validated['user_id'] !== (string) $user->id) {
                abort(403);
            }
            $report = FeedingReport::create($validated);
            return redirect()->route('feeding-reports.create')->with('success', "Feeding report created successfully for {$report->animal->name}.");
        } elseif ($user->isAdmin()) {
            FeedingReport::create($request->validated());
            return redirect()->route('feeding-reports.index')->with('success', 'Feeding report created successfully.');
        }
        abort(403);
    }

    /**
     * Display the specified resource.
     */
    public function show(FeedingReport $feedingReport)
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        if ($user->isVeterinary()) {
            return view('vet.feeding-reports.show', compact('feedingReport'));
        } elseif ($user->isAdmin()) {
            return view('feeding-reports.show', compact('feedingReport'));
        }
        abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeedingReport $feedingReport)
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        if (!$user->isAdmin()) {
            abort(403);
        }
        $employees = User::employee()->get();
        $animals = Animal::all();
        return view('feeding-reports.edit', compact('feedingReport', 'employees', 'animals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreFeedingReportRequest $request, FeedingReport $feedingReport)
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        if (!$user->isAdmin()) {
            abort(403);
        }

        $feedingReport->update($request->validated());

        return redirect()->route('feeding-reports.index')->with('success', 'Feeding report updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeedingReport $feedingReport)
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        if (!$user->isAdmin()) {
            abort(403);
        }

        $feedingReport->delete();

        return redirect()->route('feeding-reports.index')->with('success', 'Feeding report deleted successfully.');
    }
}
