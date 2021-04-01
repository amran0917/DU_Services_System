<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departments;
use App\Models\Student;
use App\Models\Applicant;
use App\Models\Language;



class SearchController extends Controller
{
    public function search(Request $request){

        $search = $request->search;
            $dept = Departments::orWhere('department_name','like','%'.$search.'%')
                                ->orWhere('fac_name','like','%'.$search.'%')
                                ->orderBy('id','desc')
                                ->paginate(10);
           // Log::info($dept[0]->department_name.','.$search);
        
           
             return view('admin.pages.departments.index',compact('dept'));
             
   

    }


   public function searchapplicant(Request $request){
    $search = $request->searchapplicant;

    $student = Applicant::orWhere('name','like','%'. $search.'%')
                            ->orWhere('department','like','%'. $search.'%')
                            ->orWhere('registration_no','like','%'. $search.'%')
                            ->orderBy('id','desc')
                            ->paginate(4);
    
     return view('admin.pages.languages.applicant.list',compact('student'));

   }

   public function searchStudent(Request $request){
    $search = $request->searchapplicant;
    $student = Student::orWhere('name','like','%'. $search.'%')
                        ->orWhere('department','like','%'. $search.'%')
                        ->orWhere('registration_no','like','%'. $search.'%')
                        ->orderBy('id','desc')
                        ->paginate(4);
     return view('admin.pages.applicant.studentList',compact('student'));

   }

   public function searchCourse(Request $request){
    $search = $request->searchCourse;
    $lang = Language::orWhere('language_name','like','%'. $search.'%')
                        ->orWhere('department','like','%'. $search.'%')
                        
                        ->orderBy('id','desc')
                        ->paginate(8);
     return view('admin.pages.languages.index',compact('lang'));

   }
}
