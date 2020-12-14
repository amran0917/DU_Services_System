<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Student;
use Illuminate\Http\Request;
use Session;

class StudentController extends Controller
{
    /**
     *  Str::random(6)
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            'registration_no' => 'required',
            'session' => 'required',
            'running_year' => 'required',
            'roll_no' => 'required',
            'birth_date' => 'required',
            'email' => 'required',
            'phone' => 'required',

        ]);

        $applicant_id =rand(100000,999999);
        $response['applicant_id'] =$applicant_id;

        $student = new Student();
        $stdnt = Student::where('applicant_id',  $request->get('applicant_id'))->count();
        if($stdnt>0){ echo 'There is duplicate id';}
        else{ 

            $student->applicant_id = $applicant_id; 

        }
        $student->name = $request->name; 
        $student->father_name = $request->father_name; 
        $student->mother_name = $request->mother_name; 
        $student->registration_no = $request->registration_no; 
        $student->session = $request->session; 
        $student->running_year = $request->running_year; 
        $student->roll_no = $request->roll_no;
        $student->birth_date = $request->birth_date;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();
        
        
        // return redirect()->back();
        // return response($student);

        $sessionData = $request->session()->put('applicant_id',$applicant_id);
        $sessionData2= $request->session()->put('email',$request->email);
         $request->session()->put('name',$request->name);
         $request->session()->put('phone' ,$request->phone);
         $request->session()->put('reg_no',$request->registration_no);
        //  $request->reflash();

        return response()->json(['success'=>'Got Simple Ajax Request.']);
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }



    public function registration()
    {

        return view('frontend.pages.registration');
    }

    public function search_status()
    {
        return view('frontend.pages.search_status');
    }
}
