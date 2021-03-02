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
        include(app_path() . '\Http\Controllers\Backend\PHPMailSender\mailsender.php');

        $applicant = Applicant::where('applicant_id', $request->applicant_id)->first(); 
        $input = $request->all();  
        $applicant->status = $request->status;
        $applicant->save();
        $title =  'Application status';
        $body = 'Your application is ready.';
        sendMail($applicant->email, $title,$body);
    }

    public function sendNotfication(){
        $token = "edL4ukAZ4vY:APA91bFgz4DFVeP29MqVayuEUvs-7Qix8buB1vI10mthr2sBahe8t7tFxfJ5ogA6FgNw3Wfyo_HyORDzlpKURPpc4m942LdscyOWloX_2Kn2CR1nwEpMxPLI5kViRIT16t_K1sbPbdZQ";  
        $from = "AAAAJQfpSc4:APA91bH6fWzO0F-P1GpQWnsBHde1jDKsSvpi_M1Si1ZN439CtkaxqwUhgkVkKD8BCe6cIAQvezfydhXM81WAndf6TGluhM4JSkZVA6mxrSa6PskcyW6w2nfbaxyoKZXj9a4-QPTHruIR";
        $msg = array
              (
                'body'  => "Testing Testing",
                'title' => "Hi, From Raj",
                'receiver' => 'erw',
                'icon'  => "https://image.flaticon.com/icons/png/512/270/270014.png",/*Default Icon*/
                'sound' => 'mySound'/*Default sound*/
              );

        $fields = array
                (
                    'to'        => $token,
                    'notification'  => $msg
                );

        $headers = array
                (
                    'Authorization: key=' . $from,
                    'Content-Type: application/json'
                );
        //#Send Reponse To FireBase Server 
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        dd($result);
        curl_close( $ch );
    }
        

    public function notification(){
        return view ('admin.partials.notification');

    }

    public function download(Request $request, $applicant_id){
        $stdnt = Applicant::where('applicant_id', $request->applicant_id)->first();
        $allstdnt = AllStudent::where('registration_no',$stdnt->registration_no)->first();
        $lang = Language::where('language_name',$stdnt->language)->first();
         $dir = Director::where('fac_name',$lang->fac_name)->first();
        //  Log::info($dir);
         $certificate_id =rand(10000,99999);
         $response['certificate_id'] =$certificate_id;
         $certificate = new Certificate();
         $certificate->certificate_id = $certificate_id; 
         $certificate->applicant_id=$applicant_id;
         $certificate->applicant_name=$stdnt->name;

         $path = public_path('file/certificate');
         $fileName = $certificate_id. '.' .$certificate->applicant_name.'.pdf' ;

        $pdf = PDF::loadView('admin.pages.partials.certificate', compact('stdnt','allstdnt', 'dir'));
        
        // $pdf->save($path . '/' . $fileName);
        $certificate->path = $path . '/' . $fileName;
        $certificate->save();
        // return $pdf->stream($fileName);



    }
}
