<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Student;
use App\Models\AllStudent;
use App\Models\Departments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Session;

class StudentController extends Controller
{

    public function sessionData(Request $request)
    {

        $request->session()->get('applicant_id');
        // $email = $request->email;
        // $applicant_id = $request->applicant_id;

        // $data = Student::where('email',$email)->where('applicant_id',$applicant_id)->get(); 

        // if(count($data)>0){

        //     $request->session()->put('email',$data[0]->email);
        //     $request->session()->put('applicant_id',$data[0]->applicant_id);
        //     $request->session()->put('name',$data[0]->name);
        //     $request->session()->put('phone',$data[0]->phone);
        //     $request->session()->put('reg_no',$data[0]->registration_no);

        //     // return view('frontend.pages.searchInfo',compact('data'));

        // }

        // else{

        //     return redirect('student.registration')->with('msg','email and password not match');

        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validation= $request->validate([
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            // 'department' => 'required',
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
    // Log::info('essdd');

    if($exist>0){
        //  Log::info($exist);
        $applicant_id =rand(100000,999999);
        $response['applicant_id'] =$applicant_id;

        $student = new Student();

        $stdnt = Student::where('applicant_id',  $request->get('applicant_id'))->count();
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
        $student->status = 'pending';
        $student->notification_status = 0;
        $student->save();
        
               
        $sessionData = $request->session()->put('applicant_id',$applicant_id);
        $sessionData2= $request->session()->put('email',$request->email);
         $request->session()->put('name',$request->name);
         $request->session()->put('phone' ,$request->phone);
         $request->session()->put('reg_no',$request->registration_no);
         $request->session()->put('department',$request->dept);

        return response()->json($student);

    }

    else{
       
       return redirect()->back()->with(['msg', 'Your data didn"t matched .Please input correctly.']);

    }


      
        // return response($student);
 
    }



    public function registration()
    {
        $dept = Departments::all();
        return view('frontend.pages.registration',compact('dept'));
    }

    public function search_status()
    {
        return view('frontend.pages.search_status');
    }
}
