<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departments;
use App\Models\Student;


class SearchController extends Controller
{
    public function search(Request $request){

        $search = $request->search;
            $dept = Departments::orWhere('department_name','like','%'.$search.'%')
                                ->orWhere('fac_name','like','%'.$search.'%')
                                ->orderBy('id','desc')
                                ->paginate(10);
            Log::info($dept[0]->department_name);
        
            $student = Student::orWhere('name','like','%'. $search.'%')
                            ->orWhere('department','like','%'. $search.'%')
                            ->orWhere('registration_no','like','%'. $search.'%')
                            ->orderBy('id','desc')
                            ->paginate(4);
            if($search==$dept[0]->department_name || $search==$dept[0]->fac_name){
                return view('admin.pages.departments.index',compact('dept'));

            }
        //    else if( $std_search==$student[0]->name)
        //    {
        //     return view('admin.pages.studentlist',compact('student'));
        //    } 
   

    }
}
