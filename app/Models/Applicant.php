<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $fillable = [
        'applicant_id',
        'name',
        'father_name',
        'mother_name',
        'department',
        'registration_no',
        'session',
        'running_year',
        'roll_no',
        'birth_date',
        'email',
        'phone',
        'status',
        'language',
    ];
}
