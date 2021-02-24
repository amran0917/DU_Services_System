<?php

namespace App\Http\Controllers\Backend\language;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\AllStudent;
use App\Models\Director;
use App\Models\Admin;
use App\Models\Testimonial;
use App\Models\Applicant;
use App\Models\Departments;
use App\Models\Language;

use Redirect;
use Illuminate\Support\Facades\Input;
use PDF;
use Auth,Storage;
use DB,Hash,Session;

class ApplicationController extends Controller
{
    public function getApplicant(){


        $student = Applicant::paginate(4);
       return view('admin.pages.languages.applicant.list',compact('student'));
        
        // if(Session::get('type')=='admin')
        // { 
        //     $type = Session::get('type'); 
        //     $admin = Admin::where('type',$type)->get();
        //     // Log::info($admin[1]->department);
        //     //  Log::info(Session::get('department'));
        //     $cnt = count($admin);
        //     if($cnt>0){
               
        //             $student = Student::where('department',Session::get('department'))->paginate(4);

        //     }
        //     return view('admin.pages.applicant.studentlist',compact('student'));
        // }

        // else{
        //     $student = Applicant::paginate(4);
        //     return view('admin.pages.applicant.studentlist',compact('student'));
        // }
        
    }

    public function edit(Request $request){
        $stdnt = Applicant::where('applicant_id', $request->applicant_id)->first();
        $dept= Departments::all();
        $lang = Language::all();
        return view('admin.pages.languages.applicant.edit',compact('stdnt','dept','lang'));
    }



    public function update(Request $request, $id){

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

    
               
         $student = Applicant::where('applicant_id',$request->applicant_id)->first();

         
         $student->applicant_id =  $request->applicant_id; 

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
        // $student->status = 'pending';
        
        $student->save();

        if($student){
            return Redirect()->route('applicant.list')->with('message', 'Successfully updated!');;

        }
        
            

    }

    public function changestatus (Request $request){
        $applicant = Applicant::where('applicant_id', $request->applicant_id)->first(); 
        $input = $request->all();  
        $applicant->status = $request->status;
        $applicant->save();
        $applicant->notify(new ApplicantInvite);


        if($applicant->status=='success'){ 

            return response()->json(['success'=>'Status changed successfully.']);
        }
    }
}
