<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BasicInfo;
use App\Models\Patient;
use App\Models\TreatmentRecord;
use Illuminate\Support\Facades\Storage;

class PatientMultiFormController extends Controller
{
    // Step 1: Basic Info form
    public function basicForm() {
        return view('basic_info');
    }

    public function saveBasicInfo(Request $request) {
        $validated = $request->validate([
            'last_name'=>'nullable|string|max:255',
            'first_name'=>'nullable|string|max:255',
            'middle_name'=>'nullable|string|max:255',
            'nickname'=>'nullable|string|max:255',
            'occupation'=>'nullable|string|max:255',
            'birth_date'=>'nullable|date',
            'age'=>'nullable|string|max:10',
            'sex'=>'nullable|string|max:20',
            'civil_status'=>'nullable|string|max:50',
            'home_address'=>'nullable|string|max:255',
            'office_address'=>'nullable|string|max:255',
            'home_phone'=>'nullable|string|max:50',
            'office_phone'=>'nullable|string|max:50',
            'mobile_number'=>'nullable|string|max:50',
            'email'=>'nullable|email|max:255',
            'referred_by'=>'nullable|string|max:255',
            'emergency_name'=>'nullable|string|max:255',
            'emergency_contact'=>'nullable|string|max:50',
            'emergency_relationship'=>'nullable|string|max:50',
            'answered_by'=>'nullable|string|max:255',
            'relationship_to_patient'=>'nullable|string|max:255',
            'father_name'=>'nullable|string|max:255',
            'father_contact'=>'nullable|string|max:50',
            'mother_name'=>'nullable|string|max:255',
            'mother_contact'=>'nullable|string|max:50',
            'guardian_name'=>'nullable|string|max:255',
            'guardian_contact'=>'nullable|string|max:50',
        ]);

        session(['basic_info' => $validated]);

        return redirect()->route('health');
    }

    // Step 2: Health History form
    public function healthForm() {
        return view('health_history');
    }

    public function saveHealth(Request $request) {
        $validated = $request->validate([
            'last_dental_visit'=>'required|date',
            'last_dental_done'=>'required|string|max:255',
            'reason_today'=>'required|string|max:255',
            'grind'=>'required|in:yes,no',
            'badexp'=>'required|in:yes,no',
            'nervous'=>'required|in:yes,no',
            'concern'=>'nullable|string|max:255',
            'current_medical_treatment'=>'required|string|max:255',
            'ever_hospitalized'=>'required|string|max:255',
            'serious_illness_operation'=>'required|string|max:255',
            'current_medications'=>'required|string|max:255',
        ]);

        // Checkboxes
        $validated['experienced_clicking'] = $request->has('experienced_clicking');
        $validated['experienced_pain'] = $request->has('experienced_pain');
        $validated['experienced_difficulty'] = $request->has('experienced_difficulty');
        $validated['experienced_locking'] = $request->has('experienced_locking');

        session(['health' => $validated]);

        return redirect()->route('treatment');
    }

    // Step 3: Treatment Record form
    public function treatmentForm() {
        return view('treatment');
    }

    // FIX: method name must match route
    public function saveAll(Request $request) {
        $validated = $request->validate([
            'dmd'=>'required|string|max:255',
            'treatment_procedure'=>'required|string|max:255',
            'treatment'=>'required|string|max:255',
            'amount_charged'=>'required|numeric',
            'remarks'=>'nullable|string',
            'file_path'=>'nullable|file|mimes:jpg,jpeg,png,pdf',
        ]);

        // Handle file
        if ($request->hasFile('file_path')) {
            $path = $request->file('file_path')->store('treatment_files', 'public');
            $validated['file_path'] = $path;
        }

        // Save all data
        $basic = BasicInfo::create(session('basic_info'));
        $health = Patient::create(session('health') + ['basic_info_id'=>$basic->id]);
        $treatment = TreatmentRecord::create($validated + ['patient_id'=>$health->id]);

        // Clear session
        session()->forget(['basic_info','health']);

        return redirect()->route('basic')->with('success','Patient data saved successfully!');
    }
}
