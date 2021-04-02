<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Student;
use App\Models\AllStudent;

use App\Models\Director;
use App\Models\Admin;
use App\Models\Testimonial;
use App\Models\AdminApproveStatus;   
use Redirect;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Input;
use PDF;
use Auth,Storage;
use DB,Hash,Session;
use App\Models\Departments;
class AdminController extends Controller
{
    function index(){
        return view('admin.pages.index');
    }
    
    function admin(){
        return view('admin.pages.partials.login');
    }

    public function logInData(Request $request){
        $email = $request->email;
        $password = $request->password;
        
        $data = Admin::where('email',$email)->where('password',$password)->get(); 
        // var_dump($data);

        if(count($data)>0){

            $request->session()->put('email',$data[0]->email);
            $request->session()->put('password',$data[0]->password);
            $request->session()->put('type',$data[0]->type);
            $request->session()->put('department',$data[0]->department);

            $student = Student::paginate(7);
            return view('admin.pages.applicant.studentlist',compact('student'));
        }

        else{
            // $notification = array(
            //     'message' =>'Password or Email not matched',
            //     'alert-type' => 'danger'
            // );
            $errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
            return Redirect::back()->withErrors($errors)->withInput($request->except('password'));
        

        }

    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect()->route('admin.logIn');    
    }

    public function getStudent(){

        if(Session::get('type')=='admin')
        { 
            $type = Session::get('type'); 
            $admin = Admin::where('type',$type)->get();
           
            $cnt = count($admin);
            if($cnt>0){
               
                    $student = Student::where('department',Session::get('department'))->paginate(4);

            }
            return view('admin.pages.applicant.studentlist',compact('student'));
        }

        else{
            $student = Student::paginate(7);
            return view('admin.pages.applicant.studentlist',compact('student'));
        }
        
    }

    public function changeActiveStatus(Request $request)
    {
        include(app_path() . '\Http\Controllers\Backend\PHPMailSender\mailsender.php');

        $applicant = Student::where('applicant_id', $request->applicant_id)->first(); 
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

        if($applicant->status=='success'){ 
            return response()->json(['success'=>'Status changed successfully.']);
        }
    }

    public function showDetails($applicant_id,Request $request) {

        $stdnt = Student::where('applicant_id', $request->applicant_id)->first();
        $stdnt->notification_status = 1;
        $stdnt->save();
        $dept= Departments::all();

        return view('admin.pages.applicant.studentView',compact('stdnt','dept'));
    }

   public function studentUpdate(Request $request, $id){
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


            
        $student = Student::where('applicant_id',$request->applicant_id)->first();

        
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
        $student->notification_status = 1;

    // $student->status = 'pending';
    
        $student->save();

        if($student){
            return Redirect()->route('student.list')->with('message', 'Successfully updated!');;

        }
    
        

    }
    public function approveTestimonial(Request $request,$applicant_id){
        $validation= $request->validate([
            'applicant_id' => 'required',
        ]);

        $adminApprove = new AdminApproveStatus();
        $adminApprove->applicant_id = $applicant_id;
        $adminApprove->status = true;
        $adminApprove->save();

        $stdnt = Student::find($applicant_id);

        $pdf = PDF::loadView('admin.pages.partials.testmonial', compact('stdnt'));
        return $pdf->stream('Testimonial.pdf');
        // return $pdf->stream();
        // return view('admin.pages.testmonial',compact('stdnt'));
    }

    public function download($applicant_id, Request $request){
        
        

        $stdnt = Student::where('applicant_id', $request->applicant_id)->first();
        $stdnt->notification_status = 1;
        $stdnt->save();

        $allstdnt = AllStudent::where('registration_no',$stdnt->registration_no)->first();
        $dir = Director::where('department',$stdnt->department)->first();

        $testimonial_id =rand(10000,99999);
        $count = Testimonial::where('testimonial_id',  $request->get('testimonial_id'))->count();
        while($count>0)
        {
            $testimonial_id =rand(10000,99999);
            $count = Testimonial::where('testimonial_id',  $request->get('testimonial_id'))->count();
        }
       
        $testimonial=Testimonial::where('applicant_id',  $applicant_id)->first();

      

        if($testimonial){

            $path =$testimonial->path;
            $headers = [
                'Content-Type' => 'application/pdf',
             ];
             $fileName =$testimonial->testimonial_id. '.' .$testimonial->applicant_name.'.pdf' ;
            return  response()->download( $path, $fileName , $headers);
          
        }
        else{
           
            $response['testimonial_id'] =$testimonial_id;
            $testmonial = new Testimonial();
            $testmonial->testimonial_id = $testimonial_id; 
            $testmonial->applicant_id=$applicant_id;
            $testmonial->applicant_name=$stdnt->name;
            $path = public_path('file/');
            $fileName = $testimonial_id. '.' .$testmonial->applicant_name.'.pdf' ;
            $pdf = PDF::loadView('admin.pages.partials.testimonial', compact('stdnt','allstdnt', 'dir'));
            $pdf->save($path . '/' . $fileName);
            $testmonial->path = $path . '/' . $fileName;
            $testmonial->save();
            return $pdf->stream($fileName);
        }
      
    }
    public function getAdmin(){

        $admin = Admin::all();
        return view('admin.pages.admin.adminList',compact('admin'));
    }

    function createAdmin(){
        $dept = Departments::all();
        return view('admin.pages.admin.create',compact('dept')); 
    }

    function storeAdmin(Request $request){
        $validation= $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' =>'required|min:5',
        ]);

        $admin = new Admin();
        $admin->name =  $request->name;
        $admin->email= $request->email;
        $admin->password = $request->password;
        $admin->department = $request->dept;
        $admin->type = $request->adminType;
        
        $admin->save();
         // Hash::make
        if($admin){
           
            return Redirect()->route('admin.list')->with('success', 'Successfully saved!');;

        }

    }

    public function viewAdmin($id){
        $admin = Admin::find($id);
        return view('admin.pages.admin.view',compact('admin'));
    }
    public function deleteAdmin($id){
        $admin = Admin::findorfail($id);

        if(!is_null($admin)){
            $admin->delete();
            return Redirect()->route('admin.list')->with('delete', 'Successfully deleted!');;


        }

    }

    public function editAdmin($id)
    {
        $admin = Admin::find($id);
        return view('admin.pages.admin.edit',compact('admin'));
    }

    public  function updateAdmin(Request $request,$id)
    {
       
        $validation= $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' =>'required|min:5',
        ]);

        $admin = Admin::find($id);
        
        $admin->name =  $request->name;
        $admin->email= $request->email;
        $admin->password = $request->password;
        $admin->department = $request->dept;
        $admin->type = $request->adminType;
        $admin->save();

   
        if($admin){
          
            return Redirect()->route('admin.list')->with('message', 'Successfully updated!');;


        }
       
    }


    /*
            Departments work
    */
    function createDepartment(){

        return view('admin.pages.departments.create'); 
    }
    
    
    function storeDepartment(Request $request){
        $validation= $request->validate([
            'dept_name' => 'required',
            
        ]);

        $dept = new Departments();
        $dept->department_name =  $request->dept_name;
        $dept->fac_name =  $request->fac_name;
        
        $dept->save();
 
            if($dept){
                return Redirect()->route('dept.list')->with('success', 'Successfully saved!');;
    
            }


    }

    function getDept(){
        
        $dept = Departments::paginate(7);
        return view('admin.pages.departments.index',compact('dept'));
    }

    function editDept($id){
        $dept = Departments::find($id);
        return view('admin.pages.departments.edit',compact('dept'));
    }

    public  function updateDept(Request $request,$id)
    {
        $validation= $request->validate([
            'dept_name' => 'required',
        ]);

        $dept = Departments::find($request->id);
        $dept->department_name = $request->dept_name;
        $dept->fac_name =  $request->fac_name;
        $dept->save();

       
        if($dept){
            return Redirect()->route('dept.list')->with('message', 'Successfully updated!');;

        }
        
       
    }

    public function deleteDept($id)
    {
        $dept = Departments::findorfail($id);

        if(!is_null($dept)){
            $dept->delete();
            
        }
        return Redirect()->route('dept.list')->with('delete', 'Successfully deleted!');;

    }

    public function viewDept($id){
        $dept = Departments::find($id);
        return view('admin.pages.departments.view',compact('dept'));
    }

    public function cancel(Request $request){
        
        $applicant = Student::where('applicant_id', $request->applicant_id)->first(); 
        $applicant->status = $request->status;
        $applicant->notification->status =1;
        $applicant->save();
    }

}

