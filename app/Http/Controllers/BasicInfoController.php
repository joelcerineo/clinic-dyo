<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BasicInfo;

class BasicInfoController extends Controller
{
    public function index()
    {
        return view('basic_info'); // adjust view name if needed
    }

    public function store(Request $request)
    {
        // validate and store into $validated
        $validated = $request->validate([
            'last_name' => 'nullable|string|max:255',
            'first_name' => 'nullable|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'nickname' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'age' => 'nullable|string|max:10',
            'sex' => 'nullable|string|max:20',
            'civil_status' => 'nullable|string|max:50',
            'home_address' => 'nullable|string|max:255',
            'office_address' => 'nullable|string|max:255',
            'home_phone' => 'nullable|string|max:50',
            'office_phone' => 'nullable|string|max:50',
            'mobile_number' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'referred_by' => 'nullable|string|max:255',
            'emergency_name' => 'nullable|string|max:255',
            'emergency_contact' => 'nullable|string|max:50',
            'emergency_relationship' => 'nullable|string|max:50',
            'answered_by' => 'nullable|string|max:255',
            'relationship_to_patient' => 'nullable|string|max:255',
            'father_name' => 'nullable|string|max:255',
            'father_contact' => 'nullable|string|max:50',
            'mother_name' => 'nullable|string|max:255',
            'mother_contact' => 'nullable|string|max:50',
            'guardian_name' => 'nullable|string|max:255',
            'guardian_contact' => 'nullable|string|max:50',
        ]);

        BasicInfo::create($validated);

        return redirect()->back()->with('success', 'Patient basic info saved successfully!');
    }
}
