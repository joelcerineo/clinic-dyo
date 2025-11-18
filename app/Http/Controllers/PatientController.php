<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    // Show the health history form
    public function create()
    {
        return view('health_history');
    }

    // Store form data
    public function store(Request $request)
    {
        // Validation rules
        $validated = $request->validate([
            'last_dental_visit'       => 'required|date',
            'last_dental_done'        => 'required|string|max:255',
            'reason_today'            => 'required|string|max:255',
            'grind'                   => 'required|in:yes,no',
            'badexp'                  => 'required|in:yes,no',
            'nervous'                 => 'required|in:yes,no',
            'concern'                 => 'nullable|string|max:255',
            'current_medical_treatment' => 'required|string|max:255',
            'ever_hospitalized'       => 'required|string|max:255',
            'serious_illness_operation' => 'required|string|max:255',
            'current_medications'     => 'required|string|max:255',
        ]);

        // Convert checkboxes to boolean
        $validated['experienced_clicking']   = $request->has('experienced_clicking');
        $validated['experienced_pain']       = $request->has('experienced_pain');
        $validated['experienced_difficulty'] = $request->has('experienced_difficulty');
        $validated['experienced_locking']    = $request->has('experienced_locking');

        // Save to database
        Patient::create($validated);

        return redirect()->route('health')->with('success', 'Patient data saved successfully!');
    }
}
