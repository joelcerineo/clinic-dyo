<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DentalChartController extends Controller
{
    /**
     * Display the interactive dental chart.
     */
    public function index()
    {
        // Pass initial data for Blade/JS if needed
        return view('dental-chart', [
            'patientType' => 'Adult', // Default patient type
            'toothStatuses' => [],    // Will store tooth status if loading saved data
            'toothNotes' => [],       // Will store notes if loading saved data
            'oralExamData' => [
                'oralHygiene' => '',
                'calculus' => '',
                'gingiva' => '',
                'stains' => '',
                'completeDenture' => '',
                'partialDenture' => '',
            ],
            'notesData' => [
                'comments' => '',
                'treatmentPlan' => '',
            ],
        ]);
    }

    /**
     * Save the dental chart submission.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_type' => 'required|string|in:Adult,Toddler',
            'tooth_statuses' => 'nullable|array',
            'tooth_statuses.*' => 'nullable|array',
            'tooth_notes' => 'nullable|array',
            'oral_exam' => 'nullable|array',
            'oral_exam.oralHygiene' => 'nullable|string|max:255',
            'oral_exam.calculus' => 'nullable|string|max:255',
            'oral_exam.gingiva' => 'nullable|string|max:255',
            'oral_exam.stains' => 'nullable|string|max:255',
            'oral_exam.completeDenture' => 'nullable|string|max:255',
            'oral_exam.partialDenture' => 'nullable|string|max:255',
            'notes.comments' => 'nullable|string',
            'notes.treatmentPlan' => 'nullable|string',
        ]);

        // TODO: Save to database
        // Example:
        // DentalChart::create([
        //     'patient_id' => $request->user()->id,
        //     'patient_type' => $validated['patient_type'],
        //     'tooth_statuses' => json_encode($validated['tooth_statuses'] ?? []),
        //     'tooth_notes' => json_encode($validated['tooth_notes'] ?? []),
        //     'oral_exam' => json_encode($validated['oral_exam'] ?? []),
        //     'notes' => json_encode($validated['notes'] ?? []),
        // ]);

        return redirect()->back()->with('success', 'Dental chart saved successfully!');
    }
}
