@extends('frontend.layouts.master')
@section('content')

<div class="container " id="main-div">
    <div class="row">
     
       <b> Welcome to the Testimonial Management System </b> 
    </div>
    <br>
    <br>

    <div class="row">

        <div class="col-6 text-align-middle" >

            Testimonial management system is a such kind of system where student get testimonial easily.
            There are two types of users. 1.Student 2. Admin
            Students enter into the application  by giving his Personal details into the Application form. Students should give his Name,Father’s Name,Mother’s Name,University Registration Number, Date of Birth,Phone,Session,Current year for the application.After completing his details they transact the money with bKash.
            Admin  can see the details of applicant.Then he match between the server student’s data and applicant’s data.If any wrong he can edit the student’s form or inform the students. Otherwise he press ok button and download the testimonial copy. After director signature admin press success button and student can successful message for his application.

        </div>

        <div class="col-6">
           <b> <h1 style="font-famiy: sans-serif"> To get testimonial click here</h1>  </b>  <br>
             <!-- <a href="{{route('student.registration')}}" target="_blank" class="test"> GET Testomonial</a> -->

             <div class="button_cont" ><a class="example_b" href="{{route('student.registration')}}"  rel="nofollow noopener">Get Testimonial</a></div> 
             <br> <br>
       
             <b> <h1>To know Application status ? click here</h1>  </b>  <br>
             <div class="button_cont" ><a class="example_c" href="{{route('student.search_status')}}"  rel="nofollow noopener">Application status</a></div>


        </div>
   
    </div>
</div>
@endsection
