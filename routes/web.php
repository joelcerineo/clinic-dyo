<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\BasicInfoController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\TreatmentRecordController;
use App\Http\Controllers\DentalChartController;
use App\Http\Controllers\PatientMultiFormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Redirect root to basic info
Route::get('/', function () {
    return redirect()->route('basic');
});

// Appointment route
Route::get('appointment', function () {
    return view('appointment');
});

// Login route
Route::get('login', [Login::class, 'index'])->name('login');

// Basic Info routes
Route::get('/basic_info', [BasicInfoController::class, 'index'])->name('basic');
Route::post('/basic_info', [BasicInfoController::class, 'store'])->name('basic.store');

// Patient multi-step form routes
Route::prefix('patient')->group(function () {

    // Health History
    Route::get('/health', [PatientController::class, 'create'])->name('health');
    Route::post('/health', [PatientController::class, 'store'])->name('health.store');

    // Dental Chart
    Route::get('/dental-chart', [DentalChartController::class, 'index'])->name('dental-chart');
    Route::post('/dental-chart', [DentalChartController::class, 'store'])->name('dental-chart.store');

    // Treatment Record
    Route::get('/treatment', [TreatmentRecordController::class, 'create'])->name('treatment');
    Route::post('/treatment', [TreatmentRecordController::class, 'store'])->name('treatment.store');
});

// Multi-step form POST routes for storing all data in session + final submit
Route::post('/basic/save', [PatientMultiFormController::class, 'saveBasicInfo'])->name('basic.save');
Route::post('/health/save', [PatientMultiFormController::class, 'saveHealth'])->name('health.save');
Route::post('/dental/save', [PatientMultiFormController::class, 'saveDental'])->name('dental.save');
Route::post('/treatment/submit', [PatientMultiFormController::class, 'saveAll'])->name('treatment.submit');
