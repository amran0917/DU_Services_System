<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
 
        'name',
        'email', 
        'phone',
        'reg_no',
        'amount',
        'address',
        'application_status',
        'status',
        'transaction_id',
        'currency',
       
        
    ];

}
