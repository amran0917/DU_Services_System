<?php

namespace App\Http\Controllers\Frontend\language;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departments;
use App\Models\Language;
use App\Models\Applicant;
use App\Models\AllStudent;
use Illuminate\Support\Facades\Log;


class ApplicantController extends Controller
{
    public function application()
    {
         $dept = Departments::all();
         $lang = Language::all();
         return view('frontend.language.pages.registration',compact('dept', 'lang'));
    }


    public function store(Request $request)
    {
        $validation= $request->validate([
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'registration_no' => 'required',
            'session' => 'required',
            'running_year' => 'required',
            'roll_no' => 'required',
            'birth_date' => 'required',
            'email' => 'required',
            'phone' => 'required',

        ]);

       // dd($request->all());

        $exist = AllStudent::where('registration_no',$request->registration_no)
                        ->where('department',$request->dept)
                        ->count();

        if($exist>0){
            //  Log::info($exist);
            $applicant_id =rand(100000,999999);
            $response['applicant_id'] =$applicant_id;

            $student = new Applicant();

            $stdnt = Applicant::where('applicant_id',  $request->get('applicant_id'))->count();
            if($stdnt>0){
                echo 'There is duplicate id';
                }
            else{ 

                $student->applicant_id = $applicant_id; 

            }
            $student->name = $request->name; 
            $student->father_name = $request->father_name; 
            $student->mother_name = $request->mother_name; 
            $student->department= $request->dept;
            $student->registration_no = $request->registration_no; 
            $student->session = $request->session; 
            $student->running_year = $request->running_year; 
            $student->roll_no = $request->roll_no;
            $student->birth_date = $request->birth_date;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->language = $request->lang;
            $student->status = 'pending';
            $student->notification_status = 0;

            $student->save();
            
                
            $sessionData = $request->session()->put('applicant_id',$applicant_id);
            $sessionData2= $request->session()->put('email',$request->email);
            $request->session()->put('name',$request->name);
            $request->session()->put('phone' ,$request->phone);
            $request->session()->put('reg_no',$request->registration_no);
            $request->session()->put('department',$request->dept);
            $request->session()->put('language',$request->lang);

            return response()->json($student);

        }

        else{
        
            return Redirect()->route('student.application')->with('message', 'Your data didn"t matched .Please input correctly.');

        }
    
    }

    public function status_search()
    {
        return view('frontend.language.pages.search_status');
    }
}
