<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\User;
use App\Models\VetoReport;
use Illuminate\Http\Request;

class VetoReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vetoReports = VetoReport::with('animal', 'veto')->get();
        return view('veterinary-reports.index', compact('vetoReports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $animals = Animal::all();
        $veterinarians = User::get(); // TODO only veterinary
        return view('veterinary-reports.create', compact('animals', 'veterinarians'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'user_id' => 'required|exists:users,id',
            'visit_date' => 'nullable|date',
            'details' => 'nullable|string',
        ]);

        VetoReport::create($validated);

        return redirect()->route('veterinary-reports.index')->with('success', 'Veterinary Report created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(VetoReport $veterinaryReport)
    {
        return view('veterinary-reports.show', compact('veterinaryReport'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VetoReport $veterinaryReport)
    {
        $animals = Animal::all();
        $veterinarians = User::get();
        return view('veterinary-reports.edit', compact('veterinaryReport', 'animals', 'veterinarians'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VetoReport $veterinaryReport)
    {
        $validated = $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'user_id' => 'required|exists:users,id', // TODO should be veterinary
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
        $veterinaryReport->delete();

        return redirect()->route('veterinary-reports.index')->with('success', 'Veterinary Report deleted successfully.');
    }
}
