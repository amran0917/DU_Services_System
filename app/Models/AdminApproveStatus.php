<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminApproveStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'applicant_id',
        'status',
    ];

    public function student()
    {
        return $this->hasOne(Student::class,'applicant_id','applicant_id');   // first reg foreign key / nijer tables pKey
    }
}
