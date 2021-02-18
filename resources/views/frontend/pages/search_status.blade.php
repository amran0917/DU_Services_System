@extends('frontend.layouts.master')
@section('title', 'Applicant_status')

@section('content')
<div class="reg_img">

   <div class="row">
   
        <div class="search-box">
            <div>
                @if(session()->has('message'))
                    <div class="alert alert-danger">
                        {{ session()->get('message') }}
                    </div>
                 @endif
            </div>

            <h1 style="text-align: center; font-size: 25px;">Sign for seeing status.</h1>

            <form name="" action="{{route('student.searchinfo')}}" method="POST">
                @csrf
                <div class="login">

                <div class="form-group ">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" name="email" class="email" required>
                </div>

                    <div class="form-group ">
                        <label for="applican_id">Applicant's ID:</label>
                        <input type="text" class="form-control" name="applicant_id" class="applicant_id" required>
                    </div>

                   

                    <div class="form-group">
                                        
                        <button type="submit" class="btn btn-success">Search Status</button>

                    </div>                      
                                      

                                       

                                    
                </div>
            </form>
        </div>
    </div>
</div>
@endsection