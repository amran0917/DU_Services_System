<?php

namespace App\Http\Controllers\Backend\language;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\AllStudent;
use App\Models\Director;
use App\Models\Admin;
use App\Models\Certificate;
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


        $student = Applicant::paginate(6);
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
        $stdnt->notification_status = 1;
        $stdnt->save();
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
         $student->notification_status = 1;
        
        $student->save();

        if($student){
            return Redirect()->route('applicant.list')->with('message', 'Successfully updated!');;

        }
        
            

    }

    public function changestatus (Request $request){
        include(app_path() . '\Http\Controllers\Backend\PHPMailSender\mailsender.php');

        $applicant = Applicant::where('applicant_id', $request->applicant_id)->first(); 
        $input = $request->all();  
        $applicant->status = $request->status;
        $applicant->notification_status = 1;
        $applicant->save();
        $title =  'Application status';
        $body = '<h1 align=center> Congratulations!!!</h1> <br>
        <h4 align=center> Your Applicantion is successfull. </h4> <br>
         <h5 align=left> Regards</h5>
         <h6 align=left> DU Services Team.</h6>
         ';
        sendMail($applicant->email, $title,$body);
    }

    

    // public function download(Request $request, $applicant_id){
       

    //     $stdnt = Applicant::where('applicant_id', $request->applicant_id)->first();
    //     $stdnt->notification_status = 1;
    //     $stdnt->save();

    //     $allstdnt = AllStudent::where('registration_no',$stdnt->registration_no)->first();
    //     $lang = Language::where('language_name',$stdnt->language)->first();
    //     $dir = Director::where('fac_name',$lang->fac_name)->first();
    //     //  Log::info($dir);
    //     $certificate_id =rand(10000,99999);
    //     $count = Certificate::where('certificate_id',  $request->get('certificate_id'))->count();

    //     while($count>0)
    //     {
    //         $certificate_id =rand(10000,99999);
    //         $count = Certificate::where('certificate_id',  $request->get('certificate_id'))->count();
    //     }

        
    //     $certificate=Certificate::where('applicant_id',  $applicant_id)->first();
    //     if($certificate){
           
    //         $path =$certificate->path;
           
    //         $headers = [
    //             'Content-Type' => 'application/pdf',
    //          ];
    //          $fileName =$certificate->certificate_id. '.' .$certificate->applicant_name.'.pdf' ;
    //         return  response()->download( $path, $fileName , $headers);
            
    //     }

    //     else{ 

    //         $response['certificate_id'] =$certificate_id;
    //         $certificate = new Certificate();
    //         $certificate->certificate_id = $certificate_id; 
    //         $certificate->applicant_id=$applicant_id;
    //         $certificate->applicant_name=$stdnt->name; 
    //         $path = public_path('file/');
    //         $fileName = $certificate_id. '.' .$certificate->applicant_name.'.pdf' ;

    //        $pdf = PDF::loadView('admin.pages.partials.certificate', compact('stdnt','allstdnt', 'dir'));  
            
    //        $pdf->save($path . '/' . $fileName);
    //        $certificate->path = $path . '/' . $fileName;
    //        $certificate->save();
    //        return $pdf->stream($fileName);
    //     }
       


    // }

    public function download(Request $request, $applicant_id){
       
        $count_time = 1;
        $stdnt = Applicant::where('applicant_id', $request->applicant_id)->first();
        $stdnt->notification_status = 1;
        $stdnt->save();

        $allstdnt = AllStudent::where('registration_no',$stdnt->registration_no)->first();
        $lang = Language::where('language_name',$stdnt->language)->first();
        $dir = Director::where('fac_name',$lang->fac_name)->first();
        
        $certificate_id =rand(10000,99999);

        $certificate=Certificate::where('applicant_id',  $applicant_id)->first();
        $pdf = PDF::loadView('admin.pages.partials.certificate', compact('stdnt','allstdnt', 'dir'));  
        $fileName = $certificate_id. '.' .$stdnt->name.'-'.date('d-m-Y_h-i-s').'.pdf' ;

        if($certificate){
            $pdf->save(public_path('file/') . '/' . $fileName);
            $certificate->path = '/file/' . $fileName;
            $certificate->save();
        } else{ 
            $response['certificate_id'] =$certificate_id;
            $certificate = new Certificate();
            $certificate->certificate_id = $certificate_id; 
            $certificate->applicant_id=$applicant_id;
            $certificate->applicant_name=$stdnt->name; 
            $pdf->save(public_path('file/') . '/' . $fileName);
            $certificate->path = '/file/' . $fileName;
            $certificate->save();
        }
        return $pdf->stream($fileName);
    }

   public function cancelapplication(Request $request) {
    include(app_path() . '\Http\Controllers\Backend\PHPMailSender\mailsender.php');

    $applicant = Applicant::where('applicant_id', $request->applicant_id)->first(); 
    $applicant->status = $request->status;
    $applicant->notification_status=1;
    $applicant->save();

    $title =  'Application status';
    $body = '<h1 align=center> Congratulations!!!</h1> <br>
    <h4 align=center> Your Application is canceled. </h4> <br>
     <h5 align=left> Regards</h5>
     <h6 align=left> DU Services Team.</h6>
     ';
    sendMail($applicant->email, $title,$body);

   }
}
