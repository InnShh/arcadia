<?php

namespace App\Http\Controllers;

use App\Models\Timetable;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function index()
    {
        $timetables = Timetable::all();
        return view('timetables.index', compact('timetables'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'timetables.*.id' => 'required|exists:timetables,id',
            'timetables.*.opening_time' => 'nullable|date_format:H:i',
            'timetables.*.closing_time' => 'nullable|date_format:H:i',
        ]);

        foreach ($data['timetables'] as $timetableData) {
            $timetable = Timetable::findOrFail($timetableData['id']);
            $timetable->update($timetableData);
        }

        return redirect()->route('timetables.index')->with('success', 'Timetables updated successfully.');
    }
}
