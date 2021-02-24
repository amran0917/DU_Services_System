<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\ApplicantInvite;
use Illuminate\Notifications\Notifiable;


class Applicant extends Model
{
    use HasFactory;
    //use Notifiable;
    // $applicant = Applicant::find(1);
    //

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
