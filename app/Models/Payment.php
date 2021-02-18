<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
 
        'name',
        'email', 
        'phone',
        'reg_no',
        'department',
        'amount',
        'address',
        'application_status',
        'status',
        'transaction_id',
        'applicant_id',
        'currency',
        'language',
       
        
    ];

}
