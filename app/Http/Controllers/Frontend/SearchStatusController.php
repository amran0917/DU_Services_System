<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class SearchStatusController extends Controller
{
    function index(Request $request){

            $email = $request->email;
            $applicant_id = $request->applicant_id;

            $data = Student::where('email',$email)->where('applicant_id',$applicant_id)->get(); 

            if(count($data)>0){

                $request->session()->put('email',$data[0]->email);
                $request->session()->put('applicant_id',$data[0]->applicant_id);
                $request->session()->put('name',$data[0]->name);
                $request->session()->put('phone',$data[0]->phone);
                $request->session()->put('reg_no',$data[0]->registration_no);
                return view('frontend.pages.searchInfo',compact('data'));

            }

            else{

                return redirect('student.searchinfo')->with('msg','email and password not match');

            }
    }
}
