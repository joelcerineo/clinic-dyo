<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_dental_visit',
        'last_dental_done',
        'reason_today',
        'experienced_clicking',
        'experienced_pain',
        'experienced_difficulty',
        'experienced_locking',
        'grind',
        'badexp',
        'nervous',
        'concern',
        'current_medical_treatment',
        'ever_hospitalized',
        'serious_illness_operation',
        'current_medications',
    ];
}
