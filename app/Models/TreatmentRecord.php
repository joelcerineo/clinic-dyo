<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreatmentRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'dmd',
        'treatment_procedure',
        'treatment',
        'amount_charged',
        'remarks',
        'file_path',
    ];
}
