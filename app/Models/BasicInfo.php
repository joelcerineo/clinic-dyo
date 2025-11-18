<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'nickname',
        'occupation',
        'birth_date',
        'age',
        'sex',
        'civil_status',
        'home_address',
        'office_address',
        'home_phone',
        'office_phone',
        'mobile_number',
        'email',
        'referred_by',
        'emergency_name',
        'emergency_contact',
        'emergency_relationship',
        'answered_by',
        'relationship_to_patient',
        'father_name',
        'father_contact',
        'mother_name',
        'mother_contact',
        'guardian_name',
        'guardian_contact',
    ];
}
