@extends('admin.layouts.master')
@section('contents')

<div class="container">
    <div class="row" >
            <div class="span3">
                @include('admin.partials.sidebar')
                <!--/.sidebar-->
            </div>
            <!--/.span3-->
                
           
            <div class="span9" style="text-align: center">
              
              <div class="card text-white  mb-3" style="max-width: 100%">
                <br>
                <div class="card-header" style=" font-size:20px">
                    Admin Details : <b style="color: black; font-size:20px">   ID {{ $admin->id}}</b>
                </div>
                <br>
                <div class="card-body">

                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf 
                
                        
                        <img src="https://www.flaticon.com/svg/vstatic/svg/1/1819.svg?token=exp=1617215032~hmac=1dae60a60b91ae964e3ab713e11de0cb" alt="" height="100px" width="100px" >
                              
                        <br>
                        <div class="form-group ">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" style="width: 60%" id="name" name="name" value="{{$admin->name}}">
                        </div>


                                                    
                        <div class="form-group ">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email" style="width: 60%"  name="email" value="{{$admin->email}}">
                        </div>

                                            
                        <div class="form-group ">
                            <label for="type">Admin-Role</label>
                            <input type="text" class="form-control" id="type"  style="width: 60%" name="type" value="{{$admin->type}}">
                        </div>

                    </form>
                </div>
              </div>
              

    
                <!--/.content-->
            </div>
            <!--/.span9-->

        </div>
    </div>
    <!--/.container-->


@endsection


    