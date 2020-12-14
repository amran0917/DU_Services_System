@extends('frontend.layouts.master')
@section('content')
<div class="reg_img">
    @if(session()->get('msg'))
        <div class="alert alert-succcess alert-dismissible fade show" role="alert">

            {{ session()->get('msg') }}
            <button type="button" class="close" data-dismissible="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>

            </button>
        </div>

    @endif
    <div class="row">

        <div class="search-box">
            <h1 style="text-align: center; font-size: 25px;">User Search Status form</h1>

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