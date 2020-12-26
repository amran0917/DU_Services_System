<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\AdminApproveStatus;   
use PDF;
class AdminController extends Controller
{
    function index(){
        return view('admin.pages.index');
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
         return $pdf->download('invoice.pdf');
        return $pdf->stream();
        // return view('admin.pages.testmonial',compact('stdnt'));
    }
}
