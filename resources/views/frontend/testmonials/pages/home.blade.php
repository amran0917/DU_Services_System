@extends('frontend.layouts.master')
@section('title', 'HomePage')

@section('content')

<div class="container " id="main-div">
    <div class="row">
     
       {{-- <b> DU sWelcome to the ervices System </b>  --}}

       <div class="card text-white bg-info mb-3" style="width: 100%">
            <div class="card-header"> Welcome to the DU Testmonial services System </div>
            {{-- <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">
                </p>
            </div> --}}
        </div>
    <br>
    <br>

    <div class="row">

         <div class="col-6 text-align-middle" >

            <div class="card text-white bg-success mb-3" style="max-width: 30rem">
                <div class="card-header"> User Story</div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">
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
          </div>


        </div> 

        <div class="col-6">
                <div> 
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                     @endif
                </div>
           <b> <h1 style="font-famiy: sans-serif"> To get testimonial click here</h1>  </b>  <br>

             <div class="button_cont" ><a class="example_b" href="{{route('student.registration')}}"  rel="nofollow noopener">Get Testimonial</a></div> 
             <br> <br>
       
             <b> <h1>To know Application status ? click here</h1>  </b>  <br>
             <div class="button_cont" ><a class="example_c" href="{{route('student.search_status')}}"  rel="nofollow noopener">Application status</a></div>


        </div>
   
    </div>
</div>
@endsection
