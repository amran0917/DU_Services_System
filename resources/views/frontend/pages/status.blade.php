@extends('frontend.layouts.master')
@section('title', 'StatusSearchPage')

@section('content')

<div class="container " id="main-div">
    <div class="row">
     
       <div class="card text-white bg-info mb-10" style="width: 100%">
            <div class="card-header"> Welcome to Status search Page. </div>

            <div class="card-body">
                <h5 class="card-title"> <b> To know Application status ? click below  </b>  <br></h5>
                <div class="row">
                    <div class="col-6">
                        <div class="button_cont" ><a class="example_c" href="{{route('search_status')}}"  rel="nofollow noopener">Certificate Status </a></div>

                    </div>
                    <div class="col-6">
                        <div class="button_cont" ><a class="example_c" href="{{route('student.search_status')}}"  rel="nofollow noopener">Testimonial status</a></div> 

                    </div>
                </div>
                
                
            </div>
            
        </div>
    <br>
    <br>

   
</div>
@endsection
