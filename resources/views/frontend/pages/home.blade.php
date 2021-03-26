@extends('frontend.layouts.master')
@section('title', 'HomePage')

@section('content')

<div class="home_img" style="height:80vh">
    <img width="100%" height="80%" style="position:fixed;z-index:-1" src="../images/bus.jpg">
    <div style="opacity:0.5;background:rgb(0, 0, 0);height:100%;width:100%;position:fixed;z-index:-1"></div>
    <div class="mb-3" style="width:100%;height:100px;z-index:1">
        <div> <h3 style="color: white; text-align: center">Welcome To The DU Services System</h3> </div>
    </div>

     <div class="row">

         <div class="col-6 "  >
             <h4 style="text-align: center; color:rgb(241, 233, 225)">User Story</h4>
             <p style="text-align: center; color:rgb(241, 233, 225);padding-left: 10px ">
                It is such a system where students get services easily . Services are (Testimonial
                processing, Language certification etc). As these processes are manual till now in
                our campus. So I want to build an online system for these purposes. It will be a web application.There are two types of users in this system. These are
                Admin and applicant/student. Students can choose which service he/she needs. Then
                he/she enter into the application by giving his/her Personal details into the Application
                form. Students should give his Name, Father’s Name, Mother’s Name, University
                Registration Number, Date of Birth, Phone, Session,Department, Current year for the
                application. After completing his details, they transact the money with bKash. There are two types of admin .Super admin and normal admin.. Normal admin would be admin controller from each department. They control their
                tasks department wise.. Like approve applications and give certificates etc. Admin can see the details of applicants. Admin can accept or reject the application. Applicant will inform about his application’s status. Admin accept the application and
                inform the applicant for taking his testimonial copy/certificates.
                
                    
            </p>
           


        </div> 

        <div class="col-1"> </div>
        <div class="col-5">
           <b> <h1 style="font-famiy: sans-serif; color:rgb(227, 245, 236)"> To get testimonial and Language certificate click here</h1>  </b>  <br>

             <div class="button_cont" ><a class="example_b" href="{{route('student.registration')}}"  rel="nofollow noopener">Get Testimonial</a>
            
                <a class="example_a" href="{{route('student.application')}}"
                rel="nofollow noopener">Get Language Certificate</a>
            
            </div> 

             <br> <br>
       

        </div>
   
    </div> 
</div>

@endsection
