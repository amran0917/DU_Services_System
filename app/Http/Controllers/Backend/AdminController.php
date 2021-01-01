<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Admin;
use App\Models\AdminApproveStatus;   
use PDF;
use Session;
use Auth;
use DB;
class AdminController extends Controller
{
    function index(){
        return view('admin.pages.index');
    }
    
    function admin(){
        return view('admin.pages.login');
    }

    public function logInData(Request $request){
        $email = $request->email;
        $password = $request->password;
        
        // var_dump($email);
        // var_dump($password);

        $data = Admin::where('email',$email)->where('password',$password)->get(); 
        // var_dump($data);

        if(count($data)>0){

            $request->session()->put('email',$data[0]->email);
            $request->session()->put('password',$data[0]->password);
            $request->session()->put('type',$data[0]->type);

            return view('admin.pages.index');
        }

        else{
            $notification = array(
                'message' =>'Password or Email not matched',
                'alert-type' => 'danger'
            );
        

            return Redirect()->route('admin.logIn') ->with($notification);
        }

    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect()->route('admin.logIn');    
    }

    public function getStudent(){

        $student = Student::all();
        return view('admin.pages.studentlist',compact('student'));
    }



    public function showDetails($applicant_id) {
        $stdnt = Student::find($applicant_id);
        // Log::info($stdnt);
        return view('admin.pages.studentView',compact('stdnt'));
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

        $pdf = PDF::loadView('admin.pages.testmonial', compact('stdnt'));
        return $pdf->stream('Testimonial.pdf');
        // return $pdf->stream();
        // return view('admin.pages.testmonial',compact('stdnt'));
    }

    public function approve($applicant_id){

        
        $stdnt = Student::find($applicant_id);

        // $stdnt = DB:: table('students')
        //             ->join('all_students','students.registration_no','all_students.registration_no')
        //             ->select('students.*','all_students.address','all_students.cgpa')
        //             ->where('students.applicant_id',$applicant_id)
        //             ->first();
        

        $pdf = PDF::loadView('admin.pages.testmonial', compact('stdnt'));
        return $pdf->stream('Testimonial.pdf');
        
        // return $pdf->setPaper('a4')->stream();
    }
    
    public function getAdmin(){

        $admin = Admin::all();
        return view('admin.pages.admin.adminList',compact('admin'));
    }

    function createAdmin(){

        return view('admin.pages.admin.create'); 
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
        $admin->type = $request->adminType;

        $admin->save();

        if($admin){
            $notification = array(
                'message' =>'Successfully added admin',
                'alert-type' => 'success'
            );
            return Redirect()->route('admin.list') ->with($notification);

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
            $notification = array(
                'message' =>'Successfully admin Deleted',
                'alert-type' => 'success'
            );
        }

    //   session()->flash('success','Successfully deleted');
      return Redirect()->route('admin.list') ->with($notification);

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
        $admin->password = $request->pasword; //bcrypt
        $admin->type = $request->adminType;

        $admin->save();

   
        if($admin){
            $notification = array(
                'message' =>'Successfully UPDated admin',
                'alert-type' => 'success'
            );
            return Redirect()->route('admin.list') ->with($notification);

        }
       
    }
}
