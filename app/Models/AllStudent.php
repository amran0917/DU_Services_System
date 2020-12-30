<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
class AllStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_no',
        'name',
        'father_name',
        'mother_name',
        'address',
        'session',
        'running_year',
        'roll_no',
        'birth_date',
        'email',
        'phone',
        'cgpa',
    ];

    public function student()
    {
        return $this->hasOne(Student::class,'registration_no','registration_no');   // first reg foreign key / nijer tables pKey
    }

}
