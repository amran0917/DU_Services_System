<?php

namespace App\Http\Controllers\Frontend\language;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departments;

class ApplicantController extends Controller
{
    public function application()
    {
         $dept = Departments::all();
         return view('frontend.language.pages.registration',compact('dept'));
    }
}
