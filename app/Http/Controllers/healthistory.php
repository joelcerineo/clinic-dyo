<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasicInfoController extends Controller
{
    /**
     * Show the Basic Information form.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        // Display the Basic Information form view
        return view('health_history'); // must match resources/views/health_history.blade.php
    }
}
