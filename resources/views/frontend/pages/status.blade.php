@extends('frontend.layouts.master')
@section('title', 'StatusSearchPage')

@section('content')

<div class="home_img2" style="height:85vh">
    <img width="100%" height="100%" style="position:fixed;z-index:-1" src="https://live.staticflickr.com/3009/2719552924_0ba0bb0033_b.jpg">
    <div style="opacity:0.5;background:rgb(0, 0, 0);height:100%;width:100%;position:fixed;z-index:-1"></div>
    <br>
    <div class="mb-3" style="width:100%;height:100px;z-index:1">
        <div> <h2 style="color: rgb(219, 210, 210); text-align: center"> Welcome to Status Search Page.</h2> </div>
    </div>
    
    <div style="text-align: center; padding:auto;" class="mb-10">
        <div>
            <h5 class="card-title" style="color: rgb(219, 210, 210); "> <b> To know Application status !!! click below  </b>  <br></h5>
        </div>
        <div>
            <div class="button_cont" ><a class="example_a" href="{{route('search_status')}}"  rel="nofollow noopener">Certificate Status </a></div>
   
        </div>
        <br>
        <div>
            <div class="button_cont" ><a class="example_b" href="{{route('student.search_status')}}"  rel="nofollow noopener">Testimonial status</a></div> 

        </div>
    </div>


</div>

@endsection
