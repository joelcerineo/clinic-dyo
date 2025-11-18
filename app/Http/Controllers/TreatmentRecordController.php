<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TreatmentRecord;
use Illuminate\Support\Facades\Storage;

class TreatmentRecordController extends Controller
{
    // Show the form
    public function create()
    {
        return view('treatmentrecord'); // Blade form for treatment record
    }

    // Store the treatment record
    public function store(Request $request)
    {
        $validated = $request->validate([
            'dmd'                 => 'required|string|max:255',
            'treatment_procedure' => 'required|string|max:255',
            'treatment'           => 'required|string|max:255',
            'amount_charged'      => 'required|numeric',
            'remarks'             => 'nullable|string',
            'file'                => 'nullable|file|mimes:pdf,jpg,jpeg,png',
        ]);

        // Handle file upload
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('treatment_files', 'public');
            $validated['file_path'] = $path;
        }

        TreatmentRecord::create($validated);

        return redirect()->back()->with('success', 'Treatment record saved successfully!');
    }
}
