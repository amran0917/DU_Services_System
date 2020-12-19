<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_no',
        'name',
        'father_name',
        'mother_name',
        'session',
        'running_year',
        'roll_no',
        'birth_date',
        'email',
        'phone',
    ];

}
