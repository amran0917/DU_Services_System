@extends('frontend.layouts.master')
@section('title', 'AboutPage')

@section('content')
<div class="about-img" style="height:80vh">
    <img width="100%" height="80%" style="position:fixed;z-index:-1; opacity:0.8" src="../images/curzon.jpg">

    <div class="row">
        <div class="col-8">

        </div>
        <div class="col-4">
            <div class="card text-white bg-secondary mb-3" style="width: 100%">
                <div class="card-header"> Welcome to the DU </div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">
                        It is established on 1921. There are 30,000 students currently studying here.
                        There are thirteen faculties and  eighty three departments.Also there are 19The University has thirteen halls of residence 
                        and two hostels for male students; and four halls of residence and one hostel for female students.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
